<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

/**
 * User policy
 */
class UserPolicy
{
    /**
     * Check if $user can edit User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canEdit(IdentityInterface $user, User $resource): bool
    {
        // Users can edit their own profile
        return $user->id === $resource->id;
    }

    /**
     * Check if $user can delete User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canDelete(IdentityInterface $user, User $resource): bool
    {
        // Users can delete their own profile
        if ($user->id === $resource->id) {
            return true;
        }

        // Only admins can add users
        return $user->role === 'admin';
    }

    /**
     * Check if $user can view User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canView(IdentityInterface $user, User $resource): bool
    {
        // All logged-in users can view their own profile
        if ($user->id === $resource->id) {
            return true;
        }

        // Admins can view any user
        return $user->role === 'admin';
    }
}
