<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;

/**
 * Products policy
 */
class ProductsTablePolicy
{
    /**
     * Check if $user can index Product
     *
     * @param \Authorization\IdentityInterface|null $user The user.
     * @return bool
     */
    public function canIndex(?IdentityInterface $user): bool
    {
        return true;
    }

    /**
     * Check if $user can list Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @return bool
     */
    public function canList(IdentityInterface $user): bool
    {
        return $user->role === 'admin';
    }
}
