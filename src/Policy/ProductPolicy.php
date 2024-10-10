<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Product;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;

/**
 * Product policy
 */
class ProductPolicy
{
    /**
     * Check if $user can add Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return \Authorization\Policy\Result
     */
    public function canAdd(IdentityInterface $user, Product $product): Result
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can edit Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return \Authorization\Policy\Result
     */
    public function canEdit(IdentityInterface $user, Product $product): Result
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can delete Product
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return \Authorization\Policy\Result
     */
    public function canDelete(IdentityInterface $user, Product $product): Result
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine if the user can view a product.
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product The product entity.
     * @return \Authorization\Policy\ResultInterface
     */
    public function canView(IdentityInterface $user, Product $product): Result
    {
        // Allow admin users to view all products
        if ($user->role === 'admin') {
            return new Result(true);
        }

        // Allow customers to view only published products
        if ($product->status === 'published') {
            return new Result(true);
        }

        // Deny access with a reason
        return new Result(false, 'Product is not published or user is not authorized');
    }

    /**
     * Check if $user can add Product to cart
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Product $product
     * @return \Authorization\Policy\Result
     */
    public function canAddToCart(IdentityInterface $user, Product $product): Result
    {
        if ($product->status === 'published') {
            return new Result(true);
        }

        return new Result(false, 'Product is not published');
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
