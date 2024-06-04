<?php
require_once 'config.php';
require_once 'Controllers/AuthController.php';
require_once 'Controllers/TaskController.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$authController = new AuthController();
$taskController = new TaskController();

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'tasks':
        $taskController->index();
        break;
    case 'create':
        $taskController->create();
        break;
    case 'edit':
        $taskController->edit($_GET['id']);
        break;
    case 'delete':
        $taskController->delete($_GET['id']);
        break;
    case 'markComplete':
        $taskController->markComplete($_GET['id']);
        break;
    default:
        $authController->login();
        break;
}
?>
