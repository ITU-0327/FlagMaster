<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

class UserHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @return array
     */
    public function getUserInfo(): array
    {
        $user = $this->getView()->getRequest()->getAttribute('identity');

        // Initialize variables with default values
        $user_id = null;
        $profilePicture = 'profile/user-1.jpg';
        $fullName = 'Guest';
        $username = 'Guest';
        $email = '';
        $user_role = null;

        // Check if the user object is not null
        if ($user) {
            $user_id = $user->id;
            $username = h($user->username);
            $email = h($user->email);
            $fullName = h($user->username); // Default full name is username if no first/last name
            $user_role = $user->role;

            // Check if user profile is available
            if ($user->profile) {
                if (!empty($user->profile->first_name) || !empty($user->profile->last_name)) {
                    $fullName = h(trim($user->profile->first_name . ' ' . $user->profile->last_name));
                }
                if (!empty($user->profile->profile_picture)) {
                    $profilePicture = h($user->profile->profile_picture);
                }
            }
        }

        return compact('user_id', 'profilePicture', 'fullName', 'username', 'email', 'user_role');
    }
}
