<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;

class MypagesController extends AppController
{
    public function mypage()
    {
        //ログイン機能つけたらここでセッション開始
        //$login_userにセッションで取得した変数を入れるイメージ
        $login_user = "平田 充史";
        $this->set("login_user", $login_user);

        $button_tag =["Toppage","Start","List","Logout"];
        $this->set("button_tag", $button_tag);

        date_default_timezone_set('Asia/Tokyo');
        $week_list = ['日','月','火','水','木','金','土',];
        $week= date('w');
        $day=date('n/j');

        $date = "$day($week_list[$week])";
        $this->set("date", $date);
    }
}
