<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Initialize products in session if not already done
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["id" => 1, "name" => "MG Gundam Barbatos 1/100", "price" => "$1000", "image" => "barbatos5.jpg", "quantity" => 1000, "description" => "<ul><li>Joining the prestigious Master Grade line is the 4th form of Gundam Barbatos from Gundam Iron-Blooded Orphans!</li><li>The inner structure of the Gundam Frame and Dual Ahab reactors have been faithfully recreated and feature gimmicks that allow for dynamic posing including piston movement with various parts of the body including shoulders, chest, and legs.</li><li>Color separation is used generously throughout the kit providing the easiest building experience yet for the Barbatos series.</li><li>Product Features:<ul><li>7 inches (17.78cm)</li><li>Made of plastic</li><li>From the Gundam Iron-Blooded Orphans anime</li><li>Gundam Barbatos fourth form</li><li>Gimmicks that allow for dynamic posing</li><li>Piston movement with various parts</li><li>Color separation is used generously</li><li>Easy building experience</li><li>Instructions may or may not include English translation</li></ul></li><li>Box Contents:<ul><li>Pieces to build Gundam Barbatos</li><li>Mace</li><li>Sword</li><li>Smoothbore gun</li></ul></li></ul>", "additional_images" => ["barbatos2.jpg", "barbatos3.jpg","barbatos4.jpg","barbatos5.jpg","barbatos6.jpg","barbatos7.jpg","barbatos9.jpg","barbatoscover.jpg"]],
        ["id" => 2, "name" => "Legend Kiyomori 1/100 (Red Ogre)", "price" => "$2000", "image" => "kiyomori5.jpg", "quantity" => 1000, "description" => "<ul><li>This is the Legend Kiyomori 1/100 (Red Ogre) model kit.</li></ul>", "additional_images" => ["kiyomori.jpg", "kiyomori2.jpg","kiyomori1.jpg","kiyomori3.jpg","kiyomori4.jpg"]],
        ["id" => 3, "name" => "MGEX Unicorn Gundam Ver. Ka.", "price" => "$3000", "image" => "Unicorn1.jpg", "quantity" => 1000, "description" => "<ul><li>This is the MGEX Unicorn Gundam Ver. Ka.</li></ul>", "additional_images" => ["Unicorn2.jpg", "Unicorn3.jpg","Unicorn4.jpg","Unicorn5.jpg","Unicorn6.jpg"]],
        ["id" => 4, "name" => "Mecha Core Industry 1/100 Charon", "price" => "$4000", "image" => "Charon1.jpg", "quantity" => 1000, "description" => "<ul><li>This is the Mecha Core Industry 1/100 Charon Model Kit.</li></ul>", "additional_images" => ["Charon2.jpg", "Charon3.jpg","Charon4.jpg"]],
        ["id" => 5, "name" => "PG Strike Freedom Gundam", "price" => "$5000", "image" => "Strike3.jpg", "quantity" => 1000, "description" => "<ul><li>This is the PG Strike Freedom Gundam.</li></ul>", "additional_images" => ["Strike.jpg", "Strike2.jpg","Strike4.jpg","Strike5.jpg","Strike6.jpg"]],
        ["id" => 6, "name" => "In Era+ Infinity Nova Aurora 1/100 ", "price" => "$6000", "image" => "add3.jpg", "quantity" => 1000, "description" => "<ul><li>In Era+ Infinity Nova Aurora 1/100 Scale Model Kit (Figure).</li></ul>", "additional_images" => ["nova1.jpg", "nova2.jpg"]],
        ["id" => 7, "name" => " Black Knight Squad Shi-ve.A", "price" => "$7000", "image" => "Knight1.jpg", "quantity" => 1000, "description" => "<ul><li>This is the HGCE #245 Black Knight Squad Shi-ve.A.</li></ul>", "additional_images" => ["Knight2.jpg", "Knight3.jpg"]],
        ["id" => 8, "name" => "Sky Defender 1/72 Model Kit", "price" => "$8000", "image" => "sky4.jpg", "quantity" => 1000, "description" => "<ul><li>This is the Sky Defender 1/72 Model Kit (Deluxe version).</li></ul>", "additional_images" => ["Sky1.jpg", "Sky2.jpg","Sky23.jpg"]],
        ["id" => 9, "name" => "Eternal Star Glory 1/100 Model Kit", "price" => "$9000", "image" => "Glory2.jpg", "quantity" => 1000, "description" => "<ul><li>This is the Eternal Star Glory 1/100 Model Kit.</li></ul>", "additional_images" => ["Glory1.jpg", "Glory3.jpg","Glory4.jpg"]],
        ["id" => 10, "name" => "RG #27 Unicorn Gundam 02 Banshee ", "price" => "$10000", "image" => "banshe.jpg", "quantity" => 1000, "description" => "<ul><li>This is a RG #27 Unicorn Gundam 02 Banshee Norn.</li></ul>", "additional_images" => ["/banshe2.jpg", "banshe3.jpg"]],
       
    ];
}

$products = $_SESSION['products'];

// Handle search
$search_query = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search_query = strtolower(trim($_GET['search']));
    if (!empty($search_query)) {
        $products = array_filter($products, function($product) use ($search_query) {
            return strpos(strtolower($product['name']), $search_query) !== false;
        });
    }
}

// Handle ordering
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    foreach ($products as &$product) {
        if ($product['id'] === $product_id && $product['quantity'] >= $quantity) {
            $product['quantity'] -= $quantity;
            $_SESSION['last_order'] = [
                'name' => $product['name'],
                'quantity' => $quantity
            ];
            $_SESSION['products'] = $products; // Update session inventory
            header("location: order.php");
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
   
    <link rel="stylesheet" href="css/style.css">
    <style>
        .quick-view {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            height: 90%;
            max-width: 800px; /* Adjust max-width to control maximum width */
            max-height: 90%;
            overflow-y: auto;
            background: white;
            border: 1px solid #ccc;
            z-index: 1000;
        }
        .quick-view img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .quick-view .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 24px;
            color: #555;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        .show {
            display: block;
        }
        .product-description ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        .product-description ul ul {
            list-style-type: circle;
            padding-left: 20px;
        }
        
    </style>
</head>
<body>
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
                <a href="logout.php">Logout</a>
            </ul>
        </nav>
    </section>
</header>
<div class="container">
    <h1>Pick Your Weapon</h1>

    <!-- Search Form -->
    <form action="products.php" method="get">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search products...">
        <button type="submit">Search</button>
    </form>

    <div class="products-grid">
        <?php if (empty($products)): ?>
            <p>No products found matching your search criteria.</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="product-details">
                        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                        <p>Price: <?php echo htmlspecialchars($product['price']); ?></p>
                        <p>Available: <?php echo htmlspecialchars($product['quantity']); ?></p>
                        <button type="button" onclick="document.getElementById('quick-view-<?php echo $product['id']; ?>').classList.add('show'); document.querySelector('.overlay').classList.add('show');">Quick View</button>
                        <form action="products.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="<?php echo htmlspecialchars($product['quantity']); ?>" required>
                            <button type="submit" name="place_order">Checkout</button>
                        </form>
                    </div>
                </div>

                <!-- Quick View Modal -->
                <div id="quick-view-<?php echo $product['id']; ?>" class="quick-view">
                    <div class="close" onclick="document.getElementById('quick-view-<?php echo $product['id']; ?>').classList.remove('show'); document.querySelector('.overlay').classList.remove('show');">&times;</div>
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <div class="product-description">
                        <?php echo $product['description']; ?>
                    </div>
                    <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <?php foreach ($product['additional_images'] as $image): ?>
                        <img src="images/<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Overlay -->
<div class="overlay" onclick="document.querySelectorAll('.quick-view').forEach(q => q.classList.remove('show')); document.querySelector('.overlay').classList.remove('show');"></div>

</body>
</html>
