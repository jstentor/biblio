<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutoresLibrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AutoresLibrosTable Test Case
 */
class AutoresLibrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AutoresLibrosTable
     */
    public $AutoresLibros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.autores_libros',
        'app.autores',
        'app.libros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AutoresLibros') ? [] : ['className' => AutoresLibrosTable::class];
        $this->AutoresLibros = TableRegistry::getTableLocator()->get('AutoresLibros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AutoresLibros);

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
