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

    public function index()
    {
    }
}
