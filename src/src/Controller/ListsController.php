<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;

class ListsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    public function list()
    {
        $this->set("user", $this->Users->getData(1));

        $title = "記録一覧";
        $this->set("title", $title);

        $button_tag = ["開始","戻る"];
        $this->set("button_tag", $button_tag);

        //検索文字列の結果を変数にして、変数と一致するデータを返す？
        // $keyword = "変数";
        // $this->set("keyword", $keyword);

        $list_titles=["内容","開始時間","終了時間","経過時間","",""];
        $this->set("list_titles", $list_titles);

        $results = ["テスト","9/14","14:00","15:00","1:00","1"];
        $this->set("results", $results);
    }
}
