<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'username' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor sit amet',
                'oauth_provider' => 'Lorem ipsum dolor sit amet',
                'oauth_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1724685216,
                'updated_at' => 1724685216,
            ],
        ];
        parent::init();
    }
}
