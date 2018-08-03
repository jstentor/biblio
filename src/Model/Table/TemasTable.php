<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Temas Model
 *
 * @property \App\Model\Table\TemasTable|\Cake\ORM\Association\BelongsTo $ParentTemas
 * @property \App\Model\Table\LibrosTable|\Cake\ORM\Association\HasMany $Libros
 * @property \App\Model\Table\OldLibrosTable|\Cake\ORM\Association\HasMany $OldLibros
 * @property \App\Model\Table\OldSubtemasTable|\Cake\ORM\Association\HasMany $OldSubtemas
 * @property \App\Model\Table\TemasTable|\Cake\ORM\Association\HasMany $ChildTemas
 *
 * @method \App\Model\Entity\Tema get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tema newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tema[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tema|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tema patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tema[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tema findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TemasTable extends Table
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

        $this->setTable('temas');
        $this->setDisplayField('tema');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentTemas', [
            'className' => 'Temas',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Libros', [
            'foreignKey' => 'tema_id'
        ]);
        $this->hasMany('ChildTemas', [
            'className' => 'Temas',
            'foreignKey' => 'parent_id'
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
            ->scalar('tema')
            ->maxLength('tema', 50)
            ->requirePresence('tema', 'create')
            ->notEmpty('tema');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentTemas'));

        return $rules;
    }

    public function findTemas(Query $query, array $options)
    {
        return $query->where(['Temas.tema LIKE' => '%' .  $options['tema'] . '%',
                        'ParentTemas.tema LIKE' => '%' .  $options['padre'] . '%',
                ]);
    }
}
