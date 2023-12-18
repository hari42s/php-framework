<?php 
spl_autoload_register('controllerAutoLoader');

function controllerAutoLoader($className) {
    $path = "controllers/";
    $file_ext = ".php";
    $pathname = $path . $className . $file_ext;

    include_once $pathname;
}

?>