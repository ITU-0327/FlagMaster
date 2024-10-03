<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;
use Cake\I18n\Number;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
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
        // Check whether the user_id parameter has been passed
        $userId = $this->request->getQuery('user_id');

        // Query the order and include relevant user information
        $query = $this->Orders->find()
            ->contain(['Users.Profiles', 'Users.Profiles.Addresses', 'Products']);

        // If the user_id parameter is passed, only the order of the corresponding user will be displayed.
        if ($userId) {
            $query->where(['Orders.user_id' => $userId]);
        }

        // Apply the scope of authorization to limit the display of orders
        $query = $this->Authorization->applyScope($query);

        // Get all orders
        $orders = $query->all();

        // Pass the order to the view
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
     * Update cart item method
     *
     * @return void
     */
    public function updateCartItem(): void
    {
        $this->request->allowMethod(['post']);
        $productId = $this->request->getData('product_id');
        $quantity = $this->request->getData('quantity');

        $identity = $this->request->getAttribute('identity');
        $userId = $identity->id;

        $order = $this->Orders->find()
            ->where(['user_id' => $userId, 'status' => 'incart'])
            ->contain(['OrdersProducts.Products'])
            ->first();

        if ($order) {
            $orderProduct = $this->Orders->OrdersProducts->find()
                ->where(['order_id' => $order->id, 'product_id' => $productId])
                ->first();

            if ($orderProduct) {
                $orderProduct->quantity = $quantity;
                if ($this->Orders->OrdersProducts->save($orderProduct)) {
                    // Recalculate subtotal
                    $subTotal = 0;
                    $cartItemCount = 0;
                    foreach ($order->orders_products as $item) {
                        $itemQuantity = $item->product_id == $productId ? $quantity : $item->quantity;
                        $itemTotalPrice = $item->unit_price * $itemQuantity;
                        $cartItemCount += $item->product_id == $productId ? $quantity : $item->quantity;
                        $subTotal += $itemTotalPrice;
                    }

                    $response = [
                        'success' => true,
                        'subTotalFormatted' => Number::currency($subTotal, 'AUD', ['places' => 0]),
                        'cartItemCount' => $cartItemCount,
                    ];
                } else {
                    $response = ['success' => false];
                }
            } else {
                $response = ['success' => false];
            }
        } else {
            $response = ['success' => false];
        }

        // Set the response type to JSON
        $this->viewBuilder()->setClassName('Json');
        $this->set(compact('response'));
        $this->viewBuilder()->setOption('serialize', 'response');
    }

    /**
     * Checkout method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful checkout, renders view otherwise.
     */
    public function checkout()
    {
        // get user id
        $user = $this->request->getAttribute('identity');
        $userId = $user->id;

        $order = $this->Orders->find()
            ->where(['Orders.user_id' => $userId, 'Orders.status' => 'incart'])
            ->contain(['OrdersProducts.Products', 'OrdersProducts.Products.Categories'])
            ->first();

        $user = $this->Orders->Users->get(
            $userId,
            contain: ['Profiles', 'Profiles.Addresses']
        );

        if (!$order || empty($order->orders_products)) {
            $this->Flash->error(__('Your cart is empty.'));

            return $this->redirect(['controller' => 'Products', 'action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            // Get form data
            $orderData = $this->request->getData();
            $quantities = $orderData['quantity'] ?? []; // Array of quantities keyed by product ID

            $shippingCost = isset($orderData['deliveryOpt']) ? floatval($orderData['deliveryOpt']) : 0;

            // Update quantities in the order
            foreach ($order->orders_products as $orderProduct) {
                $productId = $orderProduct->product_id;
                if (isset($quantities[$productId])) {
                    $orderProduct->quantity = max(1, (int)$quantities[$productId]); // Ensure quantity is at least 1
                }
            }

            $subTotal = 0;
            foreach ($order->orders_products as $orderProduct) {
                $subTotal += $orderProduct->quantity * $orderProduct->unit_price;
            }

            $order->shipping_cost = $shippingCost;
            $order->total_amount = $subTotal + $shippingCost;

            // Update order status to 'pending' and set the order date
            $order->status = 'pending';
            $order->order_date = date('Y-m-d H:i:s');

            // Save the order along with associated order products
            if ($this->Orders->save($order, ['associated' => ['OrdersProducts']])) {
                $this->Flash->success(__('Order has been placed successfully.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Unable to place the order.'));
        }

        // Pass order and user data to the view
        $this->set(compact('order', 'user'));
    }

    /**
     * Remove a cart item
     *
     * @return \Cake\Http\Response
     */
    public function removeCartItem(): Response
    {
        $this->request->allowMethod(['post']);

        $user = $this->request->getAttribute('identity');
        $productId = $this->request->getData('product_id');

        $order = $this->Orders->find()
            ->where(['user_id' => $user->id, 'status' => 'incart'])
            ->contain(['OrdersProducts'])
            ->first();

        if (!$order) {
            $response = [
                'success' => false,
                'message' => __('Your cart is empty.'),
            ];

            return $this->jsonResponse($response);
        }

        $orderProduct = $this->Orders->OrdersProducts->find()
            ->where(['order_id' => $order->id, 'product_id' => $productId])
            ->first();

        if ($orderProduct) {
            if ($this->Orders->OrdersProducts->delete($orderProduct)) {
                // Reload the order to get updated orders_products
                $order = $this->Orders->get($order->id, ['contain' => ['OrdersProducts']]);

                // Recalculate cart item count
                $cartItemCount = 0;
                if (!empty($order->orders_products)) {
                    foreach ($order->orders_products as $item) {
                        $cartItemCount += $item->quantity;
                    }
                }

                $response = [
                    'success' => true,
                    'message' => __('Item removed from cart.'),
                    'cartItemCount' => $cartItemCount,
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => __('Unable to remove item from cart.'),
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => __('Product not found in your cart.'),
            ];
        }

        return $this->jsonResponse($response);
    }

    /**
     * Get cart sidebar method
     *
     * @return void
     */
    public function getCartSidebar(): void
    {
        $this->request->allowMethod(['get']);

        $identity = $this->request->getAttribute('identity');
        $userId = $identity->id;

        $this->Orders = $this->fetchTable('Orders');
        $order = $this->Orders->find()
            ->where(['user_id' => $userId, 'status' => 'incart'])
            ->contain(['OrdersProducts.Products.Categories'])
            ->first();

        $cartItems = [];
        if ($order) {
            $cartItems = $order->orders_products;
        }

        $this->set(compact('cartItems'));
        $this->viewBuilder()->setLayout('ajax');
        $this->render('/element/cart-sidebar');
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
