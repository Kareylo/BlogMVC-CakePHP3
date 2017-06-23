<?php

namespace App\Controller;

use App\Model\Entity\Post;
use App\Model\Table\PostsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;

/**
 * Posts Controller
 *
 * @property PostsTable $Posts
 *
 * @method Post[] paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{

    public $paginate = [
        'contain' => ['Categories', 'Users'],
        'limit' => 5
    ];

    /**
     * beforeFilter Event
     * @param Event $event current event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    /**
     * Index method
     * @return void
     */
    public function index()
    {
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }

    /**
     * Get posts by author
     * @param int $id author Id
     * @return void
     */
    public function author($id)
    {
        $posts = $this->paginate($this->Posts->find()->where(['Posts.user_id' => $id]));

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
        $this->render('index');
    }

    /**
     * Get posts by category
     * @param string $slug wanted slug
     * @return void
     */
    public function category($slug)
    {
        $posts = $this->paginate($this->Posts->find()->where(['Categories.slug' => $slug]));

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
        $this->render('index');
    }

    /**
     * View method
     *
     * @param string|null $slug Post slug.
     * @return Response|void
     * @throws RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $errors = [];
        $comment = $this->Posts->Comments->newEntity();
        if ($this->request->is(['post'])) {
            $comment = $this->Posts->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Posts->Comments->save($comment)) {
            }
        }

        $post = $this->Posts->find()->where(['Posts.slug' => $slug])->contain(['Categories', 'Users', 'Comments'])->first();
        $this->set(compact('post', 'comment', 'errors'));
        $this->set('_serialize', ['post']);
    }
}
