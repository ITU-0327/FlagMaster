<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $username
 * @property string $email
 * @property string|null $password
 * @property string|null $role
 * @property string|null $oauth_provider
 * @property string|null $oauth_id
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 *
 * @property \App\Model\Entity\Enquiry[] $enquiries
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Profile $profile
 * @property \App\Model\Entity\Review[] $reviews
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'oauth_provider' => true,
        'oauth_id' => true,
        'created_at' => true,
        'updated_at' => true,
        'enquiries' => true,
        'orders' => true,
        'profiles' => true,
        'reviews' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password', 'oauth_provider', 'oauth_id',
    ];

    /**
     * _setPassword method
     *
     * @param string $password Password
     * @return string
     */
    protected function _setPassword(string $password): string
    {
        $hasher = new DefaultPasswordHasher();

        return $hasher->hash($password);
    }
}
