<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tema Entity
 *
 * @property int $id
 * @property string $tema
 * @property int $parent_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ParentTema $parent_tema
 * @property \App\Model\Entity\Libro[] $libros
 * @property \App\Model\Entity\OldLibro[] $old_libros
 * @property \App\Model\Entity\OldSubtema[] $old_subtemas
 * @property \App\Model\Entity\ChildTema[] $child_temas
 */
class Tema extends Entity
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
        'tema' => true,
        'parent_id' => true,
        'created' => true,
        'modified' => true,
        'parent_tema' => true,
        'libros' => true,
        'old_libros' => true,
        'old_subtemas' => true,
        'child_temas' => true
    ];
}
