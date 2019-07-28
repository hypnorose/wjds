<?php
define('ROOT',"/");
require ROOT . "config/core.php";
require ROOT . "core/Model.php";
require ROOT . "core/Controller.php";
require ROOT . "core/View.php";
require ROOT . "Dispatcher.php";
require ROOT . "Router.php";
require ROOT . "Request.php";

$router=new Router;
$router->add('',['controller'=> 'home','action'=> 'show']);
$router->add('addlink',['controller' => 'home','action' => 'add']);
$router->add('{link}',['controller' => 'home', 'action' => 'forward']);

//$router->add('home/{action}',['controller' => 'Home']);
//$router->add('user/view/{id:\d+}');
$dispatcher = new Dispatcher($router);
$dispatcher->dispatch();