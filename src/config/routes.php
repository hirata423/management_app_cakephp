<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {

    
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Homes', 'action' => 'index']);
        $builder->connect('/mypage/list/*', ['controller' => 'Mypages', 'action' => 'list']);
        $builder->connect('/mypage/create/*', ['controller' => 'Mypages', 'action' => 'create']);
        $builder->connect('/mypage/edit/*', ['controller' => 'Mypages', 'action' => 'edit']);
        $builder->connect('/mypage/*', ['controller' => 'Mypages', 'action' => 'delete']);

        $builder->connect('/users', ['controller' => 'Users', 'action' => 'index']);
        $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/users/logout', ['controller' => 'Users', 'action' => 'logout']);
        $builder->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);

        //Admin用
        // $builder->connect('/users/view/*', ['controller' => 'Users', 'action' => 'view']);
        // $builder->connect('/users/edit/*', ['controller' => 'Users', 'action' => 'edit']);
        // $builder->connect('/users/delete/*', ['controller' => 'Users', 'action' => 'delete']);


        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks();
    });

};
