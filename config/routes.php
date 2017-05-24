<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Posts', 'action' => 'index']);
    $routes->connect('/category/:slug', ['controller' => 'Posts', 'action' => 'category'], ['pass' => ['slug'], 'slug' => '[a-z0-9\-]+']);
    $routes->connect('/author/:id', ['controller' => 'Posts', 'action' => 'author'], ['pass' => ['id'], 'id' => '[0-9]+']);
    $routes->connect('/:slug', ['controller' => 'Posts', 'action' => 'view'], ['pass' => ['slug'], 'slug' => '[a-z0-9\-]+']);
    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/admin', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Admin', 'action' => 'index']);
    $routes->connect('/add', ['controller' => 'Admin', 'action' => 'add']);
    $routes->connect('/edit/:id', ['controller' => 'Admin', 'action' => 'edit'], ['pass' => ['id'], 'id' => '\d+']);
    $routes->connect('/delete/:id', ['controller' => 'Admin', 'action' => 'delete'], ['pass' => ['id'], 'id' => '\d+']);
    $routes->fallbacks(DashedRoute::class);
});
Plugin::routes();
