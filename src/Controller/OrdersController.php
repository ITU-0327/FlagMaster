<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;
use Cake\I18n\Number;
use Stripe\Stripe;
use Stripe\PaymentIntent;

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
            ->contain(['Users.Profiles', 'Users.Profiles.Addresses', 'Products'])
            ->where(['Orders.status != ' => 'incart']);

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
     * Checkout method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful checkout, renders view otherwise.
     */
    public function checkout()
    {
        $user = $this->request->getAttribute('identity');
        $userId = $user->id;

        // Find the current order in the cart
        $order = $this->Orders->find()
            ->where(['Orders.user_id' => $userId, 'Orders.status' => 'incart'])
            ->contain(['OrdersProducts.Products', 'OrdersProducts.Products.Categories'])
            ->first();

        // Fetch user details including address
        $user = $this->Orders->Users->get(
            $userId,
            contain: ['Profiles', 'Profiles.Addresses']
        );

        // Check if the order exists or if it is empty
        if (!$order || empty($order->orders_products)) {
            $this->Flash->error(__('Your cart is empty.'));

            return $this->redirect(['controller' => 'Products', 'action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            // Get form data
            $orderData = $this->request->getData();
            $quantities = $orderData['quantity'] ?? []; // Array of quantities keyed by product ID

            $shippingCost = isset($orderData['deliveryOpt']) ? floatval($orderData['deliveryOpt']) : 0;

            // Update product quantities in the order
            foreach ($order->orders_products as $orderProduct) {
                $productId = $orderProduct->product_id;
                if (isset($quantities[$productId])) {
                    $orderProduct->quantity = max(1, (int)$quantities[$productId]); // Ensure quantity is at least 1
                }
            }

            // Calculate subtotal
            $subTotal = 0;
            foreach ($order->orders_products as $orderProduct) {
                $subTotal += $orderProduct->quantity * $orderProduct->unit_price;
            }

            $order->shipping_cost = $shippingCost;
            $order->total_amount = $subTotal + $shippingCost;

            // Check if the payment type is card (Stripe)
            $paymentType = $orderData['paymentType'];
            if ($paymentType === 'card') {
                // Load Stripe keys from app_local.php
                $secretKey = \Cake\Core\Configure::read('Stripe.secret_key');
                \Stripe\Stripe::setApiKey($secretKey);

                try {
                    // Create a payment intent with Stripe
                    $paymentIntent = \Stripe\PaymentIntent::create([
                        'amount' => intval($order->total_amount * 100), // Stripe expects amount in cents
                        'currency' => 'aud',
                        'payment_method' => $orderData['paymentMethodId'], // PaymentMethod ID sent from the frontend
                        'confirmation_method' => 'manual',
                        'confirm' => true, // This will immediately confirm the payment intent
                    ]);

                    // If successful, update order status to 'pending' and save the order
                    $order->status = 'pending';
                    $order->order_date = date('Y-m-d H:i:s');

                    // Save the order and associated order products
                    if ($this->Orders->save($order, ['associated' => ['OrdersProducts']])) {
                        $this->Flash->success(__('Order placed successfully and payment completed.'));

                        return $this->redirect(['action' => 'index']);
                    }

                    $this->Flash->error(__('Unable to save the order.'));

                } catch (\Stripe\Exception\CardException $e) {
                    // Handle any errors that occur when processing the payment
                    $this->Flash->error(__('Payment failed: ') . $e->getMessage());
                }
            } else {
                // Handle other payment types (e.g., bank transfer or cash on delivery)
                $order->status = 'pending';
                $order->order_date = date('Y-m-d H:i:s');

                if ($this->Orders->save($order, ['associated' => ['OrdersProducts']])) {
                    $this->Flash->success(__('Order placed successfully.'));

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('Unable to save the order.'));
            }
        }

        $this->set(compact('order', 'user'));
    }

    /**
     * Update cart item method
     *
     * @return \Cake\Http\Response
     */
    public function updateCartItem(): Response
    {
        $this->request->allowMethod(['post']);

        $productId = $this->request->getData('product_id');
        $quantity = $this->request->getData('quantity') ?: 1;

        $identity = $this->request->getAttribute('identity');
        $userId = $identity->id;

        $order = $this->Orders->find()
            ->where(['user_id' => $userId, 'status' => 'incart'])
            ->contain(['OrdersProducts.Products'])
            ->first();
        if (!$order) {
            return $this->jsonResponse(['success' => false]);
        }

        $orderProduct = $this->Orders->OrdersProducts->find()
            ->where(['order_id' => $order->id, 'product_id' => $productId])
            ->first();
        if (!$orderProduct) {
            return $this->jsonResponse(['success' => false]);
        }

        $orderProduct->quantity = $quantity;
        if (!$this->Orders->OrdersProducts->save($orderProduct)) {
            return $this->jsonResponse(['success' => false]);
        }

        // Reload the order with updated orders_products
        $order = $this->Orders->get($order->id, contain: ['OrdersProducts']);

        // Recalculate subtotal
        $subTotal = 0;
        $cartItemCount = 0;
        foreach ($order->orders_products as $item) {
            $itemQuantity = $item->product_id == $productId ? $quantity : $item->quantity;
            $itemTotalPrice = $item->unit_price * $itemQuantity;
            $cartItemCount += $itemQuantity;
            $subTotal += $itemTotalPrice;
        }

        $response = [
            'success' => true,
            'subTotalFormatted' => Number::currency($subTotal, 'AUD', ['places' => 0]),
            'cartItemCount' => $cartItemCount,
        ];

        return $this->jsonResponse($response);
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
            return $this->jsonResponse([
                'success' => false,
                'message' => __('Your cart is empty.'),
            ]);
        }

        $orderProduct = $this->Orders->OrdersProducts->find()
            ->where(['order_id' => $order->id, 'product_id' => $productId])
            ->first();

        if (!$orderProduct) {
            return $this->jsonResponse([
                'success' => false,
                'message' => __('Product not found in your cart.'),
            ]);
        }

        if ($this->Orders->OrdersProducts->delete($orderProduct)) {
            // Reload the order to get updated orders_products
            $order = $this->Orders->get($order->id, contain: ['OrdersProducts']);

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
