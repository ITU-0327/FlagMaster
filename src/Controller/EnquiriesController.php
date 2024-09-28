<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * Enquiries Controller
 *
 * @property \App\Model\Table\EnquiriesTable $Enquiries
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class EnquiriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Enquiries->find()
            ->contain(['Users', 'Users.Profiles'])
            ->orderBy(['Enquiries.updated_at' => 'DESC']);

        $query = $this->Authorization->applyScope($query);

        $enquiries = $query->all();

        $this->set(compact('enquiries'));
    }

    /**
     * View method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $enquiry = $this->Enquiries->get($id, contain: ['Users']);
        $this->Authorization->authorize($enquiry);
        $this->set(compact('enquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enquiry = $this->Enquiries->newEmptyEntity();
        $this->Authorization->authorize($enquiry);

        if ($this->request->is('post')) {
            $identity = $this->request->getAttribute('identity');
            $enquiry->user_id = $identity->get('id');

            $enquiry = $this->Enquiries->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquiries->save($enquiry)) {
                $this->Flash->success(__('Your enquiry has been submitted successfully.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('There was an issue submitting your enquiry. Please try again.'));
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $enquiry = $this->Enquiries->get($id, contain: []);
        $this->Authorization->authorize($enquiry);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquiry = $this->Enquiries->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquiries->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
        }
        $users = $this->Enquiries->Users->find('list', limit: 200)->all();
        $this->set(compact('enquiry', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquiries->get($id);
        $this->Authorization->authorize($enquiry);

        if ($this->Enquiries->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
