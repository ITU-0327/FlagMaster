<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressesTable;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * App\Model\Table\AddressesTable Test Case
 */
class AddressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressesTable
     */
    protected $Addresses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected array $fixtures = [
        'app.Addresses',
        'app.Deliveries',
        'app.Profiles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Addresses') ? [] : ['className' => AddressesTable::class];
        $this->Addresses = TableRegistry::getTableLocator()->get('Addresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Addresses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $data = [
            'street' => '123 Main St',
            'city' => 'Sample City',
            'state' => 'Sample State',
            'postal_code' => '12345',
            'country' => 'Sample Country',
            'created_at' => null,
            'updated_at' => null,
        ];

        $address = $this->Addresses->newEntity($data);
        $this->assertEmpty($address->getErrors());

        // Test missing required fields
        $dataMissingFields = [
            'street' => '',
            'city' => '',
            'state' => '',
            'postal_code' => '',
            'country' => '',
        ];
        $address = $this->Addresses->newEntity($dataMissingFields);
        $errors = $address->getErrors();
        $this->assertArrayHasKey('street', $errors);
        $this->assertArrayHasKey('city', $errors);
        $this->assertArrayHasKey('state', $errors);
        $this->assertArrayHasKey('postal_code', $errors);
        $this->assertArrayHasKey('country', $errors);

        // Test max length validation
        $dataInvalidLength = [
            'street' => str_repeat('a', 256),
            'city' => str_repeat('a', 101),
            'state' => str_repeat('a', 101),
            'postal_code' => str_repeat('a', 21),
            'country' => str_repeat('a', 101),
        ];
        $address = $this->Addresses->newEntity($dataInvalidLength);
        $errors = $address->getErrors();
        $this->assertArrayHasKey('street', $errors);
        $this->assertArrayHasKey('city', $errors);
        $this->assertArrayHasKey('state', $errors);
        $this->assertArrayHasKey('postal_code', $errors);
        $this->assertArrayHasKey('country', $errors);
    }

    /**
     * Test unique id validation
     *
     * @return void
     */
    public function testUniqueId(): void
    {
        // First, create and save an address entity with a specific id
        $data1 = [
            'id' => 1,
            'street' => '123 Main St',
            'city' => 'Sample City',
            'state' => 'Sample State',
            'postal_code' => '12345',
            'country' => 'Sample Country',
        ];
        $address1 = $this->Addresses->newEntity($data1);
        $this->Addresses->save($address1);

        // Now, try to create and save another address entity with the same id
        $data2 = [
            'id' => 1, // Same id as above
            'street' => '456 Another St',
            'city' => 'Another City',
            'state' => 'Another State',
            'postal_code' => '67890',
            'country' => 'Another Country',
        ];
        $address2 = $this->Addresses->newEntity($data2);
        $result = $this->Addresses->save($address2);

        // Assert that the second save attempt fails because of the unique id constraint
        $this->assertFalse($result);

        // Alternatively, you can check for errors in the second entity
        $errors = $address2->getErrors();
        $this->assertNotEmpty($errors);
        $this->assertArrayHasKey('_existsIn', $errors);
    }
}
