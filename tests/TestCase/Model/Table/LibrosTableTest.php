<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LibrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LibrosTable Test Case
 */
class LibrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LibrosTable
     */
    public $Libros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.libros',
        'app.temas',
        'app.old_libros',
        'app.old_subtemas',
        'app.autores',
        'app.autores_libros',
        'app.old_autores',
        'app.old_autores_libros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Libros') ? [] : ['className' => LibrosTable::class];
        $this->Libros = TableRegistry::get('Libros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Libros);

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
