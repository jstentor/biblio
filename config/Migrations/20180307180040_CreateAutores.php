<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateAutores extends AbstractMigration
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
        $table = $this->table('autores');
        $table->addColumn('ape_nom', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => false,
        ]);
        $table->addColumn('nombre', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('apellidos', 'string', [
            'default' => null,
            'limit' => 100,
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

        $table->addIndex('ape_nom');
        $table->create();

        $current_timestamp = Carbon::now();
        // Inserta artículos de la base de datos antigua
        $this->execute('insert into autores (id, ape_nom, nombre, apellidos, created, modified) select id, auNombre, nombre, apellido, "' . $current_timestamp . '", "' . $current_timestamp . '" from old_autores');
    }
}
