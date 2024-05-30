<?php
class UserController extends Controller {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->model('User');
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT)
            ];
            if ($userModel->register($data)) {
                header('Location: ' . URLROOT . '/users/login');
            } else {
                die('Something went wrong');
            }
        } else {
            $this->view('users/register');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->model('User');
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $user = $userModel->login($email, $password);
            if ($user) {
                $_SESSION['user_id'] = $user->id;
                header('Location: ' . URLROOT . '/tasks');
            } else {
                die('Invalid credentials');
            }
        } else {
            $this->view('users/login');
        }
    }
}
?>
