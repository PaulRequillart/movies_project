<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ToWatchMoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ToWatchMoviesTable Test Case
 */
class ToWatchMoviesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ToWatchMoviesTable
     */
    public $ToWatchMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.to_watch_movies',
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
        $config = TableRegistry::getTableLocator()->exists('ToWatchMovies') ? [] : ['className' => ToWatchMoviesTable::class];
        $this->ToWatchMovies = TableRegistry::getTableLocator()->get('ToWatchMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ToWatchMovies);

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
