<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ProductsController Test Case
 */
class ProductsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public array $fixtures = [
        'app.Products',
        'app.Categories',
        'app.Orders',
        'app.ProductImages',
        'app.ProductVariations',
        'app.Reviews'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->get('/products');
        $this->assertResponseOk();
        $this->assertResponseContains('Products'); // Check if 'Products' text is in the response
        $this->assertCount(3, $this->viewVariable('products')); // Assuming there are 3 products in fixture
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->get('/products/view/1');
        $this->assertResponseOk();
        $this->assertResponseContains('Product 1'); // Assuming product 1 exists
        $this->assertNotEmpty($this->viewVariable('product'));
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        // Simulate POST request to add a product
        $data = [
            'name' => 'New Product',
            'price' => 99.99,
            'category_id' => 1, // Assuming valid category
            'order_id' => 1 // Assuming valid order
        ];
        $this->post('/products/add', $data);

        $this->assertRedirect('/products'); // Expect redirect to index after successful add
        $this->assertFlashMessage('The product has been saved.'); // Check flash success message
    }

    /**
     * Test add failure (invalid data)
     *
     * @return void
     */
    public function testAddFailure(): void
    {
        $data = [
            'name' => '', // Name is required, so this will fail
            'price' => 99.99
        ];
        $this->post('/products/add', $data);

        $this->assertResponseOk(); // Ensure the form re-renders
        $this->assertFlashMessage('The product could not be saved. Please, try again.'); // Failure flash message
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $data = [
            'name' => 'Updated Product Name',
            'price' => 120.00
        ];
        $this->put('/products/edit/1', $data); // Edit product with ID 1

        $this->assertRedirect('/products'); // Check if redirected back to index
        $this->assertFlashMessage('The product has been saved.'); // Check success flash message
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->delete('/products/delete/1'); // Delete product with ID 1

        $this->assertRedirect('/products'); // After deletion, redirect back to index
        $this->assertFlashMessage('The product has been deleted.'); // Check success message
    }

    /**
     * Test delete method failure (invalid ID)
     *
     * @return void
     */
    public function testDeleteFailure(): void
    {
        $this->delete('/products/delete/999'); // Attempt to delete non-existent product

        $this->assertRedirect('/products'); // Should still redirect to index
        $this->assertFlashMessage('The product could not be deleted. Please, try again.'); // Check failure message
    }
}
