<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeliveryFixture
 */
class DeliveryFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'delivery';
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
                'estimated_delivery_date' => '2024-08-26',
                'created_at' => 1724681904,
                'updated_at' => 1724681904,
            ],
        ];
        parent::init();
    }
}
