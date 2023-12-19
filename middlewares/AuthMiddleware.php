<?php 

class AuthMiddleware {
    public function authenticated()
    {
        if(isset($_SESSION['user'])) {
            return true;
        }
    }
}