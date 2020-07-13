<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Autores Controller
 *
 * @property \App\Model\Table\AutoresTable $Autores
 *
 * @method \App\Model\Entity\Autor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AutoresController extends AppController
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
        $this->paginate = [
            'sortWhitelist' => ['nombre', 'apellidos'],
        ];

        $query = $this->Autores
            ->find('search', ['search' => $this->request->getQueryParams()]);

        $this->set('autores', $this->Paginate($query));
        // se pasa a la vista para los parámetros de los enlaces a pdf y xlsx
        $this->set('qParams', $this->getQueryParamsNoPage());
    }

    /**
     * View method
     *
     * @param string|null $id Autor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $autor = $this->Autores->get($id, [
            'contain' => ['Libros', 'Libros.Temas']
        ]);

        $this->set('autor', $autor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $autor = $this->Autores->newEntity();
        if ($this->request->is('post')) {
            $autor = $this->Autores->patchEntity($autor, $this->request->getData());
            if ($this->Autores->save($autor)) {
                $this->Flash->success(__('The autor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The autor could not be saved. Please, try again.'));
        }
        $libros = $this->Autores->Libros->find('list', ['limit' => 200]);
        $this->set(compact('autor', 'libros'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Autor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $autor = $this->Autores->get($id, [
            'contain' => ['Libros']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $autor = $this->Autores->patchEntity($autor, $this->request->getData());
            if ($this->Autores->save($autor)) {
                $this->Flash->success(__('The autor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The autor could not be saved. Please, try again.'));
        }
        $libros = $this->Autores->Libros->find('list', ['limit' => 200, 'order' => ['titulo' => 'ASC']]);

        $this->set(compact('autor', 'libros'/*,'jsonlibros'*/));
    }

    /**
     * Delete method
     *
     * @param string|null $id Autor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $autor = $this->Autores->get($id);
        if ($this->Autores->delete($autor)) {
            $this->Flash->success(__('The autor has been deleted.'));
        } else {
            $this->Flash->error(__('The autor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /* 
     * Métodos ajax
     *
     */
    /**
     * addautor: añade un autor a la tabla de autores desde la plantilla edit de Libros
     * 
     * @param type $ape_nom
     * @return type json object
     */
    public function addautor($ape_nom)
    {
        $this->request->allowMethod('ajax');

        $autor = $this->Autores->newEntity();
        if ($this->request->is('post')) {
            $autor['ape_nom'] = $ape_nom;
            $anombre = explode(",", $ape_nom);
            $autor['apellidos'] = (isset($anombre[0])) ? trim($anombre[0]): "";
            $autor['nombre'] =    (isset($anombre[1])) ? trim($anombre[1]): "";
            
            $query = $this->Autores->find('all')
                ->where(['Autores.ape_nom' => $ape_nom])
                ->limit(10);
            
            $resultJ = json_encode(null);
            if ($query->first() == null) { // solo lo graba si no existe
                if ($this->Autores->save($autor)) {
                    $ret = array('id' => $autor['id'], 'ape_nom' => $autor['ape_nom']);
                    $resultJ = json_encode($autor);
                } 
            }
            $this->response = $this->response
                ->withType('application/json') // Here
                ->withStringBody($resultJ);     // and here
            return $this->response;
        }
    }

    /**
     * search: busca un nombre de autor a partir de un string
     * 
     * @param type $string
     * @return type json object
     */
    public function search($string = '') {    	
    	$this->request->allowMethod('ajax');
    	// busca autores utilizando finder findAutores 
    	$query = $this->Autores->find('autores', ['nombre' => $string, 'apellidos' => $string, 'ape_nom' => $string])
    		->limit(10);
    	$hallados = array();
        foreach ($query as $row) {
            array_push($hallados, $row);
        }
        $resultJ = json_encode($query);
        
        $this->response = $this->response
                ->withType('application/json') // Here
                ->withStringBody($resultJ);     // and here
        return $this->response;
    }
}
