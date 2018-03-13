<?php
use Migrations\AbstractMigration;

class CreateForeignKeys extends AbstractMigration
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
        $table = $this->table('articulos');
        $table->addForeignKey('revista_id', 'revistas', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->save();

        $table = $this->table('autores_libros');
        $table->addForeignKey('autor_id', 'autores', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->addForeignKey('libro_id', 'libros', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->save();

        $table = $this->table('discos_musicos');
        $table->addForeignKey('disco_id', 'discos', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->addForeignKey('musico_id', 'musicos', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->save();

        $table = $this->table('discos_piezas');
        $table->addForeignKey('disco_id', 'discos', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->addForeignKey('pieza_id', 'piezas', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->save();

        $table = $this->table('libros');
        $table->addForeignKey('tema_id', 'temas', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->save();

        $table = $this->table('temas');
        $table->addForeignKey('parent_id', 'temas', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
        ->save();
    }
}
