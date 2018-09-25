<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Log\Log;

/**
 * Libro Entity
 *
 * @property int $id
 * @property string $autor
 * @property string $titulo
 * @property string $traductor
 * @property string $ciudad
 * @property int $anio_edicion
 * @property string $edicion
 * @property int $primera_edicion
 * @property string $editorial
 * @property int $tema_id
 * @property string $tipo
 * @property string $topografia
 * @property int $paginas
 * @property int $tomos
 * @property string $idioma
 * @property string $observaciones
 * @property bool $baja
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Tema $tema
 * @property \App\Model\Entity\Autor[] $autores
 * @property \App\Model\Entity\OldAutore[] $old_autores
 */
class Libro extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'autor' => true,
        'titulo' => true,
        'traductor' => true,
        'ciudad' => true,
        'anio_edicion' => true,
        'edicion' => true,
        'primera_edicion' => true,
        'editorial' => true,
        'tema_id' => true,
        'tipo' => true,
        'topografia' => true,
        'paginas' => true,
        'tomos' => true,
        'idioma' => true,
        'observaciones' => true,
        'baja' => true,
        'created' => true,
        'modified' => true,
        'tema' => true,
        'autores' => true,
        'old_autores' => true
    ];

    protected function _getLosAutores()
    {
        $autores = "";
        foreach($this->_properties['autores'] as $au) {
            $apenom = "";
            if (trim($au->apellidos) == "") {
                if (trim($au->nombre) == "") {
                    $apenom = "";
                } else {
                    $apenom = $au->nombre;
                }
            } else {
                $apenom = $au->apellidos;
                if (trim($au->nombre) != "") {
                    $apenom .= ", " . $au->nombre;
                }
            }
            if (trim($apenom) != "") {
                $autores .= $apenom . " - ";
            }
        }
        if ($autores != "") { // quitarle el guión que le sobra
            $autores = substr($autores, 0, strlen($autores) - 3);
        }
        return $autores;
    }
}
