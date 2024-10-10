<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersProductsFixture
 */
class OrdersProductsFixture extends TestFixture
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
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'unit_price' => 1.5,
                'total_price' => 1.5,
                'created_at' => 1727880895,
                'updated_at' => 1727880895,
            ],
        ];
        parent::init();
    }
}
