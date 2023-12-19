<?php 
spl_autoload_register(function ($className) {

    $ext = ".php";
    $sources = array(
        "controllers/".$className.$ext, 
        "models/".$className.$ext, 
        "core/".$className.$ext, 
        "router/".$className.$ext, 
        "middlewares/".$className.$ext, 
    );

    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        } 
    } 
});

?>