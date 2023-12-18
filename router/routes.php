<?php 
$router = new Router();

$router->add('GET', '/', function () {
    Router::view(ROOT.'views/example.php');
    exit;
});