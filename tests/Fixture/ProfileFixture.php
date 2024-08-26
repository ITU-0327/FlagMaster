<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfileFixture
 */
class ProfileFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'profile';
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
                'address_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor ',
                'created_at' => 1724685248,
                'updated_at' => 1724685248,
            ],
        ];
        parent::init();
    }
}
