<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property \Cake\I18n\DateTime|null $order_date
 * @property string $total_amount
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Delivery[] $delivery
 * @property \App\Model\Entity\OrderItem[] $order_item
 * @property \App\Model\Entity\Payment[] $payment
 */
class Order extends Entity
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
        'user_id' => true,
        'order_date' => true,
        'total_amount' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'delivery' => true,
        'order_item' => true,
        'payment' => true,
    ];
}
