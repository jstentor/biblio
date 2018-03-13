<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateAutoresLibros extends AbstractMigration
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
        $table = $this->table('autores_libros');
        $table->addColumn('autor_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('libro_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();

        $current_timestamp = Carbon::now();
        // Inserta artículos de la base de datos antigua
        $this->execute('insert into autores_libros (id, autor_id, libro_id, created, modified) select id, autor_id, libro_id, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_autores_libros');
    }
}
