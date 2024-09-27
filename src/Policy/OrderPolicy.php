<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Order;
use Authorization\IdentityInterface;

/**
 * Order policy
 */
class OrderPolicy
{
    /**
     * Check if $user can add Order
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Order $order
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Order $order): bool
    {
        return true;
    }

    /**
     * Check if $user can edit Order
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Order $order
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Order $order): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Check if $user can delete Order
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Order $order
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Order $order): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Check if $user can view Order
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Order $order
     * @return bool
     */
    public function canView(IdentityInterface $user, Order $order): bool
    {
        if ($user->role === 'admin') {
            // Admins can view any order
            return true;
        }

        // Customers can view their own orders
        return $order->user_id === $user->id;
    }
}
