<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ProductImagesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ProductImagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public array$fixtures = [
        'app.ProductImages',
        'app.Products',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->get('/product-images');
        $this->assertResponseOk(); // Check response status 200
        $this->assertResponseContains('Product Images'); // Check content
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->get('/product-images/view/1'); // Assuming '1' is a valid ID in your fixture
        $this->assertResponseOk();
        $this->assertResponseContains('Product Image');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $postData = [
            'product_id' => 1, // Assuming valid product_id
            'image_path' => 'path/to/image.jpg'
        ];

        $this->post('/product-images/add', $postData);
        $this->assertResponseSuccess();
        $this->assertRedirect(['action' => 'index']); // Redirect on success
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $postData = [
            'product_id' => 1,
            'image_path' => 'new/path/to/image.jpg'
        ];

        $this->put('/product-images/edit/1', $postData); // Assuming '1' is a valid ID
        $this->assertResponseSuccess();
        $this->assertRedirect(['action' => 'index']);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->delete('/product-images/delete/1'); // Assuming '1' is a valid ID
        $this->assertRedirect(['action' => 'index']);
    }
}
