<?php
session_start();
include 'db.php';

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Remove item from cart
if (isset($_GET['remove_id'])) {
    $remove_id = intval($_GET['remove_id']);
    if (($key = array_search($remove_id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
    }
    header("Location: cart.php");
    exit();
}

// Add item to cart
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h1>E-Nursery 🌱</h1>
    <button class="menu-toggle">☰</button>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <?php if (isset($_SESSION['user_id'])): ?> 
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </div>
</nav>

<div class="cart-container">
    <h2>Your Cart</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id):
                $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
                if ($row = mysqli_fetch_assoc($result)): 
                    $total += $row['price'];
            ?>
            <li class="cart-item">
                <span><?php echo $row['name']; ?> - $<span class="cart-item-price"><?php echo number_format($row['price'], 2); ?></span></span>
                <a href="cart.php?remove_id=<?php echo $id; ?>" class="remove-btn">Remove</a>
            </li>
            <?php endif; endforeach; ?>
        </ul>
        <p><strong>Total: $<span id="total-price"><?php echo number_format($total, 2); ?></span></strong></p>
        <a href="checkout.php" id="checkout-btn" class="checkout-btn">Proceed to Checkout</a>
    <?php endif; ?>
</div>

<script src="script.js"></script>
</body>
</html>
