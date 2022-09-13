<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;

class SubindexController extends AppController
{
    public function subindex()
    {
        $text = "SubPageを表示中";
        $this->set("text", $text);

        $text2 = "SubPage";
        $this->set("text2", $text2);
    }
}
