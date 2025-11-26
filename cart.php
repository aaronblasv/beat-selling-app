<?php
// Incluimos la configuración de sesión y la conexión a la base de datos
include 'includes/session_setup.php';
include 'includes/config.php';

$cart_items = [];
$total_price = 0.00;

// Solo si hay algo en el carrito de la sesión
if (!empty($_SESSION['cart'])) {
    
    // Convertimos el array de IDs en una lista separada por comas para la consulta SQL
    $placeholders = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
    
    // Construimos la consulta SQL (usando PDO para seguridad)
    $sql = "SELECT id, titulo, precio, genero FROM beats WHERE id IN ($placeholders)";
    
    try {
        $stmt = $pdo->prepare($sql);
        
        // Ejecutamos la consulta, pasando los IDs del carrito como parámetros
        $stmt->execute($_SESSION['cart']);
        $cart_items = $stmt->fetchAll();
        
        // Calculamos el precio total
        foreach ($cart_items as $item) {
            $total_price += $item['precio'];
        }
        
    } catch (PDOException $e) {
        $error_message = "Error fetching cart details: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Shopping Cart | Aaron's Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <main class="cart-page-container">
        <h2>🛒 Your Shopping Cart</h2>

        <?php if (!empty($error_message)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php elseif (empty($cart_items)): ?>
            <p>Your cart is empty! <a href="catalogo.php">Start adding some beats.</a></p>
        <?php else: ?>
            
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($item['genero']); ?></td>
                            <td>$<?php echo number_format($item['precio'], 2); ?></td>
                            <td>
                                <button class="remove-from-cart-btn" data-beat-id="<?php echo $item['id']; ?>">Remove</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <h3>Total: $<?php echo number_format($total_price, 2); ?></h3>
                
                <a href="checkout.php" class="cta-button">Proceed to Checkout</a>
            </div>

        <?php endif; ?>

    </main>
    
    <script src="assets/js/main.js"></script>
</body>
</html>