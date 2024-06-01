<?php
// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'easytask');
define('DB_USER', 'root');
define('DB_PASS', '');

// Autoload des classes
spl_autoload_register(function ($class) {
    if (file_exists(__DIR__ . '/Models/' . $class . '.php')) {
        require_once __DIR__ . '/Models/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/Controllers/' . $class . '.php')) {
        require_once __DIR__ . '/Controllers/' . $class . '.php';
    } else {
        echo "Impossible de charger la classe : $class";
    }
});
?>
