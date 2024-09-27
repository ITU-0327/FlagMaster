<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\CategoriesTable;
use Authorization\IdentityInterface;

/**
 * Categories policy
 */
class CategoriesTablePolicy
{
    /**
     * Check if $user can index User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @return bool
     */
    public function canIndex(IdentityInterface $user): bool
    {
        // Only admins can view the list of users
        return $user->role === 'admin';
    }
}
