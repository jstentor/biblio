<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TemasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TemasTable Test Case
 */
class TemasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TemasTable
     */
    public $Temas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temas',
        'app.libros',
        'app.autores',
        'app.autores_libros',
        'app.old_autores',
        'app.old_autores_libros',
        'app.old_libros',
        'app.old_subtemas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Temas') ? [] : ['className' => TemasTable::class];
        $this->Temas = TableRegistry::get('Temas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Temas);

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
