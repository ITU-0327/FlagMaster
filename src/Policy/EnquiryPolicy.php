<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Enquiry;
use Authorization\IdentityInterface;

/**
 * Enquiry policy
 */
class EnquiryPolicy
{
    /**
     * Check if $user can add Enquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Enquiry $enquiry
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Enquiry $enquiry): bool
    {
        return true;
    }

    /**
     * Check if $user can edit Enquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Enquiry $enquiry
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Enquiry $enquiry): bool
    {
        if ($user->role === 'admin') {
            // Admins can view any enquiry
            return true;
        }

        // Regular users can view their own enquiries
        return $enquiry->user_id === $user->id;
    }

    /**
     * Check if $user can delete Enquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Enquiry $enquiry
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Enquiry $enquiry): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Check if $user can view Enquiry
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Enquiry $enquiry
     * @return bool
     */
    public function canView(IdentityInterface $user, Enquiry $enquiry): bool
    {
        if ($user->role === 'admin') {
            // Admins can view any enquiry
            return true;
        }

        // Regular users can view their own enquiries
        return $enquiry->user_id === $user->id;
    }
}
