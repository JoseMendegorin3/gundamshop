<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Here you can add code to store the message in the database or send it via email

    // For this example, we will just display a thank you message
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Message Sent</title>
        <link rel='stylesheet' href='css/style.css'>
        
    </head>
    <body class='contact'>
    <header>
        <section class='flex'>
            <a href='index.php' class='logo'>
                <img src='images/logo.png' alt='Logo' class='logo-img'>
                Gundam<span>.Shop</span>
            </a>
            <nav class='navbar'>
                <ul>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='products.php'>Products</a></li>
                    <li><a href='order.php'>Order</a></li>
                    <li><a href='inventory.php'>Inventory</a></li>
                    <li><a href='about.php'>About Us</a></li>
                    <li><a href='contact.php'>Contact Us</a></li>
                </ul>
            </nav>
        </section>
    </header>
    <div class='container'>
        <h1>Thank You for Messaging Us!</h1>
        <p>Thank you, $name, for reaching out to us. We kindly reflect to your message and will get back to you as soon as possible.</p>
        <a href='products.php' class='btn-continue-shopping'>Continue Shopping</a>
    </div>
    <footer>
        <p>&copy; 2024 Gundam Shop. All rights reserved.</p>
    </footer>
    <style>
        .btn-continue-shopping {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-continue-shopping:hover {
            background-color: #0056b3;
        }
    </style>
    </body>
    </html>";
} else {
    // If the form was not submitted via POST, redirect back to the contact page
    header("location: contact.php");
    exit;
}
?>
