<?php
// Credentials database
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tienda_beats'); 
define('DB_USER', 'tienda_beats_app_yovny');
define('DB_PASS', 'Gragraboom123!');

// PDO Connection Setup
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En un proyecto real no mostrarías el error al usuario, sino un mensaje amigable.
    die("Database Connection Error: " . $e->getMessage()); 
}
?>