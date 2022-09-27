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

    //ログインユーザーに紐づくTimesテーブル情報
    public function index()
    {
        //セッションでログインしたユーザー変数にして入れる(例：$session_user)
        //getData(1)はDBに登録されているユーザーのID番号。
        $this->set("user", $this->Users->getData(1));
    }

    //レコード一覧の取得
    public function list()
    {
        //セッションでログインしたユーザー変数にして入れる(例：$session_user)
        // $this->paginate['limit'] = 7;
        $this->set("user", $this->Users->getData(1));
    }

    public function order()
    {
    }

    //レコードの追加
    public function create()
    {
        $post = $this->request->getData();
        if (count($post)) {
            $this->Times->register($post);
            return $this->redirect(['action' => 'list']);
        }
    }

    //レコードの選択と終了
    public function edit($id)
    {
        //下2行纏めたい
        $this->set("time", $this->Times->get($id));
        $entity = $this->Times->get($id);
        $post = $this->request->getData();
        if (count($post)) {
            $this->Times->update($entity, $post);
            return $this->redirect(['action' => 'list']);
        }
    }

    //レコードの削除
    public function delete($id)
    {
        $entity = $this->Times->get($id);
        $this->Times->deleteRecord($entity);
        return $this->redirect(['action' => 'list']);
    }
}
