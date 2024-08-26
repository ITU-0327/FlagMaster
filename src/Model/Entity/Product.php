<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $NAME
 * @property string|null $description
 * @property string $price
 * @property int $stock_quantity
 * @property int|null $category_id
 * @property string|null $image_url
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\OrderItem[] $order_item
 * @property \App\Model\Entity\Review[] $review
 */
class Product extends Entity
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
        'NAME' => true,
        'description' => true,
        'price' => true,
        'stock_quantity' => true,
        'category_id' => true,
        'image_url' => true,
        'created_at' => true,
        'updated_at' => true,
        'category' => true,
        'order_item' => true,
        'review' => true,
    ];
}
