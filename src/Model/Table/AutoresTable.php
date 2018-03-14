<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Autores Model
 *
 * @property |\Cake\ORM\Association\HasMany $OldAutoresLibros
 * @property \App\Model\Table\LibrosTable|\Cake\ORM\Association\BelongsToMany $Libros
 *
 * @method \App\Model\Entity\Autor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Autor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Autor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Autor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Autor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Autor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Autor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AutoresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('autores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Libros', [
            'foreignKey' => 'autor_id',
            'targetForeignKey' => 'libro_id',
            'joinTable' => 'autores_libros'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('ape_nom')
            ->maxLength('ape_nom', 150)
            ->requirePresence('ape_nom', 'create')
            ->notEmpty('ape_nom');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->scalar('apellidos')
            ->maxLength('apellidos', 100)
            ->requirePresence('apellidos', 'create')
            ->notEmpty('apellidos');

        return $validator;
    }
}
