<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;


class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Times');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // リダイレクトループ回避
        $this->Authentication->addUnauthenticatedActions(['login','add']);
    }

    public function index()
    {
        //未ログイン時のリダイレクト
        return $this->redirect('/users/login');
    }

    //ユーザー登録
    public function add()
    {
        $userID = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $userID = $this->Users->patchEntity($userID, $this->request->getData());
            if ($this->Users->save($userID)) {
                $this->Flash->success('登録完了。ログインしてください');
                return $this->redirect('/users/login');//未ログイン時は強制的にloginへ
            }
            $this->Flash->error('登録失敗。再度試してください');
        }
        $this->set(compact('userID'));
    }

    //ログイン
    public function login()
    {
        //POST, GET を問わず判別。変えるとエラー
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // 認証成功　
        if ($result && $result->isValid()) {
            $this->Flash->success('ログイン成功');
            return $this->redirect('/');
        }
        // 認証失敗
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('ログイン失敗。再度試してください');
        }
    }

    //ログアウト
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Flash->success('ログアウト完了');
            $this->Authentication->logout();
            return $this->redirect('/users/login');
            $session->destroy();
        }
        $this->Flash->error('ログアウト済です');
        return $this->redirect('/users/login');
    }


    //以下はAdminとして使用する

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Times'],
        ]);
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
