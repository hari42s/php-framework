<?php 
$router = new Router();

$router->add('GET', '/', function () {
    $middleware = new AuthMiddleware;
    if($middleware->authenticated()) {
    
        if(!$middleware->authenticated()) {
            header('Location: /');
        }
    
        HomeController::dashboard();
        exit;
    } else {
        HomeController::index();
        exit;
    }
});

$router->add('GET', '/products', function () {
    $middleware = new AuthMiddleware;
    
    if(!$middleware->authenticated()) {
        header('Location: /');
    }

    ProductController::index();
    exit;
});

$router->add('GET', '/users', function () {
    $middleware = new AuthMiddleware;
    
    if(!$middleware->authenticated()) {
        header('Location: /');
    }

    UserController::index();
    exit;
});

$router->add('GET', '/register', function () {
    $middleware = new AuthMiddleware;
    
    if($middleware->authenticated()) {
        header('Location: /');
    }

    AuthController::index();
    exit;
});
$router->add('POST', '/reg', function () {
    $auth = new AuthController;
    $auth->register($_POST);
    exit;
});

$router->add('GET', '/login', function () {
    $middleware = new AuthMiddleware;
    
    if($middleware->authenticated()) {
        header('Location: /');
    }
    
    AuthController::index();
    exit;
});
$router->add('POST', '/auth', function () {
    $auth = new AuthController;
    $auth->login($_POST);
    exit;
});

$router->add('GET', '/logout', function () {
    $auth = new AuthController;
    $auth->logout();
    header('Location: /');
    exit;
});