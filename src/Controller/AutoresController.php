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
        //$jsonlibros = $this->json_get_libros_sin_asignar($id);

        $this->set(compact('autor', 'libros'/*,'jsonlibros'*/));
    }

    public function search($string = '', $libro = 0) {    	
    	$this->request->allowMethod('ajax');
    	// busca autores utilizando finder findAutores 
    	$query = $this->Autores->find('autores', ['nombre' => $string, 'apellidos' => $string, 'ape_nom' => $string])
    		->limit(10);
    	$this->set('hallados', $query);
    	$this->log($query->all());
    	
    	$this->set('_jsonOptions', JSON_FORCE_OBJECT);
    	
    	$this->set('_serialize', ['hallados']);
    }
    
    /**
     * get_libros_sin_asignar
     *
     * @param $id de autor
     * @return array $libros sin asignar a ese autor
     *
     */
    private function json_get_libros_sin_asignar($id) {
        $lista = array();
        $libros = TableRegistry::get('Libros');
        $au_libros = TableRegistry::get('AutoresLibros');
        $libros_ya_asignados = $au_libros
            ->find()
            ->select('libro_id')
            ->where(['autor_id' => $id]);
        $query = $libros
            ->find()
            ->select(['id', 'titulo'])
            ->where([
              'Libros.id NOT IN' => $libros_ya_asignados
            ])
            ->order(['titulo' => 'ASC']);
        foreach($query as $libro) {
                array_push($lista, ['label' => $libro->titulo, 'value' => $libro->id]);
        }
        return json_encode($lista);
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
}
