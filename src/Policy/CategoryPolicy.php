<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Category;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;

/**
 * Category policy
 */
class CategoryPolicy
{
    /**
     * Check if $user can add Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return \Authorization\Policy\Result
     */
    public function canAdd(IdentityInterface $user, Category $category): Result
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can edit Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return \Authorization\Policy\Result
     */
    public function canEdit(IdentityInterface $user, Category $category): Result
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can delete Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return \Authorization\Policy\Result
     */
    public function canDelete(IdentityInterface $user, Category $category): Result
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can view Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return \Authorization\Policy\Result
     */
    public function canView(IdentityInterface $user, Category $category): Result
    {
        return $this->isAdmin($user);
    }

    /**
     * Helper method to check if the user is an admin.
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @return \Authorization\Policy\Result
     */
    protected function isAdmin(IdentityInterface $user): Result
    {
        if ($user->role === 'admin') {
            return new Result(true);
        }

        // Optionally, provide a reason for the failure
        return new Result(false, 'not-admin');
    }
}
