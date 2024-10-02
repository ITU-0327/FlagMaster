<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CustomFlagEnquiries Controller
 *
 * @property \App\Model\Table\CustomFlagEnquiriesTable $CustomFlagEnquiries
 */
use Psr\Http\Message\UploadedFileInterface;
use Exception;
use SplFileInfo;
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
            $identity = $this->request->getAttribute('identity');

            // Get the request data
            $data = $this->request->getData();

            // Set the user_id in the associated Enquiry data
            $data['enquiry']['user_id'] = $identity->get('id');

            // Handle attachment upload
            $file = $this->request->getData('attachment_file');
            if ($file instanceof UploadedFileInterface && $file->getError() === UPLOAD_ERR_OK) {
                $filename = $this->uploadAttachment($file, $identity->get('username'));
                if ($filename) {
                    $data['attachment_url'] = $filename;
                } else {
                    $this->Flash->error(__('Unable to upload attachment.'));
                    unset($data['attachment_file']); // Prevent overwriting with null
                }
            } else {
                // If no new file uploaded, remove it from the data to prevent errors
                unset($data['attachment_file']);
            }

            // Patch the entity including the associated Enquiry entity
            $customFlagEnquiry = $this->CustomFlagEnquiries->patchEntity($customFlagEnquiry, $data, [
                'associated' => ['Enquiries'],
            ]);

            if ($this->CustomFlagEnquiries->save($customFlagEnquiry)) {
                $this->Flash->success(__('Your custom flag enquiry has been submitted successfully.'));

                return $this->redirect(['controller' => 'enquiries', 'action' => 'index']);
            }
            $this->Flash->error(__('There was an issue submitting your custom flag enquiry. Please try again.'));
        }

        $this->set(compact('customFlagEnquiry'));
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
    private function uploadAttachment(UploadedFileInterface $file, string $identifier): bool|string
    {
        $uploadPath = WWW_ROOT . 'attachments' . DS;

        // Ensure the upload directory exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Validate file type
        $extension = preg_replace(
            '/[^a-z0-9]/',
            '',
            strtolower((new SplFileInfo($file->getClientFilename()))->getExtension())
        );
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

        if (!in_array($extension, $allowedExtensions)) {
            $this->Flash->error(__('Invalid file type. Allowed types are jpg, jpeg, png, gif, pdf.'));

            return false;
        }

        // Create a unique filename
        $filename = preg_replace('/[^A-Za-z0-9_\-.]/', '_', $identifier) . '.' . uniqid() . '.' . $extension;
        $fullPath = $uploadPath . $filename;

        // Move the uploaded file to the destination
        try {
            $file->moveTo($fullPath);
            // Return the relative path to be saved in the database
            return 'attachments/' . $filename;
        } catch (Exception $e) {
            $this->Flash->error(__('Failed to move uploaded file.'));

            return false;
        }
    }
}
