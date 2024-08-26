<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int|null $order_id
 * @property \Cake\I18n\DateTime|null $payment_date
 * @property string $amount
 * @property string $payment_method
 * @property string|null $stripe_payment_id
 * @property string|null $STATUS
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 *
 * @property \App\Model\Entity\Order $order
 */
class Payment extends Entity
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
        'order_id' => true,
        'payment_date' => true,
        'amount' => true,
        'payment_method' => true,
        'stripe_payment_id' => true,
        'STATUS' => true,
        'created_at' => true,
        'updated_at' => true,
        'order' => true,
    ];
}
