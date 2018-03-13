<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateDiscos extends AbstractMigration
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
        $table = $this->table('discos');
        $table->addColumn('autor', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('titulo', 'string', [
            'default' => 'n/a',
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('coleccion', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('estilo', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('localizacion', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('interpretes', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('formato', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => true,
        ]);
        $table->addColumn('calificacion', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('volumenes', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => true,
        ]);
        $table->addColumn('anio_grabacion', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('anio_edicion', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('sello', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('productor', 'string', [
            'default' => null,
            'limit' => 75,
            'null' => true,
        ]);
        $table->addColumn('caratula', 'string', [
            'default' => null,
            'limit' => 255,
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
        $table->addIndex(['autor', 'titulo'], ['name' => 'idx_autor_titulo']);
        $table->create();

        $current_timestamp = Carbon::now();
        // Inserta artículos de la base de datos antigua
        $this->execute('insert into discos (id, autor, titulo, coleccion, estilo, localizacion, interpretes, formato, calificacion, volumenes, anio_grabacion, anio_edicion, sello, productor, caratula, created, modified) select id, dAutor, dTitulo, dColeccion, dEstilo, dLocalizacion, dInterprete, dFormato, dCalificacion, dVolumenes, dAnioGrabacion, dAnioEdicion, dSello, dProductor, dCaratula, "' . $current_timestamp . '", "' . $current_timestamp . '" from old_discos');
    }
}
