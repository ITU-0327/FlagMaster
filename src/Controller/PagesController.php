<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/5/en/controllers/pages-controller.html
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Allow the 'display' action to be accessed without login for the homepage
        $this->Authentication->allowUnauthenticated(['display']);
        $this->Authorization->skipAuthorization();
    }

    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }

        // Only apply the redirection logic for the 'home' page
        if ($page === 'home') {
            $identity = $this->Authentication->getIdentity();
            if ($identity) {
                // User is authenticated; determine redirect based on role
                $role = $identity->get('role');
                $redirect = $this->determineRedirectByRole($role);

                return $this->redirect($redirect);
            }
        }

        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    /**
     * aboutUs method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function aboutUs()
    {
        $this->viewBuilder()->setLayout('default');
    }

    /**
     * faq method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function faq()
    {
        $this->viewBuilder()->setLayout('default');
    }

    /**
     * Determine redirect location based on user role.
     *
     * @param string|null $role User role.
     * @return array Redirect URL array.
     */
    protected function determineRedirectByRole(?string $role): array
    {
        return match ($role) {
            'admin' => ['controller' => 'Users', 'action' => 'index'],
            default => ['controller' => 'Products', 'action' => 'index'],
        };
    }
}
