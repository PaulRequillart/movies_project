<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FriendshipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FriendshipsTable Test Case
 */
class FriendshipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FriendshipsTable
     */
    public $Friendships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.friendships'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Friendships') ? [] : ['className' => FriendshipsTable::class];
        $this->Friendships = TableRegistry::getTableLocator()->get('Friendships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Friendships);

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
}
