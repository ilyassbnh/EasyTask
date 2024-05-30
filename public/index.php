<?php
require_once '../config/config.php';

spl_autoload_register(function ($className) {
    require_once '../app/models/' . $className . '.php';
    require_once '../app/controllers/' . $className . '.php';
});

$app = new App();
?>

