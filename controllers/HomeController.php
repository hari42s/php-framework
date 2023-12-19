<?php 

class HomeController extends BaseController {
    public static function index() {
        Router::view(ROOT.'views/home.view.php');
    }

    public static function dashboard() {
        Router::view(ROOT.'views/dashboard.view.php');
    }
}
