<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = (int) $_POST['product_id'];
    $newStock = (int) $_POST['new_stock'];

    if (isset($_SESSION['products'][$productId])) {
        $_SESSION['products'][$productId]['stock'] = $newStock;
    }

    header('Location: inventory.php');
    exit;
}

$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="update_stock.php">Update Stock</a></li>
            </ul>
        </nav>
        <h1>Update Stock</h1>
    </header>
    <main>
        <h2>Update Stock</h2>
        <form action="update_stock.php" method="post">
            <label for="product_id">Product:</label>
            <select name="product_id" id="product_id">
                <?php foreach ($products as $id => $product): ?>
                    <option value="<?= $id ?>"><?= $product['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="new_stock">New Stock:</label>
            <input type="number" name="new_stock" id="new_stock" min="0" required>
            <button type="submit">Update</button>
        </form>
    </main>
</body>
</html>
