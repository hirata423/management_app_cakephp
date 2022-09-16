<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;

class HomesController extends AppController
{
    public function index()
    {
        $title = "Wime";
        $this->set("title", $title);

        $text = ["仕事","勉強","趣味"];
        $this->set("text", $text);

        $text2 = "作業時間管理アプリ";
        $this->set("text2", $text2);

        $link_text = ["マイページ","ログイン"];
        $this->set("link_text", $link_text);
    }
}
