<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 // Cart setup
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>