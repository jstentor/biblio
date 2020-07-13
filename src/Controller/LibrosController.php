<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Libros Controller
 *
 * @property \App\Model\Table\LibrosTable $Libros
 *
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LibrosController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		
		$this->loadComponent('Search.Prg', [
				'actions' => ['index']
		]);
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	$query = $this->Libros
    	->find('search', ['search' => $this->request->getQueryParams()]);
    	
        $this->paginate = [
            'sortWhitelist' => [
                'Temas.tema', 'nombreautor', 'titulo', 'idioma'
            ],
            'contain' => ['Temas', 'Autores'],
            'order' => ['nombreautor' => 'ASC'],
        ];
        $libros = $this->paginate($query);

        $this->set(compact('libros'));
    }

    /**
     * View method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $libro = $this->Libros->get($id, [
            'contain' => ['Temas', 'Autores']
        ]);

        $this->set('libro', $libro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $libro = $this->Libros->newEntity();
        if ($this->request->is('post')) {
        	$libroNuevo = $this->request->getData();
        	// Analiza el objeto json con los autores que viene de vuelta del formulario
        	$losAutores = (array)json_decode($libroNuevo['autores_hidden']);
        	
        	$libroNuevo['autores']['_ids'] = array_map( function($a, $b) {
        		return $b;
        	}, array_keys($losAutores), $losAutores);
        		
        	
        	$libro = $this->Libros->patchEntity($libro, $libroNuevo);
            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libro could not be saved. Please, try again.'));
        }
        $temas = $this->Libros->Temas->find('list', ['limit' => 200]);
        $autores_hidden = (json_encode(array(), JSON_FORCE_OBJECT));        
        $this->set(compact('libro', 'temas', 'autores_hidden'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $libro = $this->Libros->get($id, [
            'contain' => ['Autores']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $libroMod = $this->request->getData();
            $this->log ($libroMod);

            // Analiza el objeto json con los autores que viene de vuelta del formulario
            $losAutores = (array)json_decode($libroMod['autores_hidden']);
            $this->log ($losAutores);

            $libroMod['autores']['_ids'] = array_map( function($a, $b) {
                return $b;
            }, array_keys($losAutores), $losAutores);
            $this->log ($libroMod['autores']['_ids']);

            // Ahora parchea la entidad con los autores modificados
            $libro = $this->Libros->patchEntity($libro, $libroMod);
            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libro could not be saved. Please, try again.'));
        }
        
        // Procesa autores leidos para pasarlos al formulario a través de un objeto json
        $autores_hidden = array();
        foreach ($libro->autores as $key=>$autor) {
        	$autores_hidden['autor'.$key] = $autor['id'];
        }
        
        $temas = $this->Libros->Temas->find('list', ['limit' => 200]);
        $autores_hidden = (json_encode($autores_hidden, JSON_FORCE_OBJECT));
        $this->set(compact('libro', 'temas', 'autores_hidden'));

        /*
        $temas = [
            'Literatura' => [
                '5' => 'Literatura Anglosajona',
                '12' => 'Literatura española'
                ],
            'Toros' => [
                '23' => 'Historia'
            ]
        ];*/
    }

    /**
     * Delete method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $libro = $this->Libros->get($id);
        if ($this->Libros->delete($libro)) {
            $this->Flash->success(__('The libro has been deleted.'));
        } else {
            $this->Flash->error(__('The libro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
    public function search($string = '') {
        
        $this->request->allowMethod('ajax');
        $query = $this->Libros->find('titulos', ['titulo' => $string, 'autor' => $autor])
                        ->limit(10);
        $this->set('hallados', $query);
        $this->log($query->all());
        $resultJ = json_encode($query->all());
        $this->response = $this->response
                ->withType('application/json') // Here
                ->withStringBody($resultJ);     // and here
        return $this->response;
    }
}
