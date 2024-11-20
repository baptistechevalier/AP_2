<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComputersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComputersTable Test Case
 */
class ComputersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComputersTable
     */
    protected $Computers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Computers',
        'app.Maintenances',
        'app.Games',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Computers') ? [] : ['className' => ComputersTable::class];
        $this->Computers = $this->getTableLocator()->get('Computers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Computers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ComputersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
