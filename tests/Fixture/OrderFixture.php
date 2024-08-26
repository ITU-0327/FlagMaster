<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderFixture
 */
class OrderFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'order';
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
                'order_date' => 1724681896,
                'total_amount' => 1.5,
                'STATUS' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1724681896,
                'updated_at' => 1724681896,
            ],
        ];
        parent::init();
    }
}
