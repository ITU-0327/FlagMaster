<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'payment_date' => 1724847156,
                'amount' => 1.5,
                'payment_method' => 'Lorem ipsum dolor sit amet',
                'stripe_payment_id' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1724847156,
                'updated_at' => 1724847156,
            ],
        ];
        parent::init();
    }
}
