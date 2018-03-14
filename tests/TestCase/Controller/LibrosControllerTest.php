<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LibrosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\LibrosController Test Case
 */
class LibrosControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
