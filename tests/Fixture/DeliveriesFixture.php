<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeliveriesFixture
 */
class DeliveriesFixture extends TestFixture
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
                'address_id' => 1,
                'delivery_status' => 'Lorem ipsum dolor sit amet',
                'estimated_delivery_date' => '2024-08-28',
                'created_at' => 1724847130,
                'updated_at' => 1724847130,
            ],
        ];
        parent::init();
    }
}
