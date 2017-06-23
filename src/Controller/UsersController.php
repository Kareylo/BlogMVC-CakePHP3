<?php

namespace App\Controller;

use Cake\Http\Response;

/**
 * Class UsersController
 * @package App\Controller
 */
class UsersController extends AppController
{

    /**
     * Login
     * @return Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'login']);
    }

    /**
     * logout
     * @return Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
