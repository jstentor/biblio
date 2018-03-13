<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateRevistas extends AbstractMigration
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
        $table = $this->table('revistas');
        $table->addColumn('nombre', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true
        ]);
        $table->addColumn('numero', 'integer', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('mes', 'integer', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('anio', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true
        ]);
        $table->addColumn('comentario', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
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
        $this->execute('insert into revistas (id, nombre, numero, mes, anio, comentario,  created, modified) select id, rNombreRevista, rNumeroRevista, rMesRevista, rAnioRevista, rComentario, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_revistas');
    }
}
