<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

class MypagesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Times');
        // $this->loadComponent('Paginator');

        date_default_timezone_set('Asia/Tokyo');
    }

    public function index()
    {
        //Userテーブルに紐づくTimesテーブルのデータを取得
        //セッションでログインしたユーザー変数にして入れる(例：$session_user)
        //getData(1)はDBに登録されているユーザーのID番号。
        $this->set("user", $this->Users->getData(1));
    }

    public function list()
    {
        //セッションでログインしたユーザー変数にして入れる(例：$session_user)
        // $this->paginate['limit'] = 7;
        $this->set("user", $this->Users->getData(1));
    }

    public function create()
    {
        $post = $this->request->getData();
        if (count($post)) {
            $this->Times->register($post);
            return $this->redirect(['action' => 'list']);
        }
    }

    public function edit($id)
    {
        //レコードID
        $entity = $this->set("time", $this->Times->get($id));
        //$_POST[]で取得したフォーム内容
        // $post = $this->request->getData();
        $this->Times->update($entity);
        return $this->redirect(['action' => 'list']);
    }

    public function delete($id)
    {
        $entity = $this->Times->get($id);
        // if ($this->exists($entity)) {
        $this->Times->deleteRecord($entity);
        return $this->redirect(['action' => 'list']);
        //リダイレクト処理入れて、削除完了メッセージを入れる
        // } else {
        // }
    }
}
