<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductImagesFixture
 */
class ProductImagesFixture extends TestFixture
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
                'image_url' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1724847097,
                'updated_at' => 1724847097,
            ],
        ];
        parent::init();
    }
}
