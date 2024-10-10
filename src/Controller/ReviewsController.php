<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * Reviews Controller
 *
 * @property \App\Model\Table\ReviewsTable $Reviews
 */
class ReviewsController extends AppController
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

        // Query comments and include relevant user and product information
        $query = $this->Reviews->find()
            ->contain(['Users', 'Products']);

        // If the user_id parameter is passed, only the user's comment record will be displayed.
        if ($userId) {
            $query->where(['Reviews.user_id' => $userId]);
        }

        // Page display of comment records
        $reviews = $this->paginate($query);

        // Pass the query results to the view
        $this->set(compact('reviews'));
    }

    /**
     * View method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $review = $this->Reviews->get($id, contain: ['Users', 'Products']);
        $this->set(compact('review'));
    }

    /**
     * Add method
     *
     * @param string $productId Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(string $productId)
    {
        // Get the currently logged-in user ID
        $userId = $this->request->getAttribute('identity')->getIdentifier();

        // Make sure that the product ID is not empty.
        if (!$productId) {
            $this->Flash->error(__('Product ID is required to write a review.'));

            return $this->redirect(['controller' => 'Products', 'action' => 'index']);
        }

        // Obtain current user and product information to ensure the existence of data
        $user = $this->Reviews->Users->get($userId);
        $product = $this->Reviews->Products->get($productId);

        $review = $this->Reviews->newEmptyEntity();

        if ($this->request->is('post')) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());

            $review->user_id = $userId;
            $review->product_id = $productId;

            // Check the comment field. If it is empty, it will not be verified.
            if (empty($review->comment)) {
                unset($review->comment);
            }

            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('Your review has been saved.'));

                return $this->redirect(['controller' => 'Products', 'action' => 'view', $productId]);
            }
            $this->Flash->error(__('Unable to add your review.'));
        }

        // Pass user and product information to the view
        $this->set(compact('review', 'product', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $review = $this->Reviews->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $users = $this->Reviews->Users->find('list', limit: 200)->all();
        $products = $this->Reviews->Products->find('list', limit: 200)->all();
        $this->set(compact('review', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Reviews->get($id);
        if ($this->Reviews->delete($review)) {
            $this->Flash->success(__('The review has been deleted.'));
        } else {
            $this->Flash->error(__('The review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
