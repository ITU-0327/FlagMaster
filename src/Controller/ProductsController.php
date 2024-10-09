<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Response;
use Exception;
use Laminas\Diactoros\UploadedFile;
use Psr\Http\Message\UploadedFileInterface;
use SplFileInfo;
use UnexpectedValueException;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \App\Model\Table\OrdersProductsTable $OrdersProducts
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->authorize($this->Products);
        $categoryId = $this->request->getQuery('category');
        $sort = $this->request->getQuery('sort');
        $priceFilter = $this->request->getQuery('price_filter', 'all');
        $searchQuery = $this->request->getQuery('q', '');

        $query = $this->Products->find();

        // Filter by category if selected
        if ($categoryId) {
            $query->matching('Categories', function ($q) use ($categoryId) {
                return $q->where(['Categories.id' => $categoryId]);
            });
        }

        // Apply sorting (adjusted for final price with discount)
        switch ($sort) {
            case 'price_low_high':
                $query->orderBy(['IF(Products.discount_type != "none", Products.discount_value, Products.price)' => 'ASC']);
                break;
            case 'price_high_low':
                $query->orderBy(['IF(Products.discount_type != "none", Products.discount_value, Products.price)' => 'DESC']);
                break;
            case 'discounted':
                $query->where(['Products.discount_type !=' => 'none']);
                break;
            case 'newest':
            default:
                $query->orderBy(['Products.created_at' => 'DESC']);
                break;
        }

        // Filter by price
        if ($priceFilter !== 'all') {
            switch ($priceFilter) {
                case '0-50':
                    $query->where(function ($exp, $q) {
                        return $exp->lte('IF(Products.discount_type != "none", Products.discount_value, Products.price)', 50);
                    });
                    break;
                case '50-100':
                    $query->where(function ($exp, $q) {
                        return $exp->between('IF(Products.discount_type != "none", Products.discount_value, Products.price)', 50, 100);
                    });
                    break;
                case '100-200':
                    $query->where(function ($exp, $q) {
                        return $exp->between('IF(Products.discount_type != "none", Products.discount_value, Products.price)', 100, 200);
                    });
                    break;
                case 'over_200':
                    $query->where(function ($exp, $q) {
                        return $exp->gte('IF(Products.discount_type != "none", Products.discount_value, Products.price)', 200);
                    });
                    break;
            }
        }

        // Filter by search query
        if (!empty($searchQuery)) {
            $query->where([
                'OR' => [
                    'Products.name LIKE' => '%' . $searchQuery . '%',
                    'Products.description LIKE' => '%' . $searchQuery . '%',
                ],
            ]);
        }

        // Paginate the query results
        $products = $this->paginate($query);
        $categories = $this->Products->Categories->find()->all();

        // Pass products, categories, sorting, and price filter to the view
        $this->set(compact('products', 'categories', 'sort', 'priceFilter', 'categoryId', 'searchQuery'));
    }

    /**
     * List method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list()
    {
        $this->Authorization->authorize($this->Products);

        $query = $this->Products->find();
        $products = $this->paginate($query);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        // Include comments and user information in comments when obtaining products.
        $product = $this->Products->get(
            $id,
            contain: ['Categories', 'ProductImages', 'ProductVariations', 'Reviews.Users']
        );

        $this->Authorization->authorize($product);

        if (is_array($product->categories)) {
            $categoryIds = array_map(function ($category) {
                return $category->id;
            }, $product->categories);
        } else {
            throw new UnexpectedValueException('Unexpected type for $product->categories');
        }

        // Find related products
        $relatedProducts = $this->Products->find()
            ->matching('Categories', function ($q) use ($categoryIds) {
                return $q->where(['Categories.id IN' => $categoryIds]);
            })
            ->where([
                'Products.id !=' => $id,
                'Products.status' => 'published',
            ])
            ->limit(4)
            ->distinct(['Products.id'])
            ->contain(['Reviews.Users']) // Make sure to load the comments and comments of relevant products
            ->all();

        $this->set(compact('product', 'relatedProducts'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Random\RandomException
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        $this->Authorization->authorize($product);

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $this->handleDiscount($data);

            // Handle Thumbnail Upload
            $thumbnailFile = $this->request->getData('thumbnail_url');
            if ($thumbnailFile instanceof UploadedFile && $thumbnailFile->getError() === UPLOAD_ERR_OK) {
                $thumbnailPath = $this->uploadFile($thumbnailFile, 'thumbnail');

                if ($thumbnailPath) {
                    $data['thumbnail_url'] = $thumbnailPath;
                } else {
                    $this->Flash->error('Thumbnail could not be uploaded. Please try again.');

                    return;
                }
            } else {
                unset($data['thumbnail_url']); // Remove if not uploaded
            }

            // Handle Product Images Upload
            if (!empty($data['product_images'])) {
                $images = $data['product_images'];
                $uploadedImages = [];

                foreach ($images as $image) {
                    if ($image->getError() === UPLOAD_ERR_OK) {
                        $imagePath = $this->uploadFile($image, 'product_image');

                        if ($imagePath) {
                            $uploadedImages[] = ['image_url' => $imagePath];
                        } else {
                            $this->Flash->error('One or more product images could not be uploaded.');

                            return;
                        }
                    }
                }

                // Associate uploaded images
                if (!empty($uploadedImages)) {
                    $data['product_images'] = $uploadedImages;
                } else {
                    unset($data['product_images']);
                }
            }

            $product = $this->Products->patchEntity($product, $data, ['associated' => ['Categories', 'ProductVariations', 'ProductImages']]);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        $enumValues = $this->getEnumValues('products', 'status');
        $variationTypes = $this->getEnumValues('product_variations', 'variation_type');

        $this->set(compact('product', 'categories', 'enumValues', 'variationTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $product = $this->Products->get(
            $id,
            contain: ['Categories', 'Orders']
        );
        $this->Authorization->authorize($product);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $this->handleDiscount($data);

            $product = $this->Products->patchEntity($product, $data, ['associated' => ['Categories', 'ProductVariations']]);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        $orders = $this->Products->Orders->find('list', limit: 200)->all();
        $enumValues = $this->getEnumValues('products', 'status');
        $variationTypes = $this->getEnumValues('product_variations', 'variation_type');

        $this->set(compact('product', 'categories', 'orders', 'enumValues', 'variationTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $this->Authorization->authorize($product);

        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add a product to the cart.
     *
     * @return \Cake\Http\Response
     */
    public function addToCart(): Response
    {
        $this->request->allowMethod(['post']);

        $productId = $this->request->getData('product_id');
        $quantity = $this->request->getData('quantity') ?: 1;

        try {
            $product = $this->Products->get($productId);
        } catch (RecordNotFoundException $e) {
            return $this->jsonResponse([
                'success' => false,
                'message' => __('Product not found.'),
            ]);
        }
        $this->Authorization->authorize($product);

        $user = $this->request->getAttribute('identity');
        $ordersTable = $this->fetchTable('Orders');

        // Find or create an 'incart' order for the user
        $order = $ordersTable->find()
            ->where(['user_id' => $user->id, 'status' => 'incart'])
            ->contain(['OrdersProducts'])
            ->first();

        if (!$order) {
            $order = $ordersTable->newEmptyEntity();
            $order = $ordersTable->patchEntity($order, [
                'user_id' => $user->id,
                'status' => 'incart',
                'order_date' => date('Y-m-d H:i:s'),
                'total_amount' => 0,
                'shipping_cost' => 0,
            ]);

            if (!$ordersTable->save($order)) {
                return $this->jsonResponse([
                    'success' => false,
                    'message' => __('Unable to create cart order. Please try again.'),
                ]);
            }
        }

        // Fetch the OrdersProducts table
        $ordersProductsTable = $this->fetchTable('OrdersProducts');

        // Check if the product is already in the cart
        $orderProduct = $ordersProductsTable->find()
            ->where(['order_id' => $order->id, 'product_id' => $productId])
            ->first();

        if ($orderProduct) {
            // Update quantity
            $orderProduct->quantity += $quantity;
        } else {
            // Add new item to cart
            $orderProduct = $ordersProductsTable->newEmptyEntity();
            $orderProduct = $ordersProductsTable->patchEntity($orderProduct, [
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'unit_price' => $product->getPrice(),
            ]);
        }

        if ($ordersProductsTable->save($orderProduct)) {
            $cartItemCount = $ordersProductsTable->find()
                ->where(['order_id' => $order->id])
                ->select(['total' => 'SUM(quantity)'])
                ->first()
                ->get('total');

            $response = [
                'success' => true,
                'message' => __('Product added to cart.'),
                'cartItemCount' => (int)$cartItemCount,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => __('Unable to add product to cart.'),
            ];
        }

        return $this->jsonResponse($response);
    }

    /**
     * Handle discount logic based on discount type.
     *
     * @param array $data Product data
     */
    private function handleDiscount(array &$data): void
    {
        if ($data['discount_type'] === 'none') {
            $data['discount_value'] = null;
        } elseif ($data['discount_type'] === 'percentage') {
            $basePrice = (float)$data['price'];
            $percentage = (float)$data['discount_value_percentage'];
            $data['discount_value'] = $basePrice - ($basePrice * $percentage / 100);
        }
    }

    /**
     * Get enum values from a table column.
     *
     * @param string $table Table name
     * @param string $column Column name
     */
    private function getEnumValues(string $table, string $column): array
    {
        $connection = ConnectionManager::get('default');
        $enumValues = [];
        $results = $connection->execute("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'")->fetch('assoc');

        if (isset($results['Type'])) {
            preg_match("/^enum\('(.*)'\)$/", $results['Type'], $matches);
            $enumValues = explode("','", $matches[1]);
            $enumValues = array_map('ucfirst', $enumValues); // Capitalize for display
        }

        return $enumValues;
    }

    /**
     * Upload a file and return the relative path.
     *
     * @param \Psr\Http\Message\UploadedFileInterface $file Uploaded file
     * @param string|null $filenamePrefix Filename prefix
     * @return string|bool Relative path to the uploaded file or false on failure
     * @throws \Random\RandomException
     */
    private function uploadFile(UploadedFileInterface $file, ?string $filenamePrefix = null): bool|string
    {
        if ($file->getError() !== UPLOAD_ERR_OK) {
            if ($file->getError() === UPLOAD_ERR_INI_SIZE || $file->getError() === UPLOAD_ERR_FORM_SIZE) {
                $this->Flash->error(__('The file you uploaded is too large.'));
            } else {
                $this->Flash->error(__('There was an error uploading your file.'));
            }

            return false;
        }

        $prefix = $filenamePrefix ? $filenamePrefix . '.' : '';

        // Secure the file extension
        $extension = preg_replace(
            '/[^a-z0-9]/',
            '',
            strtolower((new SplFileInfo($file->getClientFilename()))->getExtension())
        );
        $allowedExtensions = ['png', 'jpg', 'jpeg'];

        if (!in_array($extension, $allowedExtensions)) {
            $this->Flash->error(__('Invalid file type. Only PNG, JPG, and JPEG are allowed.'));

            return false;
        }

        // Generate a secure and unique filename
        $newFilename = $prefix . md5(random_bytes(10)) . '.' . $extension;

        $uploadDir = new SplFileInfo(WWW_ROOT . 'img' . DIRECTORY_SEPARATOR . 'products');
        if (!$uploadDir->isDir()) {
            mkdir($uploadDir->getPathname(), 0777, true);
        }

        // Move the uploaded file
        try {
            $file->moveTo($uploadDir->getPathname() . DIRECTORY_SEPARATOR . $newFilename);
        } catch (Exception $e) {
            $this->Flash->error(__('Could not move the uploaded file.'));

            return false;
        }

        // Return the relative path to the uploaded file
        return 'products/' . $newFilename;
    }

    /**
     * Helper method to return JSON response
     *
     * @param array $response Response data
     * @return \Cake\Http\Response
     */
    private function jsonResponse(array $response): Response
    {
        $this->viewBuilder()->setClassName('Json');
        $this->set(compact('response'));
        $this->viewBuilder()->setOption('serialize', 'response');

        return $this->response->withType('application/json')->withStringBody(json_encode($response));
    }
}
