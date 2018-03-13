<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateEstilos extends AbstractMigration
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
        $table = $this->table('estilos');
        $table->addColumn('estilo', 'string', [
            'default' => null,
            'limit' => 50,
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
        $this->execute('insert into estilos (id, estilo, created, modified) select id, deEstilo, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_estilos');
    }
}
