<?php
define("ROOT", __DIR__ ."/");

include ROOT.'core/config.php'; 
include ROOT.'core/autoloader.php';
include ROOT.'router/router.php';
include ROOT.'router/routes.php';

$router->run();
?>