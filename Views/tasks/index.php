<?php
require_once 'config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();}

// Include appropriate tasks view based on user's role
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    require_once 'Views/tasks/admin_tasks.php'; // Include admin tasks view
} else {
    require_once 'Views/tasks/user_tasks.php'; // Include user tasks view
}
?>
