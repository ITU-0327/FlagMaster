<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomFlagEnquiriesFixture
 */
class CustomFlagEnquiriesFixture extends TestFixture
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
                'enquiry_id' => 1,
                'flag_size' => 'Lorem ipsum dolor sit amet',
                'flag_color' => 'Lorem ipsum dolor sit amet',
                'attachment_url' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1727698449,
                'updated_at' => 1727698449,
            ],
        ];
        parent::init();
    }
}
