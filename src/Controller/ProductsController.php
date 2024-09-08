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
                $query->order(['IF(Products.discount_type != "none", Products.discount_value, Products.price)' => 'ASC']);
                break;
            case 'price_high_low':
                $query->order(['IF(Products.discount_type != "none", Products.discount_value, Products.price)' => 'DESC']);
                break;
            case 'discounted':
                $query->where(['Products.discount_type !=' => 'none']);
                break;
            case 'newest':
            default:
                $query->order(['Products.created_at' => 'DESC']);
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
                    'Products.description LIKE' => '%' . $searchQuery . '%'
                ]
            ]);
        }

        // Paginate the query results
        $products = $this->paginate($query);
        $categories = $this->Products->Categories->find()->all();

        // Pass products, categories, sorting, and price filter to the view
        $this->set(compact('products', 'categories', 'sort', 'priceFilter', 'categoryId', 'searchQuery'));
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
