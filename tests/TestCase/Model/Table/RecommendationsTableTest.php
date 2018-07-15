<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecommendationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecommendationsTable Test Case
 */
class RecommendationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecommendationsTable
     */
    public $Recommendations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recommendations',
        'app.users',
        'app.movies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Recommendations') ? [] : ['className' => RecommendationsTable::class];
        $this->Recommendations = TableRegistry::getTableLocator()->get('Recommendations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recommendations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
