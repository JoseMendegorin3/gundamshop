<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body class="contact">
<header>
    <section class="flex">
        <a href="index.php" class="logo">
            <img src="images/logo.png" alt="Logo" class="logo-img">
            Gundam<span>Store</span>
        </a>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </section>
</header>
<div class="container">
    <h1>Contact Us</h1>
    <form action="send_message.php" method="post" class="contact-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>
        
        <button type="submit">Send Message</button>
    </form>
    <div class="social-links">
        <h2>Follow Us</h2>
        <a href="https://www.facebook.com/kielllwatanabe" class="social-link"><img src="images/fblogo.png" alt="Facebook"></a>
        <a href="https://x.com/uchiha17926" class="social-link"><img src="images/twiticon.png" alt="Twitter"></a>
        <a href="https://www.instagram.com/gundam.shop255" class="social-link"><img src="images/igicon.png" alt="Instagram"></a>
        
        
    </div>
</div>
<footer>
    <p>&copy; 2024 Gundam Store. All rights reserved.</p>
</footer>
</body>
</html>

