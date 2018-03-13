<?php
use Migrations\AbstractMigration;
use Carbon\Carbon;

class CreateLibros extends AbstractMigration
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
        $table = $this->table('libros');
        $table->addColumn('autor', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('titulo', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => true,
        ]);
        $table->addColumn('traductor', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('ciudad', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('anio_edicion', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('edicion', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('primera_edicion', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('editorial', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('tema_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('tipo', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('topografia', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => true,
        ]);
        $table->addColumn('paginas', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('tomos', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('idioma', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => true,
        ]);
        $table->addColumn('observaciones', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('baja', 'boolean', [
            'default' => null,
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

        $table->create();

        $current_timestamp = Carbon::now();
        // Inserta artículos de la base de datos antigua
        $this->execute('insert into libros (id, autor, titulo, traductor, ciudad, anio_edicion, edicion, primera_edicion, editorial, tema_id, tipo, topografia, paginas, tomos, idioma, observaciones, baja,  created, modified) select id, lAutor, lTitulo, lTraductor, lCiudad, lAnioEdicion, lEdicion, lPrimeraEdicion, lEditorial, subtema_id+30, lTipo, lTopografia, lPaginas, lTomos, lIdioma, lObservaciones, lBaja, "' . $current_timestamp . '", "' . $current_timestamp . '"  from old_libros');
    }
}
