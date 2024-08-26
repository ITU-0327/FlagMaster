<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderTable Test Case
 */
class OrderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderTable
     */
    protected $Order;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Order',
        'app.Users',
        'app.Delivery',
        'app.OrderItem',
        'app.Payment',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Order') ? [] : ['className' => OrderTable::class];
        $this->Order = $this->getTableLocator()->get('Order', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Order);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OrderTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OrderTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
