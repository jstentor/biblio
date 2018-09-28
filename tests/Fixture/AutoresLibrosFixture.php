<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AutoresLibrosFixture
 *
 */
class AutoresLibrosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'autor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'libro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'autor_id' => ['type' => 'index', 'columns' => ['autor_id'], 'length' => []],
            'libro_id' => ['type' => 'index', 'columns' => ['libro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'autores_libros_ibfk_1' => ['type' => 'foreign', 'columns' => ['autor_id'], 'references' => ['autores', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'autores_libros_ibfk_2' => ['type' => 'foreign', 'columns' => ['libro_id'], 'references' => ['libros', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'autor_id' => 1,
                'libro_id' => 1,
                'created' => '2018-09-28 04:29:36',
                'modified' => '2018-09-28 04:29:36'
            ],
        ];
        parent::init();
    }
}
