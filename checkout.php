<?php

include 'includes/session_setup.php';
include 'includes/config.php';

$cart_items = [];
$total_price = 0.00;
$error_message = '';


if (!empty($_SESSION['cart'])) {
    
    $placeholders = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
    $sql = "SELECT id, titulo, precio, genero FROM beats WHERE id IN ($placeholders)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($_SESSION['cart']);
        $cart_items = $stmt->fetchAll();

        foreach ($cart_items as $item) {
            $total_price += $item['precio'];
        }
        
    } catch (PDOException $e) {
        $error_message = "Error fetching cart details for checkout: " . $e->getMessage();
    }
} else {
    header('Location: catalogo.php?status=cart_empty');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $total_price > 0) {
    
    $customer_name = filter_input(INPUT_POST, 'customer_name', FILTER_SANITIZE_STRING);
    $customer_email = filter_input(INPUT_POST, 'customer_email', FILTER_VALIDATE_EMAIL);

    if (empty($customer_name) || !$customer_email) {
        $error_message = "Please provide a valid name and email address.";
    } else {
        
        // Here you would normally integrate with a payment gateway like Stripe or PayPal.

        // --- SIMULATION ---
        $message = "Payment link generated for $" . number_format($total_price, 2) . ". ";
        $message .= "Customer: " . $customer_name . " (" . $customer_email . ").";

        $_SESSION['last_order_total'] = $total_price;
        $_SESSION['customer_email'] = $customer_email;
        header('Location: payment_success.php'); 
        exit;
    }
}
?>

<?php include 'includes/header.php'; ?>
    
    <main class="checkout-container">
        <h2>💳 Secure Checkout</h2>

        <?php if (!empty($error_message)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <h3>Order Summary (<?php echo count($cart_items); ?> Items)</h3>
        <ul class="order-list">
            <?php foreach ($cart_items as $item): ?>
                <li><?php echo htmlspecialchars($item['titulo']); ?> - $<?php echo number_format($item['precio'], 2); ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="final-total">
            <h3>TOTAL DUE: $<?php echo number_format($total_price, 2); ?></h3>
        </div>

        <form action="checkout.php" method="POST" class="customer-form">
            <h3>Customer Information</h3>
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="customer_name" required>

            <label for="email">Email Address (for beat delivery):</label>
            <input type="email" id="email" name="customer_email" required>

            <br>
            <button type="submit" class="cta-button checkout-btn">
                Pay $<?php echo number_format($total_price, 2); ?> Now
            </button>
        </form>

    </main>
    
</body>
</html>