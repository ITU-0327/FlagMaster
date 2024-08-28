<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'user_id' => 1,
                'order_date' => 1724847115,
                'total_amount' => 1.5,
                'status' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1724847115,
                'updated_at' => 1724847115,
            ],
        ];
        parent::init();
    }
}
