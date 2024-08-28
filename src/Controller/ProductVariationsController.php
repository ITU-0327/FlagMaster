<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductVariations Controller
 *
 * @property \App\Model\Table\ProductVariationsTable $ProductVariations
 */
class ProductVariationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProductVariations->find()
            ->contain(['Products']);
        $productVariations = $this->paginate($query);

        $this->set(compact('productVariations'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Variation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productVariation = $this->ProductVariations->get($id, contain: ['Products']);
        $this->set(compact('productVariation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productVariation = $this->ProductVariations->newEmptyEntity();
        if ($this->request->is('post')) {
            $productVariation = $this->ProductVariations->patchEntity($productVariation, $this->request->getData());
            if ($this->ProductVariations->save($productVariation)) {
                $this->Flash->success(__('The product variation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product variation could not be saved. Please, try again.'));
        }
        $products = $this->ProductVariations->Products->find('list', limit: 200)->all();
        $this->set(compact('productVariation', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Variation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productVariation = $this->ProductVariations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productVariation = $this->ProductVariations->patchEntity($productVariation, $this->request->getData());
            if ($this->ProductVariations->save($productVariation)) {
                $this->Flash->success(__('The product variation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product variation could not be saved. Please, try again.'));
        }
        $products = $this->ProductVariations->Products->find('list', limit: 200)->all();
        $this->set(compact('productVariation', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Variation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productVariation = $this->ProductVariations->get($id);
        if ($this->ProductVariations->delete($productVariation)) {
            $this->Flash->success(__('The product variation has been deleted.'));
        } else {
            $this->Flash->error(__('The product variation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
