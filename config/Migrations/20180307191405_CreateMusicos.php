<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateMusicos extends AbstractMigration
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
        $table = $this->table('musicos');
        $table->addColumn('nombre', 'string', [
            'default' => null,
            'limit' => 75,
            'null' => false
        ]);
        $table->addColumn('nombre_completo', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true
        ]);
        $table->addColumn('fecha_nac', 'date', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('instrumento', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('estilos', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => true
        ]);
        $table->addColumn('comentario', 'text', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('biografia', 'text', [
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
        $this->execute('insert into musicos (id, nombre, nombre_completo, fecha_nac, instrumento, estilos, comentario, biografia,  created, modified) select id, mNombre, mNombreCompleto, mFechaNac, mInstrumento, mEstilos, mComentario, mBiografia, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_musicos');
    }
}
