<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Response;
use Exception;
use Laminas\Diactoros\UploadedFile;
use Psr\Http\Message\UploadedFileInterface;
use SplFileInfo;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->authorize($this->Users);

        $users = $this->Users->find('all')
            ->contain(['Profiles']);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $user = $this->Users->get(
            $id,
            contain: ['Profiles' => ['Addresses']]
        );
        $this->Authorization->authorize($user);
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $user = $this->Users->get(
            $id,
            contain: ['Profiles' => ['Addresses']]
        );
        $this->Authorization->authorize($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Handle profile picture upload
            $file = $this->request->getData('profile.profile_picture');
            if ($file instanceof UploadedFile && $file->getError() === UPLOAD_ERR_OK) {
                $filename = $this->uploadProfilePicture($file, $user->username);
                if ($filename) {
                    $data['profile']['profile_picture'] = $filename;
                } else {
                    $this->Flash->error(__('Unable to upload profile picture.'));
                    unset($data['profile']['profile_picture']); // Prevent overwriting with null
                }
            } else {
                // If no new image uploaded, remove it from the data to prevent overwriting
                unset($data['profile']['profile_picture']);
            }

            // Handle password change
            if (!empty($data['current_password']) || !empty($data['new_password']) || !empty($data['confirm_password'])) {
                $user = $this->Users->patchEntity($user, $data, [
                    'fields' => ['current_password', 'new_password', 'confirm_password'],
                    'validate' => 'password',
                ]);

                if (!empty($data['new_password'])) {
                    $user->password = $data['new_password'];
                }
            }

            // Handle address association if there is meaningful address data
            $addressData = $data['profile']['address'] ?? [];
            $hasAddressData = array_filter($addressData, function ($value) {
                return !empty($value); // Check if any field has data
            });

            if (!empty($hasAddressData)) {
                // Only proceed if all required fields are filled
                if (!empty($addressData['street']) && !empty($addressData['city']) && !empty($addressData['state']) && !empty($addressData['postal_code']) && !empty($addressData['country'])) {
                    if ($user->profile->address_id) {
                        // Update existing address
                        $address = $this->Users->Profiles->Addresses->get($user->profile->address_id);
                    } else {
                        $address = $this->Users->Profiles->Addresses->newEmptyEntity();
                    }

                    $user->profile->address = $this->Users->Profiles->Addresses->patchEntity(
                        $address,
                        $addressData
                    );

                    if ($this->Users->Profiles->Addresses->save($user->profile->address)) {
                        $this->Flash->success(__('Your address has been updated.'));
                    } else {
                        $this->Flash->error(__('The address could not be saved. Please, try again.'));
                    }
                } else {
                    // Provide feedback that address fields must all be filled to save the address
                    $this->Flash->error(__('Please fill in all address fields to save your address.'));
                }
            } else {
                // If no meaningful address data is provided, do not attempt to update or create an address
                $user->profile->address = null;
            }

            // Patch user and associated data
            $user = $this->Users->patchEntity($user, $data, [
                'associated' => ['Profiles' => ['Addresses']],
            ]);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile has been updated.'));

                // Get the authenticated user
                $user = $this->Authentication->getIdentity();

                // Reload the user entity including the Profiles association
                $user = $this->Users->get(
                    $user->id,
                    fields: ['id', 'username', 'email', 'role'],
                    contain: [
                        'Profiles' => [
                            'fields' => ['first_name', 'last_name', 'profile_picture'],
                        ],
                    ]
                );

                // Update the identity with the reloaded user
                $this->Authentication->setIdentity($user);

                return $this->redirect(['action' => 'view', $user->id]);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Authorization->authorize($user);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Promote a customer to admin.
     *
     * @param int $id User ID to promote.
     * @return \Cake\Http\Response|null Redirects to index on success, renders view otherwise.
     * @throws \Cake\Http\Exception\NotFoundException When user not found.
     */
    public function promote(?int $id = null): ?Response
    {
        try {
            // Fetch the user by ID, including the profile
            $user = $this->Users->get($id);
            $this->Authorization->authorize($user);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error(__('User not found.'));

            return $this->redirect(['action' => 'index']);
        }

        // Check if the user is already an admin
        if ($user->role === 'admin') {
            $this->Flash->info(__('User {0} is already an admin.', h($user->username)));

            return $this->redirect(['action' => 'index']);
        }

        // Update the user's role to 'admin'
        $user->role = 'admin';

        if ($this->Users->save($user)) {
            $this->Flash->success(__('User {0} has been promoted to Admin.', h($user->username)));
        } else {
            $this->Flash->error(__('Unable to promote user. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Upload a profile picture
     *
     * @param \Psr\Http\Message\UploadedFileInterface $file The uploaded file
     * @param string $username The username of the user
     * @return string|bool The relative path to the uploaded file, or false on failure
     */
    private function uploadProfilePicture(UploadedFileInterface $file, string $username): bool|string
    {
        $uploadPath = WWW_ROOT . 'img' . DS . 'profile' . DS;

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
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $allowedExtensions)) {
            $this->Flash->error(__('Invalid file type. Allowed types are jpg, jpeg, png, gif.'));

            return false;
        }

        // Create a unique filename
        $filename = preg_replace('/[^A-Za-z0-9_\-.]/', '_', $username) . '.' . uniqid() . '.' . $extension;
        $fullPath = $uploadPath . $filename;

        // Move the uploaded file to the destination
        try {
            $file->moveTo($fullPath);
            // Return the relative path to be saved in the database
            return 'profile/' . $filename;
        } catch (Exception $e) {
            $this->Flash->error(__('Failed to move uploaded file.'));

            return false;
        }
    }
}
