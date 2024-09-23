<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\DateTime;
use Cake\Mailer\Mailer;
use Cake\ORM\Table;
use Cake\Utility\Security;
use Exception;
use Google\Client as GoogleClient;
use Google\Service\Oauth2 as Google_Service_Oauth2;

/**
 * Auth Controller
 *
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 */
class AuthController extends AppController
{
    /**
     * @var \Cake\ORM\Table
     */
    protected Table $Users;

    /**
     * Controller initialize override
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication');

        $this->viewBuilder()->setLayout('auth');

        $this->Authentication->allowUnauthenticated(['login', 'register', 'forgetPassword', 'resetPassword', 'googleLogin', 'googleCallback']);

        // CakePHP loads the model with the same name as the controller by default.
        // Since we don't have an Auth model, we'll need to load "Users" model when starting the controller manually.
        $this->Users = $this->fetchTable('Users');
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $turnstileResponse = $this->request->getData('cf-turnstile-response');
            if (!$this->verifyTurnstile($turnstileResponse)) {
                $this->Flash->error('Turnstile verification failed. Please try again.');

                return;
            }

            if ($data['password'] !== $data['password_confirm']) {
                $this->Flash->error('Password and confirm password do not match');
            } else {
                // Remove password_confirm from data before patching entity
                unset($data['password_confirm']);

                // Extract username from email
                $email = $data['email'];
                $data['username'] = substr($email, 0, strpos($email, '@'));

                $user = $this->Users->patchEntity($user, $data);

                if ($this->Users->save($user)) {
                    $profilesTable = $this->getTableLocator()->get('Profiles');

                    $randomNumber = rand(1, 12);
                    $profilePicture = "profile/user-{$randomNumber}.jpg";

                    $profile = $profilesTable->newEntity([
                        'user_id' => $user->id,
                        'first_name' => null,
                        'last_name' => null,
                        'profile_picture' => $profilePicture,
                    ]);

                    $profilesTable->save($profile);

                    // Reload the user with the Profiles association
                    $user = $this->Users->get(
                        $user->id,
                        fields: ['id', 'username', 'email', 'role'],
                        contain: [
                            'Profiles' => [
                                'fields' => ['first_name', 'last_name', 'profile_picture'],
                            ],
                        ]
                    );

                    $this->Authentication->setIdentity($user);

                    return $this->redirect($this->Authentication->getLoginRedirect() ?? ['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error('The user could not be registered. Please, try again.');
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Forget Password method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful email send, renders view otherwise.
     */
    public function forgetPassword()
    {
        if ($this->request->is('post')) {
            // Retrieve the user entity by provided email address
            $user = $this->Users->findByEmail($this->request->getData('email'))->first();
            if ($user) {
                // Set nonce and expiry date
                $user->nonce = Security::randomString(128);
                $user->nonce_expiry = new DateTime('7 days');
                if ($this->Users->save($user)) {
                    // Now let's send the password reset email
                    $mailer = new Mailer('default');

                    // email basic config
                    $mailer
                        ->setEmailFormat('both')
                        ->setTo($user->email)
                        ->setSubject('Reset your account password');

                    // select email template
                    $mailer
                        ->viewBuilder()
                        ->setTemplate('reset_password');

                    // transfer required view variables to email template
                    $mailer
                        ->setViewVars([
                            'first_name' => $user->first_name,
                            'last_name' => $user->last_name,
                            'nonce' => $user->nonce,
                            'email' => $user->email,
                        ]);

                    //Send email
                    if (!$mailer->deliver()) {
                        // Just in case something goes wrong when sending emails
                        $this->Flash->error('We have encountered an issue when sending you emails. Please try again. ');

                        return $this->render(); // Skip the rest of the controller and render the view
                    }
                } else {
                    // Just in case something goes wrong when saving nonce and expiry
                    $this->Flash->error('We are having issue to reset your password. Please try again. ');

                    return $this->render(); // Skip the rest of the controller and render the view
                }
            }

            /*
             * **This is a bit of a special design**
             * We don't tell the user if their account exists, or if the email has been sent,
             * because it may be used by someone with malicious intent. We only need to tell
             * the user that they'll get an email.
             */
            $this->Flash->success('Please check your inbox (or spam folder) for an email regarding how to reset your account password. ');

            return $this->redirect(['action' => 'login']);
        }
    }

    /**
     * Reset Password method
     *
     * @param string|null $nonce Reset password nonce
     * @return \Cake\Http\Response|null|void Redirects on successful password reset, renders view otherwise.
     */
    public function resetPassword(?string $nonce = null)
    {
        $user = $this->Users->findByNonce($nonce)->first();

        // If nonce cannot find the user, or nonce is expired, prompt for re-reset password
        if (!$user || $user->nonce_expiry < DateTime::now()) {
            $this->Flash->error('Your link is invalid or expired. Please try again.');

            return $this->redirect(['action' => 'forgetPassword']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            // Used a different validation set in Model/Table file to ensure both fields are filled
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'resetPassword']);

            // Also clear the nonce-related fields on successful password resets.
            // This ensures that the reset link can't be used a second time.
            $user->nonce = null;
            $user->nonce_expiry = null;

            if ($this->Users->save($user)) {
                $this->Flash->success('Your password has been successfully reset. Please login with new password. ');

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error('The password cannot be reset. Please try again.');
        }

        $this->set(compact('user'));
    }

    /**
     * Change Password method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function changePassword(?string $id = null)
    {
        $user = $this->Users->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Used a different validation set in Model/Table file to ensure both fields are filled
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'resetPassword']);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');

                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
            $this->Flash->error('The user could not be saved. Please, try again.');
        }
        $this->set(compact('user'));
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null|void Redirect to location before authentication
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($this->request->is('post')) {
            $turnstileResponse = $this->request->getData('cf-turnstile-response');
            if (!$this->verifyTurnstile($turnstileResponse)) {
                $this->Flash->error('Turnstile verification failed. Please try again.');

                return;
            }
        }

        // if user passes authentication, grant access to the system
        if ($result && $result->isValid()) {
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

            // set a fallback location in case user logged in without triggering 'unauthenticatedRedirect'
            $fallbackLocation = ['controller' => 'Users', 'action' => 'index'];

            // and redirect user to the location they're trying to access
            return $this->redirect($this->Authentication->getLoginRedirect() ?? $fallbackLocation);
        }

        // display error if user submitted their credentials but authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Email address and/or Password is incorrect. Please try again. ');
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null|void
     */
    public function logout()
    {
        $this->request->allowMethod(['post']);

        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            $this->Flash->success('You have been logged out successfully.');
        }

        return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
    }

    /**
     * Google Login method
     *
     * @return \Cake\Http\Response|null|void Redirect to Google login page
     */
    public function googleLogin()
    {
        $client = new GoogleClient();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(getenv('GOOGLE_REDIRECT_URI'));
        $client->addScope(['email', 'profile']);

        $authUrl = $client->createAuthUrl();

        return $this->redirect($authUrl);
    }

    /**
     * Google Login method
     *
     * @return \Cake\Http\Response|null|void Redirect to Google login page
     */
    public function googleCallback()
    {
        $this->request->allowMethod(['get']);

        $code = $this->request->getQuery('code');
        if (empty($code)) {
            $this->Flash->error('Login failed, no authorization code received.');

            return $this->redirect(['action' => 'login']);
        }

        $client = new GoogleClient();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(getenv('GOOGLE_REDIRECT_URI'));

        try {
            $accessToken = $client->fetchAccessTokenWithAuthCode($code);

            if (isset($accessToken['error'])) {
                $this->Flash->error('Login failed, unable to get access token.');

                return $this->redirect(['action' => 'login']);
            }

            $client->setAccessToken($accessToken);

            $oauth2 = new Google_Service_Oauth2($client);
            $googleUser = $oauth2->userinfo->get();

            $usersTable = $this->Users;

            // Attempt to find existing user by oauth_provider and oauth_id
            $user = $usersTable->find()
                ->where([
                    'oauth_provider' => 'google',
                    'oauth_id' => $googleUser->id,
                ])
                ->first();

            if (!$user) {
                // Check if a user with the same email exists
                $user = $usersTable->find()
                    ->where(['email' => $googleUser->email])
                    ->first();

                if ($user) {
                    // Update the user's oauth_provider and oauth_id
                    $user = $usersTable->patchEntity($user, [
                        'oauth_provider' => 'google',
                        'oauth_id' => $googleUser->id,
                    ]);
                } else {
                    $username = substr($googleUser->email, 0, strpos($googleUser->email, '@'));

                    // Create a new user
                    $user = $usersTable->newEntity([
                        'email' => $googleUser->email,
                        'username' => $username,
                        'oauth_provider' => 'google',
                        'oauth_id' => $googleUser->id,
                        'role' => 'customer',
                    ]);
                }

                if (!$usersTable->save($user)) {
                    $this->Flash->error('Unable to register user.');

                    return $this->redirect(['action' => 'login']);
                }

                $profilesTable = $this->getTableLocator()->get('Profiles');

                $profilePictureUrl = $googleUser->picture;

                $filename = preg_replace('/[^A-Za-z0-9_\-.]/', '_', $user->username) . '.' . uniqid() . '.jpg';

                $uploadPath = WWW_ROOT . 'img' . DS . 'profile' . DS;

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                $fullPath = $uploadPath . $filename;

                $imageContent = file_get_contents($profilePictureUrl);
                if ($imageContent !== false) {
                    file_put_contents($fullPath, $imageContent);

                    $profilePicturePath = 'profile/' . $filename;
                } else {
                    $randomNumber = rand(1, 12);
                    $profilePicturePath = "profile/user-{$randomNumber}.jpg";
                }

                $profile = $profilesTable->find()
                    ->where(['user_id' => $user->id])
                    ->first();

                if ($profile) {
                    $profile = $profilesTable->patchEntity($profile, [
                        'first_name' => $googleUser->givenName,
                        'last_name' => $googleUser->familyName,
                        'profile_picture' => $profilePicturePath,
                    ]);
                } else {
                    $profile = $profilesTable->newEntity([
                        'user_id' => $user->id,
                        'first_name' => $googleUser->givenName,
                        'last_name' => $googleUser->familyName,
                        'profile_picture' => $profilePicturePath,
                    ]);
                }

                $profilesTable->save($profile);
            }

            // Always reload the user with specified fields and profile
            $user = $usersTable->get(
                $user->id,
                fields: ['id', 'username', 'email', 'role'],
                contain: [
                    'Profiles' => [
                        'fields' => ['first_name', 'last_name', 'profile_picture'],
                    ],
                ]
            );

            // Set the identity with the reloaded user
            $this->Authentication->setIdentity($user);

            // Redirect to desired page
            return $this->redirect($this->Authentication->getLoginRedirect() ?? ['controller' => 'Users', 'action' => 'index']);
        } catch (Exception $e) {
            $this->Flash->error('Login failed: ' . $e->getMessage());

            return $this->redirect(['action' => 'login']);
        }
    }

    /**
     * Verify Turnstile method
     *
     * @param string $token Turnstile token
     * @return bool
     */
    private function verifyTurnstile(string $token): bool
    {
        $secretKey = getenv('TURNSTILE_SECRET_KEY');
        if (empty($secretKey)) {
            // Log the error for developers
            $this->log('Turnstile secret key is not set.', 'error');

            return false;
        }

        $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

        $data = [
            'secret' => $secretKey,
            'response' => $token,
            'remoteip' => $this->request->clientIp(),
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === false) {
            // Log the error for developers
            $error = error_get_last();
            $this->log('Failed to contact Turnstile verification server: ' . $error['message'], 'error');

            return false;
        }

        $response = json_decode($result, true);

        if (!isset($response['success']) || !$response['success']) {
            // Log the error codes for developers
            $errorCodes = isset($response['error-codes']) ? implode(', ', $response['error-codes']) : 'Unknown error';
            $this->log('Turnstile verification failed: ' . $errorCodes, 'error');

            return false;
        }

        return true;
    }
}
