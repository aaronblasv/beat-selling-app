<?php
// DB Credentials (PLACEHOLDERS ONLY - DO NOT USE REAL CREDENTIALS)
define('DB_HOST', 'localhost');
define('DB_NAME', 'tienda_beats');
define('DB_USER', 'tu_usuario_aqui'); // REEMPLAZAR
define('DB_PASS', 'tu_contraseña_secreta'); // REEMPLAZAR

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