<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\Http\Response;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
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
        $product = $this->Products->get(
            $id,
            contain: ['Categories', 'ProductImages', 'ProductVariations', 'Reviews']
        );

        $this->Authorization->authorize($product);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('admin');
        $product = $this->Products->newEmptyEntity();
        $this->Authorization->authorize($product);

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $this->handleDiscount($data);

            $product = $this->Products->patchEntity($product, $data, ['associated' => ['Categories', 'ProductVariations']]);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
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

        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
        $orders = $this->Products->Orders->find('list', ['limit' => 200])->all();
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
}
