<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomFlagEnquiriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomFlagEnquiriesTable Test Case
 */
class CustomFlagEnquiriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomFlagEnquiriesTable
     */
    protected $CustomFlagEnquiries;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CustomFlagEnquiries',
        'app.Enquiries',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CustomFlagEnquiries') ? [] : ['className' => CustomFlagEnquiriesTable::class];
        $this->CustomFlagEnquiries = $this->getTableLocator()->get('CustomFlagEnquiries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CustomFlagEnquiries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CustomFlagEnquiriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CustomFlagEnquiriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
