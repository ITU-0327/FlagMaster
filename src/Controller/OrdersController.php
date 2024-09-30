<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Apply scope to limit orders based on user role
        $query = $this->Orders->find()
            ->contain(['Users.Profiles', 'Users.Profiles.Addresses', 'Products']);

        $query = $this->Authorization->applyScope($query);

        $orders = $query->all();

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $order = $this->Orders->get($id, contain: ['Users', 'Products', 'Deliveries', 'Payments']);
        $this->Authorization->authorize($order);
        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        $this->Authorization->authorize($order);

        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', limit: 200)->all();
        $products = $this->Orders->Products->find('list', limit: 200)->all();
        $this->set(compact('order', 'users', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $quantity = $this->request->getData('quantityInput');
        $order = $this->Orders->get($id, contain: ['Products']);
        $this->Authorization->authorize($order);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', limit: 200)->all();
        $products = $this->Orders->Products->find('list', limit: 200)->all();
        $this->set(compact('order', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        $this->Authorization->authorize($order);

        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Checkout method
     *
     * @param string|null $productId Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful checkout, renders view otherwise.
     */
    public function checkout(?string $productId = null)
    {
        if ($productId === null) {
            $this->Flash->error(__('Product not found.'));

            return $this->redirect(['controller' => 'Products', 'action' => 'index']);
        }

        // Get product information
        $product = $this->Orders->Products->get($productId);

        // Get the quantity parameters passed, the default value is 1
        $quantity = $this->request->getQuery('quantity', 1);

        // Make sure that the quantity is positive.
        $quantity = max(1, (int)$quantity);

        $order = $this->Orders->newEmptyEntity();

        if ($this->request->is('post')) {
            $orderData = $this->request->getData();
            $orderData['product_id'] = $productId; // Associated product id

            // Get the quantity modified by the user on the settlement page
            $quantity = isset($orderData['quantity']) ? (int)$orderData['quantity'] : $quantity;
            $orderData['quantity'] = $quantity;

            $order = $this->Orders->patchEntity($order, $orderData);

            if ($this->Orders->save($order)) {
                $this->Flash->success(__('Order has been placed successfully.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to place the order.'));
        }

        // Pass the product, order and quantity to the view
        $this->set(compact('product', 'order', 'quantity'));
    }
}
