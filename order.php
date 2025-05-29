<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

if (!isset($_SESSION['last_order'])) {
    header("location: products.php");
    exit;
}

$last_order = $_SESSION['last_order'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<header>
    <section class="flex">
    <a href="index.php" class="logo">
            <img src="images/logo.png" alt="Logo" class="logo-img">
            Gundam<span>Store</span>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <a href="logout.php">Logout</a>
      </nav>
    </header>
    <div class="container">
 
        <h1>Thank you for your Order</h1>
        <h2>Go chuumon</h2>
        <h2>Arigatou gozai masu !!</h2>
        <h1>You have ordered <?php echo htmlspecialchars($last_order['quantity']); ?> of <?php echo htmlspecialchars($last_order['name']); ?>.</h1>
        <a href="products.php">Continue Shopping</a>
    </div>
    <footer>
        <p>&copy; 2024 Gundam Shop. All rights reserved.</p>
    </footer>
</body>
</html>
