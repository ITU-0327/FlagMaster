<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CustomFlagEnquiries Controller
 *
 * @property \App\Model\Table\CustomFlagEnquiriesTable $CustomFlagEnquiries
 */
class CustomFlagEnquiriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CustomFlagEnquiries->find()
            ->contain(['Enquiries']);  // Including related Enquiries data
        $customFlagEnquiries = $this->paginate($query);

        $this->set(compact('customFlagEnquiries'));
    }

    /**
     * View method
     *
     * @param string|null $id Custom Flag Enquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $customFlagEnquiry = $this->CustomFlagEnquiries->get($id, [
            'contain' => ['Enquiries'], // Include related Enquiries data
        ]);

        $this->set(compact('customFlagEnquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customFlagEnquiry = $this->CustomFlagEnquiries->newEmptyEntity();
        if ($this->request->is('post')) {
            $customFlagEnquiry = $this->CustomFlagEnquiries->patchEntity($customFlagEnquiry, $this->request->getData());
            if ($this->CustomFlagEnquiries->save($customFlagEnquiry)) {
                $this->Flash->success(__('The custom flag enquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom flag enquiry could not be saved. Please, try again.'));
        }

        // Fetch list of enquiries for selection in the form
        $enquiries = $this->CustomFlagEnquiries->Enquiries->find('list', ['limit' => 200])->all();

        // Also fetch all details of the related enquiries (subject and message)
        $this->set(compact('customFlagEnquiry', 'enquiries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Custom Flag Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $customFlagEnquiry = $this->CustomFlagEnquiries->get($id, [
            'contain' => ['Enquiries'], // Include related Enquiries data
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customFlagEnquiry = $this->CustomFlagEnquiries->patchEntity($customFlagEnquiry, $this->request->getData());
            if ($this->CustomFlagEnquiries->save($customFlagEnquiry)) {
                $this->Flash->success(__('The custom flag enquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom flag enquiry could not be saved. Please, try again.'));
        }

        // Fetch list of enquiries for selection in the form
        $enquiries = $this->CustomFlagEnquiries->Enquiries->find('list', ['limit' => 200])->all();

        // Also fetch all details of the related enquiries (subject and message)
        $this->set(compact('customFlagEnquiry', 'enquiries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Custom Flag Enquiry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customFlagEnquiry = $this->CustomFlagEnquiries->get($id);
        if ($this->CustomFlagEnquiries->delete($customFlagEnquiry)) {
            $this->Flash->success(__('The custom flag enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The custom flag enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
