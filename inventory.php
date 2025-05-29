<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_stock'])) {
    $product_id = intval($_POST['product_id']);
    $new_stock = intval($_POST['new_stock']);

    // Retrieve products from session
    $products = $_SESSION['products'];

    foreach ($products as &$product) {
        if ($product['id'] === $product_id) {
            $product['quantity'] = $new_stock;
            $_SESSION['products'] = $products; // Update session inventory
            break;
        }
    }

    // Redirect back to products.php after updating inventory
    header("location: products.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="inventory">
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
                <li><a href="logout.php">Logout</a></li>
        </nav>
    </header>
    <div class="container">
        <h1>Inventory Management</h1>
        <div class="inventory-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock Available</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                            <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                            <td>
                                <form action="inventory.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="number" name="new_stock" min="0" value="<?php echo $product['quantity']; ?>" required>
                                    <button type="submit" name="update_stock">Update Stock</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="links">
            <a href="index.php">Back to Homepage</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
   
</body>
</html>
