<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertyCommentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertyCommentsTable Test Case
 */
class PropertyCommentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PropertyCommentsTable
     */
    protected $PropertyComments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PropertyComments',
        'app.Properties',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PropertyComments') ? [] : ['className' => PropertyCommentsTable::class];
        $this->PropertyComments = $this->getTableLocator()->get('PropertyComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PropertyComments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PropertyCommentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PropertyCommentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
