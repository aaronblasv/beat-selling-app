<?php
session_start();
$total = isset($_SESSION['last_order_total']) ? $_SESSION['last_order_total'] : 0.00;
$email = isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : 'your email';

unset($_SESSION['cart']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success!</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div style="text-align: center; margin-top: 100px;">
        <h2>🎉 Payment Successful!</h2>
        <p>Thank you for your purchase. Your payment of **$<?php echo number_format($total, 2); ?>** has been confirmed.</p>
        <p>Your beats are being processed and the download links will be sent to **<?php echo htmlspecialchars($email); ?>** shortly.</p>
        
        <a href="index.php" class="cta-button" style="margin-top: 20px;">Return to Home</a>
    </div>
</body>
</html>