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
    
    //レコード一覧の取得
    public function list()
    {
    }

    //レコードの追加
    public function create()
    {
        $post = $this->request->getData();
        if (count($post)) {
            // dd($post);
            $this->Times->register($post);
            return $this->redirect(['action' => 'list']);
        }
    }

    //レコードの選択と終了
    public function edit($id)
    {
        $time = $this->Times->get($id);
        $post = $this->request->getData();
        if (count($post)) {
            $this->Times->update($time, $post);
            return $this->redirect(['action' => 'list']);
        }
        $this->set("time", $time);
    }

    //レコードの削除
    public function delete($id)
    {
        $entity = $this->Times->get($id);
        $this->Times->deleteRecord($entity);
        return $this->redirect(['action' => 'list']);
    }
}
