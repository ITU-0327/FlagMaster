<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Delivery Entity
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $address_id
 * @property string|null $delivery_status
 * @property \Cake\I18n\Date|null $estimated_delivery_date
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Addres $addres
 */
class Delivery extends Entity
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
        'address_id' => true,
        'delivery_status' => true,
        'estimated_delivery_date' => true,
        'created_at' => true,
        'updated_at' => true,
        'order' => true,
        'addres' => true,
    ];
}
