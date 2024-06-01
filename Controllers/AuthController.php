<?php
class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->findByUsername($username);

            if ($user && $password == $user['password']) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: index.php?action=tasks');
                exit;
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
                require_once 'Views/auth/login.php';
            }
        } else {
            require_once 'Views/auth/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->userModel->findByUsername($username)) {
                $error = "Nom d'utilisateur déjà pris.";
                require_once 'Views/auth/register.php';
            } else {
                if ($this->userModel->create($username, $password)) {
                    echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
                    require_once 'Views/auth/login.php';
                } else {
                    $error = "Une erreur est survenue. Veuillez réessayer.";
                    require_once 'Views/auth/register.php';
                }
            }
        } else {
            require_once 'Views/auth/register.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /index.php?action=login');
        exit;
    }
}
?>
