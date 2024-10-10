<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Enquiries policy
 */
class EnquiriesTablePolicy
{
    /**
     * Scope for index action to limit enquiries based on user role.
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \Cake\ORM\Query $query The query to modify.
     * @return \Cake\ORM\Query
     */
    public function scopeIndex(IdentityInterface $user, Query $query): Query
    {
        if ($user->role === 'admin') {
            // Admins can see all enquiries
            return $query;
        }

        // Regular users can only see their own enquiries
        return $query->where(['Enquiries.user_id' => $user->id]);
    }

    /**
     * Check if $user can list enquiries
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @return bool
     */
    public function canList(IdentityInterface $user): bool
    {
        return $user->role === 'admin';
    }
}
