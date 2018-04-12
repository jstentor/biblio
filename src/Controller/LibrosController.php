<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Libros Controller
 *
 * @property \App\Model\Table\LibrosTable $Libros
 *
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LibrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'sortWhitelist' => [
                'Temas.tema', 'nombreautor', 'titulo', 'idioma'
            ],
            'contain' => ['Temas'],
            'order' => ['nombreautor' => 'ASC']
        ];
        $libros = $this->paginate($this->Libros);

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
            $libro = $this->Libros->patchEntity($libro, $this->request->getData());
            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libro could not be saved. Please, try again.'));
        }
        $temas = $this->Libros->Temas->find('list', ['limit' => 200]);
        $autores = $this->Libros->Autores->find('list', ['limit' => 200]);
        $this->set(compact('libro', 'temas', 'autores'));
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
            $libro = $this->Libros->patchEntity($libro, $this->request->getData());
            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libro could not be saved. Please, try again.'));
        }
        $temas = $this->Libros->Temas->find('list', ['limit' => 200]);
        $autores = $this->Libros->Autores->find('list', ['limit' => 200]);
        $this->set(compact('libro', 'temas', 'autores'));

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
}
