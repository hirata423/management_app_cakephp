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

        date_default_timezone_set('Asia/Tokyo');
    }

    public function index()
    {
    }

    //レコード一覧の取得
    public function list()
    {
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
