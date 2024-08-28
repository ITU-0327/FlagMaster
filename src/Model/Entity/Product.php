<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $price
 * @property string|null $discount_type
 * @property string|null $discount_value
 * @property int $stock_quantity
 * @property string|null $thumbnail_url
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 *
 * @property \App\Model\Entity\ProductImage[] $product_images
 * @property \App\Model\Entity\ProductVariation[] $product_variations
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\Order[] $orders
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
        'name' => true,
        'description' => true,
        'price' => true,
        'discount_type' => true,
        'discount_value' => true,
        'stock_quantity' => true,
        'thumbnail_url' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'product_images' => true,
        'product_variations' => true,
        'reviews' => true,
        'categories' => true,
        'orders' => true,
    ];
}
