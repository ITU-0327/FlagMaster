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
    public function view($id = null)
    {
        $product = $this->Products->get($id, contain: ['Categories', 'Orders', 'ProductImages', 'ProductVariations', 'Reviews']);
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

        // Fetching categories
        $categories = $this->Products->Categories->find('list', limit: 200)->all();

        // Fetching ENUM values for the status field
        $connection = \Cake\Datasource\ConnectionManager::get('default');

        $enumValues = [];
        $results = $connection->execute(
            "SHOW COLUMNS FROM products WHERE Field = 'status'"
        )->fetch('assoc');

        if (isset($results['Type'])) {
            preg_match("/^enum\(\'(.*)\'\)$/", $results['Type'], $matches);
            $enumValues = explode("','", $matches[1]);

            // Capitalize the first letter for display
            $enumValues = array_map('ucfirst', $enumValues);
        }

        // Fetching variation types from enum
        $variationTypes = [];
        $results = $connection->execute(
            "SHOW COLUMNS FROM product_variations WHERE Field = 'variation_type'"
        )->fetch('assoc');

        if (isset($results['Type'])) {
            preg_match("/^enum\(\'(.*)\'\)$/", $results['Type'], $matches);
            $variationTypes = explode("','", $matches[1]);

            // Capitalize the first letter for display
            $variationTypes = array_map('ucfirst', $variationTypes);
        }

        // Passing the fetched values to the view
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
        $product = $this->Products->get($id, contain: ['Categories', 'Orders']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        $orders = $this->Products->Orders->find('list', limit: 200)->all();
        $this->set(compact('product', 'categories', 'orders'));
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
