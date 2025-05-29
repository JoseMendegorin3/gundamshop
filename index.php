<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .header-container {
            position: center;
            width: 120%;
            height: 100vh; /* Set height to 100% of the viewport height */
            overflow: hidden;
            margin: auto;
        }

        .header-container video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }

        .header-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 1;
            width: 100%;
        }

        .header-content img {
            max-width: 100%;
            height: auto;
        }

        .shop-now-container {
            text-align: center;
            margin-top: 20px;
        }

        .shop-now-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: gray;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        header {
        position: relative;
            background-color: #333;
            color: white;
            padding: 10px 0;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
        }

        .logo-img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar {
            display: none;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar ul li {
            margin: 0 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
        }

        .menu-toggle {
            display: none;
        }

        .menu-icon {
            display: block;
            cursor: pointer;
            font-size: 24px;
            user-select: none;
        }

        /* Checkbox Hack */
        #menu-toggle:checked + .menu-icon + .navbar {
            display: block;
        }

        @media (max-width: 768px) {
            .navbar {
                position: absolute;
                background-color: #333;
                top: 50px;
                left: 0;
                width: 100%;
            }

            .navbar ul {
                flex-direction: column;
                display: none;
            }

            .navbar ul li {
                text-align: center;
                margin: 10px 0;
            }

            #menu-toggle:checked + .menu-icon + .navbar ul {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body class="index">

<header>
    <section class="flex">
        <a href="index.php" class="logo">
            <img src="images/logo.png" alt="Logo" class="logo-img">
            Gundam<span>Store</span>
        </a>
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
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
    <div class="header-container">
        <video autoplay muted loop>
            <source src="images/bgvid.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="header-content">
            <img src="images/logo-full.png" alt="Welcome to Gundam Shop">
            <div class="shop-now-container">
                <a href="products.php">Shop Now</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
