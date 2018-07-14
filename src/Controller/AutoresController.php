<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Autores Controller
 *
 * @property \App\Model\Table\AutoresTable $Autores
 *
 * @method \App\Model\Entity\Autor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AutoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
         $this->paginate = [
            'finder' => [
                /* finderFunction => [ condition ] */
                'autores' => ['nombre' => $this->request->getData('fNombre'),
                              'apellidos' => $this->request->getData('fApellidos')]
            ]
        ];
        $autores = $this->paginate($this->Autores);

        $this->set(compact('autores'));
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
        $this->set(compact('autor', 'libros'));
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
