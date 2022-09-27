<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

class HomesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Times');
    }
    //ログインユーザーに紐づくTimesテーブル情報
    public function index()
    {
        //セッションでログインしたユーザー変数にして入れる(例：$session_user)
        //getData(1)はDBに登録されているユーザーのID番号。
        $this->set("user", $this->Users->getData(1));
    }
}
