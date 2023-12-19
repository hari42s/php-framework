<?php
session_start();
define("ROOT", __DIR__ ."/");
include ROOT.'core/config.php'; 
include ROOT.'router/routes.php';

$router->run();
?>