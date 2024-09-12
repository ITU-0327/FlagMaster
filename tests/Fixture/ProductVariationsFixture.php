<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductVariationsFixture
 */
class ProductVariationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'product_id' => 1,
                'variation_type' => 'Lorem ipsum dolor sit amet',
                'variation_value' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1724847103,
                'updated_at' => 1724847103,
            ],
        ];
        parent::init();
    }
}
