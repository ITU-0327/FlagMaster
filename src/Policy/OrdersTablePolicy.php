<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Orders policy
 */
class OrdersTablePolicy
{
    /**
     * Scope for index action to limit orders based on user role.
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \Cake\ORM\Query $query The query to modify.
     * @return \Cake\ORM\Query
     */
    public function scopeIndex(IdentityInterface $user, Query $query): Query
    {
        if ($user->role === 'admin') {
            // Admins can see all orders
            return $query;
        }

        // Customers can only see their own orders
        return $query->where(['Orders.user_id' => $user->id]);
    }

    /**
     * Check if $user can list Order
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @return bool
     */
    public function canList(IdentityInterface $user): bool
    {
        return $user->role === 'admin';
    }
}
