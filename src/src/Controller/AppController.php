<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Times');

        $this->checkSession();

        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        //認証結果に応じてサイトをロック
        $this->loadComponent('Authentication.Authentication');

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        //全コントローラーの index と view アクションをパブリックにし、
        //認証チェックをスキップ
        $this->Authentication->addUnauthenticatedActions(['view','index']);
    }

    public function checkSession()
    {
        //Session_ID取得
        $session = $this->getRequest()->getSession();
        $authId = $session->read('Auth.id');
        if(isset($authId)) {

            $this->paginate = [ 'limit' => 5 ];
            $usersTime = $this->paginate($this->Times->find()->where(['user_id' => $authId]));

            $loginUser = $this->Users->getAuthUser($authId);
            // dd($loginUser->name);

            $this->set('user', $usersTime);
            $this->set('loginUser', $loginUser);
            $this->set("authId",$authId);


        }
    }
}
