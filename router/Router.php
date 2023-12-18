<?php 

class Router {

    private $routes = []; 

    public function add(string $method, string $url, closure $target) {
        $this->routes[$method][$url] = $target;
    }

    public static function view($view) {
        require_once $view;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                // subpatterns in regex pattern to capture each parameter value separately
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    // pass the parameter values as named arguments to function
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); // only keep subpattern matches
                    call_user_func_array($target, $params);
                    return;
                }
            }
        }
        
        $this->view(ROOT.'/views/404.php');
    }

}