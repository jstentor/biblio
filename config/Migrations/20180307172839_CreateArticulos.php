<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateArticulos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('articulos');
        $table->addColumn('revista_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('titulo', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => false,
        ]);
        $table->addColumn('autor', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => true,
        ]);
        $table->addColumn('asunto', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('resumen', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex('autor');
        $table->create();

        $current_timestamp = Carbon::now();
        // Inserta artículos de la base de datos antigua
        $this->execute('insert into articulos (id, revista_id, titulo, autor, asunto, resumen, created, modified) select id, revista_id, aTitulo, aAutor, aAsunto, aResumen, "' . $current_timestamp . '", "' . $current_timestamp . '" from old_articulos');
    }
}
