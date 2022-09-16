<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

class MypagesController extends AppController
{
    // :void型を付けないと互換性エラー
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    public function mypage()
    {
        //セッションでログインしたユーザー変数にして入れる(例：$session_user)
        //getData(1)はDBに登録されているユーザーのID番号。
        $this->set(
            "user",
            $this->Users->getData(1)
        );



        $button_tag =["開始","一覧","トップ","ログアウト"];
        $this->set("button_tag", $button_tag);

        date_default_timezone_set('Asia/Tokyo');
        $week_list = ['日','月','火','水','木','金','土',];
        $week= date('w');
        $day=date('n/j');

        $date = "$day($week_list[$week])";
        $this->set("date", $date);
    }
}
