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

        //Session_ID
        $session = $this->getRequest()->getSession();
        $id = $session->read('Auth.id');

        // dd($id);
        if ($id) {
            $this->set("user", $this->Users->getData($id));
        }
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');// 認証結果に応じてサイトをロック
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
        //Session_ID
        $session = $this->getRequest()->getSession();
        $id = $session->read('Auth.id');
        if($id) {
            $user = $this->Users->getData($id);
            // dd($user);
            $this->set("user", $user);
        }
    }
}
