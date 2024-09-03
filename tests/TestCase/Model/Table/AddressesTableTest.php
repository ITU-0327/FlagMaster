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
}
