<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
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
        // Set pagination limit to 9 products per page
        $this->paginate = [
            'limit' => 9,
            'order' => ['Products.created_at' => 'desc'],
        ];

        // Initialize the query
        $query = $this->Products->find('all', [
            'contain' => ['Categories']
        ]);

        // Search Filter
        $search = $this->request->getQuery('search');
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Products.name LIKE' => '%' . $search . '%',
                    'Products.description LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        // Category Filter
        $categoryId = $this->request->getQuery('category');
        if (!empty($categoryId)) {
            $query->matching('Categories', function ($q) use ($categoryId) {
                return $q->where(['Categories.id' => $categoryId]);
            });
        }

        // Price Filter
        $priceRange = $this->request->getQuery('price_range');
        if (!empty($priceRange)) {
            switch ($priceRange) {
                case '0-50':
                    $query->where(['Products.price <=' => 50]);
                    break;
                case '50-100':
                    $query->where(['Products.price >=' => 50, 'Products.price <=' => 100]);
                    break;
                case '100-200':
                    $query->where(['Products.price >=' => 100, 'Products.price <=' => 200]);
                    break;
                case 'over-200':
                    $query->where(['Products.price >=' => 200]);
                    break;
            }
        }

        // Fetch paginated products
        $products = $this->paginate($query);

        // Fetch categories for filters
        $categories = $this->Products->Categories->find('list')->all();

        $this->set(compact('products', 'categories', 'search', 'categoryId', 'priceRange'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'ProductImages', 'ProductVariations', 'Reviews']
        ]);
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

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Handle discount value based on discount type
            if ($data['discount_type'] === 'none') {
                $data['discount_value'] = NULL;
            } elseif ($data['discount_type'] === 'percentage') {
                $basePrice = (float)$data['price'];
                $percentage = (float)$data['discount_value_percentage'];
                $data['discount_value'] = $basePrice - ($basePrice * ($percentage / 100));
            }

            // Now patch the entity with the modified data
            $product = $this->Products->patchEntity($product, $data,[
                'associated' => ['Categories', 'ProductVariations']
            ]);

            if ($this->Products->save($product, ['associated' => ['Categories', 'ProductVariations']])) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        // Fetch categories for the form dropdown
        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();

        // Fetching ENUM values for the status field
        $connection = \Cake\Datasource\ConnectionManager::get('default');

        $enumValues = [];
        $results = $connection->execute("SHOW COLUMNS FROM products WHERE Field = 'status'")->fetch('assoc');
        if (isset($results['Type'])) {
            preg_match("/^enum\(\'(.*)\'\)$/", $results['Type'], $matches);
            $enumValues = explode("','", $matches[1]);
            $enumValues = array_map('ucfirst', $enumValues);
        }

        // Fetching variation types from enum
        $variationTypes = [];
        $results = $connection->execute("SHOW COLUMNS FROM product_variations WHERE Field = 'variation_type'")->fetch('assoc');
        if (isset($results['Type'])) {
            preg_match("/^enum\(\'(.*)\'\)$/", $results['Type'], $matches);
            $variationTypes = explode("','", $matches[1]);
            $variationTypes = array_map('ucfirst', $variationTypes);
        }

        $this->set(compact('product', 'categories', 'enumValues', 'variationTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'ProductVariations']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Handle discount value based on discount type
            if ($data['discount_type'] === 'none') {
                $data['discount_value'] = NULL;
            } elseif ($data['discount_type'] === 'percentage') {
                $basePrice = (float)$data['price'];
                $percentage = (float)$data['discount_value_percentage'];
                $data['discount_value'] = $basePrice - ($basePrice * ($percentage / 100));
            }

            // Now patch the entity with the modified data
            $product = $this->Products->patchEntity($product, $data, [
                'associated' => ['Categories', 'ProductVariations']
            ]);

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);

        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
