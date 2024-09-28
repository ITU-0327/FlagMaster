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
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Authorization.Authorization');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\EventInterface $event The beforeRender event.
     * @return \Cake\Http\ResponseInterface|null|void
     */
    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event);

        // Retrieve the currently logged-in user
        $identity = $this->request->getAttribute('identity');

        if ($identity) {
            $role = $identity->get('role');

            // Determine theme settings based on role
            $themeSettings = $this->getThemeSettings($role);

            // Pass the user role to the view
            $this->set('userRole', $role);
        } else {
            // Default theme settings for guests or unauthenticated users
            $themeSettings = [
                'Layout' => 'vertical',
                'SidebarType' => 'full',
                'BoxedLayout' => true,
                'Direction' => 'ltr',
                'Theme' => 'light',
                'ColorTheme' => 'Blue_Theme',
                'cardBorder' => false,
            ];

            // Pass a default role or null for guests
            $this->set('userRole', null);
        }

        // Pass theme settings to the view
        $this->set('themeSettings', $themeSettings);
    }

    /**
     * Define theme settings based on user role.
     *
     * @param string $role User role (e.g., 'admin', 'customer').
     * @return array Theme settings.
     */
    protected function getThemeSettings(string $role): array
    {
        return match ($role) {
            'admin' => [
                'Layout' => 'vertical',
                'SidebarType' => 'full',
                'BoxedLayout' => true,
                'Direction' => 'ltr',
                'Theme' => 'light',
                'ColorTheme' => 'Blue_Theme',
                'cardBorder' => false,
            ],
            'customer' => [
                'Layout' => 'horizontal',
                'SidebarType' => 'full',
                'BoxedLayout' => true,
                'Direction' => 'ltr',
                'Theme' => 'light',
                'ColorTheme' => 'Blue_Theme',
                'cardBorder' => false,
            ],
            default => [
                'Layout' => 'vertical',
                'SidebarType' => 'full',
                'BoxedLayout' => true,
                'Direction' => 'ltr',
                'Theme' => 'light',
                'ColorTheme' => 'Blue_Theme',
                'cardBorder' => false,
            ],
        };
    }
}
