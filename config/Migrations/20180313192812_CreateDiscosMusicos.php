<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateDiscosMusicos extends AbstractMigration
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
        $table = $this->table('discos_musicos');
        $table->addColumn('disco_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('musico_id', 'integer', [
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
        $this->execute('insert into discos_musicos (id, disco_id, musico_id, created, modified) select id, disco_id, musico_id, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_discos_musicos');
    }
}
