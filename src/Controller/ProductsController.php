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
     * List method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list()
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
        $product = $this->Products->get($id, ['contain' => ['Categories', 'Orders', 'ProductImages', 'ProductVariations', 'Reviews']]);
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
    public function edit($id = null)
    {
        $product = $this->Products->get($id, ['contain' => ['Categories', 'Orders']]);
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

    /**
     * Handle discount logic based on discount type.
     */
    private function handleDiscount(&$data): void
    {
        if ($data['discount_type'] === 'none') {
            $data['discount_value'] = null;
        } elseif ($data['discount_type'] === 'percentage') {
            $basePrice = (float)$data['price'];
            $percentage = (float)$data['discount_value_percentage'];
            $data['discount_value'] = $basePrice - ($basePrice * ($percentage / 100));
        }
    }

    /**
     * Get enum values from a table column.
     */
    private function getEnumValues($table, $column): array
    {
        $connection = \Cake\Datasource\ConnectionManager::get('default');
        $enumValues = [];
        $results = $connection->execute("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'")->fetch('assoc');

        if (isset($results['Type'])) {
            preg_match("/^enum\(\'(.*)\'\)$/", $results['Type'], $matches);
            $enumValues = explode("','", $matches[1]);
            $enumValues = array_map('ucfirst', $enumValues);  // Capitalize for display
        }

        return $enumValues;
    }
}
