<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreatePiezas extends AbstractMigration
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
        $table = $this->table('piezas');
        $table->addColumn('pieza', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => true
        ]);
        $table->addColumn('compositor', 'string', [
            'default' => null,
            'limit' => 75,
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
        $this->execute('insert into piezas (id, pieza, compositor,  created, modified) select id, pPieza, pCompositor, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_piezas');
    }
}
