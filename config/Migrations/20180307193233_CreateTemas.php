<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateTemas extends AbstractMigration
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
        $table = $this->table('temas');
        $table->addColumn('tema', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('parent_id', 'integer', [
            'default' => null,
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
        $this->execute('insert into temas (id, tema, created, modified) select id, tTema, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_temas');
        $this->execute('insert into temas (id, tema, parent_id, created, modified) select id+30, subtema, tema_id, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_subtemas');
    }
}
