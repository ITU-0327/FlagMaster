<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnquiriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnquiriesTable Test Case
 */
class EnquiriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnquiriesTable
     */
    protected $Enquiries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Enquiries',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Enquiries') ? [] : ['className' => EnquiriesTable::class];
        $this->Enquiries = TableRegistry::getTableLocator()->get('Enquiries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Enquiries);

        parent::tearDown();
    }

    /**
     * Test table initialization
     */
    public function testInitialize(): void
    {
        $this->assertEquals('enquiries', $this->Enquiries->getTable());
        $this->assertEquals('subject', $this->Enquiries->getDisplayField());
        $this->assertEquals('id', $this->Enquiries->getPrimaryKey());
        $this->assertInstanceOf(\Cake\ORM\Association\BelongsTo::class, $this->Enquiries->Users);
    }

    /**
     * Test validation of `user_id`
     */
    public function testValidationUserId(): void
    {
        $enquiry = $this->Enquiries->newEmptyEntity();

        // Valid user_id
        $data = ['user_id' => 1];
        $enquiry = $this->Enquiries->patchEntity($enquiry, $data);
        $this->assertEmpty($enquiry->getErrors(), 'Valid user_id failed validation');

        // Empty user_id (allowed)
        $data = ['user_id' => null];
        $enquiry = $this->Enquiries->patchEntity($enquiry, $data);
        $this->assertEmpty($enquiry->getErrors(), 'Empty user_id should be allowed');
    }

    /**
     * Test validation of `subject`
     */
    public function testValidationSubject(): void
    {
        // Valid subject
        $enquiry = $this->Enquiries->newEntity(['subject' => 'Valid subject']);
        $this->assertEmpty($enquiry->getErrors(), 'Valid subject failed validation');

        // Empty subject
        $enquiry = $this->Enquiries->newEntity(['subject' => '']);
        $this->assertNotEmpty($enquiry->getErrors(), 'Empty subject passed validation');
        $this->assertArrayHasKey('subject', $enquiry->getErrors());

        // Subject longer than 255 characters
        $longSubject = str_repeat('A', 256);
        $enquiry = $this->Enquiries->newEntity(['subject' => $longSubject]);
        $this->assertNotEmpty($enquiry->getErrors(), 'Subject longer than 255 characters passed validation');
    }

    /**
     * Test validation of `message`
     */
    public function testValidationMessage(): void
    {
        // Valid message
        $enquiry = $this->Enquiries->newEntity(['message' => 'This is a valid message.']);
        $this->assertEmpty($enquiry->getErrors(), 'Valid message failed validation');

        // Empty message
        $enquiry = $this->Enquiries->newEntity(['message' => '']);
        $this->assertNotEmpty($enquiry->getErrors(), 'Empty message passed validation');
        $this->assertArrayHasKey('message', $enquiry->getErrors());
    }

    /**
     * Test validation of `status`
     */
    public function testValidationStatus(): void
    {
        // Valid status
        $enquiry = $this->Enquiries->newEntity(['status' => 'pending']);
        $this->assertEmpty($enquiry->getErrors(), 'Valid status failed validation');

        // Empty status (allowed)
        $enquiry = $this->Enquiries->newEntity(['status' => null]);
        $this->assertEmpty($enquiry->getErrors(), 'Empty status should be allowed');
    }

    /**
     * Test validation of `created_at` and `updated_at`
     */
    public function testValidationDateTimeFields(): void
    {
        // Valid date
        $enquiry = $this->Enquiries->newEntity(['created_at' => '2023-09-04 12:00:00']);
        $this->assertEmpty($enquiry->getErrors(), 'Valid created_at failed validation');

        // Invalid date format
        $enquiry = $this->Enquiries->newEntity(['created_at' => 'InvalidDate']);
        $this->assertNotEmpty($enquiry->getErrors(), 'Invalid date format passed validation');
    }

    /**
     * Test foreign key rule for `user_id`
     */
    public function testBuildRules(): void
    {
        // Valid user_id
        $enquiry = $this->Enquiries->newEntity([
            'user_id' => 1,
            'subject' => 'Valid subject',
            'message' => 'Test message',
        ]);
        $this->Enquiries->save($enquiry);
        $this->assertEmpty($enquiry->getErrors(), 'Foreign key rule failed for valid user_id');

        // Invalid user_id (non-existent user)
        $enquiry = $this->Enquiries->newEntity([
            'user_id' => 9999, // Assuming this user does not exist
            'subject' => 'Invalid Enquiry',
            'message' => 'Test message',
        ]);
        $result = $this->Enquiries->save($enquiry);
        $this->assertFalse($result, 'Foreign key rule did not fail for invalid user_id');
    }

    /**
     * Test creating a valid enquiry
     */
    public function testCreateValidEnquiry(): void
    {
        $data = [
            'user_id' => 1,
            'subject' => 'Test Enquiry',
            'message' => 'This is a test enquiry.',
            'status' => 'pending',
            'created_at' => '2023-09-04 12:00:00',
            'updated_at' => '2023-09-04 12:00:00',
        ];
        $enquiry = $this->Enquiries->newEntity($data);
        $this->assertEmpty($enquiry->getErrors(), 'Valid enquiry failed validation');
        $this->Enquiries->save($enquiry);
        $this->assertNotNull($enquiry->id, 'Enquiry was not saved');
    }

    /**
     * Test creating an enquiry with missing subject (should fail)
     */
    public function testCreateInvalidEnquiry(): void
    {
        $data = [
            'user_id' => 1,
            'subject' => '',
            'message' => 'This is a test enquiry without subject.',
        ];
        $enquiry = $this->Enquiries->newEntity($data);
        $this->assertNotEmpty($enquiry->getErrors(), 'Invalid enquiry with missing subject passed validation');
    }

    /**
     * Test updating an enquiry
     */
    public function testUpdateEnquiry(): void
    {
        $enquiry = $this->Enquiries->get(1); // Assuming the fixture has an entry with id = 1
        $enquiry->subject = 'Updated subject';
        $this->Enquiries->save($enquiry);
        $updatedEnquiry = $this->Enquiries->get(1);
        $this->assertEquals('Updated subject', $updatedEnquiry->subject, 'Enquiry was not updated');
    }

    /**
     * Test deleting an enquiry
     */
    public function testDeleteEnquiry(): void
    {
        $enquiry = $this->Enquiries->get(1); // Assuming an enquiry exists with id = 1
        $this->Enquiries->delete($enquiry);
        $this->assertNull($this->Enquiries->find()->where(['id' => 1])->first(), 'Enquiry was not deleted');
    }

    /**
     * Test saving multiple valid enquiries
     */
    public function testSaveManyValidEnquiries(): void
    {
        $enquiries = [
            $this->Enquiries->newEntity([
                'user_id' => 1,
                'subject' => 'Test Enquiry 1',
                'message' => 'Message for enquiry 1',
            ]),
            $this->Enquiries->newEntity([
                'user_id' => 2,
                'subject' => 'Test Enquiry 2',
                'message' => 'Message for enquiry 2',
            ]),
        ];
        $this->Enquiries->saveMany($enquiries);
        foreach ($enquiries as $enquiry) {
            $this->assertNotNull($enquiry->id, 'One of the enquiries was not saved');
        }
    }

    /**
     * Test save many with invalid data
     */
    public function testSaveManyInvalidEnquiries(): void
    {
        $enquiries = [
            $this->Enquiries->newEntity([
                'user_id' => 1,
                'subject' => 'Valid Enquiry',
                'message' => 'Valid message',
            ]),
            $this->Enquiries->newEntity([
                'user_id' => 2,
                'subject' => '', // Invalid enquiry (missing subject)
                'message' => 'Message for enquiry 2',
            ]),
        ];
        $result = $this->Enquiries->saveMany($enquiries);
        $this->assertFalse($result, 'Invalid enquiry in saveMany did not fail');
    }

    /**
     * Test finder methods (get, findOrCreate)
     */
    public function testFindMethods(): void
    {
        // Test get()
        $enquiry = $this->Enquiries->get(1); // Assuming the fixture has an entry with id = 1
        $this->assertNotNull($enquiry, 'Failed to retrieve enquiry by primary key');

        // Test findOrCreate()
        $enquiry = $this->Enquiries->findOrCreate(['subject' => 'Non-existent enquiry']);
        $this->assertEquals('Non-existent enquiry', $enquiry->subject, 'Failed to create or find enquiry');
    }
}
