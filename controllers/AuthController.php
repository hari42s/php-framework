<?php 
class AuthController extends BaseController {
   
    private $username;
    private $password;
    public static function index() {
        if($_SERVER['REQUEST_URI'] == '/register') {
            Router::view(ROOT.'views/register.view.php');
        } else if($_SERVER['REQUEST_URI'] == '/login'){
            Router::view(ROOT.'views/login.view.php');
        }
    }

    public function register($data)
    {
        try {

            $this->username = $data['username'];
            $this->password = $data['password'];
            $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
            
            $auth = new AuthModel();
            $auth->addUser($this->username, $hashed_password);

            return header('Location: /');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login($data)
    {
        try {
            $this->username = $data['username'];
            $this->password = $data['password'];

            $auth = new AuthModel; 
            ($auth->authenticate($this->username, $this->password));

            return header('Location: /');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
    
}