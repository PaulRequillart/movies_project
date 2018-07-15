<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViewMoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViewMoviesTable Test Case
 */
class ViewMoviesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ViewMoviesTable
     */
    public $ViewMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.view_movies',
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
        $config = TableRegistry::getTableLocator()->exists('ViewMovies') ? [] : ['className' => ViewMoviesTable::class];
        $this->ViewMovies = TableRegistry::getTableLocator()->get('ViewMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ViewMovies);

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
