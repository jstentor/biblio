<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Log\Log;

/**
 * Libros Model
 *
 * @property \App\Model\Table\TemasTable|\Cake\ORM\Association\BelongsTo $Temas
 * @property \App\Model\Table\AutoresTable|\Cake\ORM\Association\BelongsToMany $Autores
 * @property \App\Model\Table\OldAutoresTable|\Cake\ORM\Association\BelongsToMany $OldAutores
 *
 * @method \App\Model\Entity\Libro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Libro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Libro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Libro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Libro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Libro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Libro findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LibrosTable extends Table
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

        $this->setTable('libros');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Temas', [
            'foreignKey' => 'tema_id'
        ]);
        $this->belongsToMany('Autores', [
            'foreignKey' => 'libro_id',
            'targetForeignKey' => 'autor_id',
            //'joinTable' => 'autores_libros'
            'through' => 'AutoresLibros'
        ]);
        $this->hasMany('AutoresLibros', [
            'foreignKey' => 'libro_id'
        ]);
        $this->addBehavior('Search.Search');
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
            ->scalar('autor')
            ->maxLength('autor', 100)
            ->allowEmpty('autor');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 150)
            ->allowEmpty('titulo');

        $validator
            ->scalar('traductor')
            ->maxLength('traductor', 100)
            ->allowEmpty('traductor');

        $validator
            ->scalar('ciudad')
            ->maxLength('ciudad', 50)
            ->allowEmpty('ciudad');

        $validator
            ->integer('anio_edicion')
            ->allowEmpty('anio_edicion');

        $validator
            ->scalar('edicion')
            ->maxLength('edicion', 10)
            ->allowEmpty('edicion');

        $validator
            ->integer('primera_edicion')
            ->allowEmpty('primera_edicion');

        $validator
            ->scalar('editorial')
            ->maxLength('editorial', 50)
            ->allowEmpty('editorial');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 10)
            ->allowEmpty('tipo');

        $validator
            ->scalar('topografia')
            ->maxLength('topografia', 15)
            ->allowEmpty('topografia');

        $validator
            ->integer('paginas')
            ->allowEmpty('paginas');

        $validator
            ->integer('tomos')
            ->allowEmpty('tomos');

        $validator
            ->scalar('idioma')
            ->maxLength('idioma', 20)
            ->allowEmpty('idioma');

        $validator
            ->scalar('observaciones')
            ->allowEmpty('observaciones');

        $validator
            ->boolean('baja')
            ->allowEmpty('baja');

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
        $rules->add($rules->existsIn(['tema_id'], 'Temas'));

        return $rules;
    }

    public function findLibros(Query $query, array $options)
    {
        return $query->where(['Libros.nombreautor LIKE' => '%' .  $options['autor'] . '%',
                        'Libros.titulo LIKE' => '%' .  $options['titulo'] . '%',
                        'Temas.tema LIKE' => '%' .  $options['tema'] . '%',
                        'Libros.idioma LIKE' => '%' .  $options['idioma'] . '%',
                ]);
    }

    public function findTitulos(Query $query, array $options)
    {
        $titulo = $options['titulo'];
        $autor = $options['autor'];

        $autoresLibros = TableRegistry::get('AutoresLibros');
        $excluir = $autoresLibros->find('libros', ['autor' => $autor]);

        return $query->where(['Libros.titulo LIKE' => '%' .  $options['titulo'] . '%',
                            'Libros.id NOT IN' => $excluir]);
    }
    
    /**
     * @return \Search\Manager
     */
    public function searchManager()
    {
    	$searchManager = $this->behaviors()->Search->searchManager();
    	$searchManager
    	->add('busca_autor', 'Search.Like', [
    			'before' => true,
    			'after' => true,
    			'fieldMode' => 'OR',
    			'comparison' => 'LIKE',
    			'wildcardAny' => '*',
    			'wildcardOne' => '?',
    			'field' => ['nombreautor']
    	])
    	->add('busca_titulo', 'Search.Like', [
    			'before' => true,
    			'after' => true,
    			'fieldMode' => 'OR',
    			'comparison' => 'LIKE',
    			'wildcardAny' => '*',
    			'wildcardOne' => '?',
    			'field' => ['titulo']
    	])
    	->add('busca_tema', 'Search.Like', [
    			'before' => true,
    			'after' => true,
    			'fieldMode' => 'OR',
    			'comparison' => 'LIKE',
    			'wildcardAny' => '*',
    			'wildcardOne' => '?',
    			'field' => ['Temas.tema']
    	])
    	->add('busca_idioma', 'Search.Like', [
    			'before' => true,
    			'after' => true,
    			'fieldMode' => 'OR',
    			'comparison' => 'LIKE',
    			'wildcardAny' => '*',
    			'wildcardOne' => '?',
    			'field' => ['idioma']
    	]);
    	
    	return $searchManager;
    }
    
}
