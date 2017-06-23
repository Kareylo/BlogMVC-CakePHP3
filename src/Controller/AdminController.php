<?php

namespace App\Controller;

use App\Model\Table\PostsTable;
use Cake\Http\Response;
use Cake\Network\Exception\NotFoundException;

/**
 * Class AdminController
 * @package App\Controller
 * @property PostsTable $Posts
 */
class AdminController extends AppController
{

    public $paginate = ['limit' => 5];

    /**
     * Initialize
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Posts');
        $this->viewBuilder()->setLayout('admin');
    }

    /**
     * Index method
     *
     * @return Response|void
     */
    public function index()
    {
        $posts = $this->paginate($this->Posts->find()->contain(['Categories']));

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $categories = $this->Posts->Categories->find('list');
        $users = $this->Posts->Users->find('list');
        $this->set(compact('post', 'categories', 'users'));
        $this->set('_serialize', ['post', 'categories', 'users']);
    }

    /**
     * Edit method
     *
     * @param int $id Admin id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws NotFoundException When record not found.
     */
    public function edit($id)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $categories = $this->Posts->Categories->find('list');
        $users = $this->Posts->Users->find('list');
        $this->set(compact('post', 'categories', 'users'));
        $this->set('_serialize', ['post', 'categories', 'users']);
    }

    /**
     * Delete method
     *
     * @param int $id Admin id.
     * @return Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['delete', 'post']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
