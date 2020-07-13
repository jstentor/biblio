<?php
namespace App\Model\Table;

use Cake\Event\Event;
use Cake\Log\Log;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\Entity;
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
        $this->setDisplayField('ape_nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Libros', [
            'foreignKey' => 'autor_id',
            'targetForeignKey' => 'libro_id',
            //'joinTable' => 'autores_libros',
            'through' => 'AutoresLibros'
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
        ->scalar('ape_nom')
        ->maxLength('ape_nom', 150)
        /*->requirePresence('ape_nom', 'create')*/
        /*->notEmpty('ape_nom')*/;

        $validator
        ->scalar('nombre')
        ->maxLength('nombre', 100)
        ->requirePresence('nombre', 'create')
        /*->notEmpty('nombre')*/;

        $validator
        ->scalar('apellidos')
        ->maxLength('apellidos', 100)
        ->requirePresence('apellidos', 'create')
        /*->notEmpty('apellidos')*/;

        return $validator;
    }
    
    public function findApellidos(Query $query, array $options)
    {
        $apellidos = $options['apellidos'];
        return $query->where(['apellidos LIKE' => "%$apellidos%"]);
    }

    public function findNombre(Query $query, array $options)
    {
        $nombre = $options['nombre'];
        return $query->where(['nombre LIKE' => "%$nombre%"]);
    }
    
    public function findAutores(Query $query, array $options)
    {
        $nombre = $options['nombre'];
        $apellidos = $options['apellidos'];
        $ape_nom = $options['ape_nom'];
        return $query->where(['OR' => ['nombre LIKE' => "%$nombre%",
                            'apellidos LIKE' => "%$apellidos%",
        					'ape_nom LIKE' => "%$ape_nom%"]]);
    }
    
    public function findLibrosNoAsignados(Query $query, array $options)
    {
        // return id, titulo
        $autor_id = $options['id'];
        $libros_asignados = array();
        $autor = $query->where(['id' => $autor_id])
            ->contain('Libros')
            ->first();
        Log::write('debug', $autor);
        foreach ($autor->libros as $l)
        return $autor;
    }

    public function beforeSave($event, $entity, $options) {
        $apenom = "";
        if (trim($entity->apellidos) == '') {
            $apenom = trim($entity->nombre);
        } else {
            $apenom = trim($entity->apellidos);
            if (trim($entity->nombre) != '') {
                $apenom .= ', ' . trim($entity->nombre);
            }
        }
        $entity->nombreautor = $apenom;
    }

    /**
     * @return \Search\Manager
     */
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->add('busca_nombre', 'Search.Like', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['nombre']
            ])
            ->add('busca_apellidos', 'Search.Like', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['apellidos']
            ]);

        return $searchManager;
    }
}
