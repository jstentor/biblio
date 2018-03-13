<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateDiscosPiezas extends AbstractMigration
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
        $table = $this->table('discos_piezas');
        $table->addColumn('disco_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('pieza_id', 'integer', [
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
        $this->execute('insert into discos_piezas (id, disco_id, pieza_id, created, modified) select id, disco_id, pieza_id, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_discos_piezas');
    }
}
