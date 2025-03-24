<?php
session_start();
include 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please login first!";
    exit;
}

$order_id = $_GET['order_id'] ?? null;
if (!$order_id) {
    echo "Invalid order ID.";
    exit;
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($user_query);

// Fetch order details
$order_query = mysqli_query($conn, "SELECT * FROM orders WHERE id=$order_id");
$order = mysqli_fetch_assoc($order_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link rel="stylesheet" href="style.css"> <!-- ✅ Link to CSS -->
</head>
<body>

<!-- 🌿 Navigation Bar -->
<nav>
    <h1>E-Nursery 🌱</h1>
    <button class="menu-toggle">☰</button>
    <div class="nav-links">
        <a href="index.php" class="nav-item">Home</a>
        <a href="cart.php" class="nav-item">Cart</a>
        <?php if (isset($_SESSION['user_id'])): ?> 
            <a href="logout.php" class="nav-item">Logout</a>
        <?php else: ?>
            <a href="login.php" class="nav-item">Login</a>
            <a href="register.php" class="nav-item">Register</a>
        <?php endif; ?>
    </div>
</nav>

<!-- 🌿 Receipt Section -->
<div class="receipt-container">
    <h2>Order Receipt</h2>
    <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
    <p><strong>Customer:</strong> <?php echo htmlspecialchars($user['username']) . " (" . htmlspecialchars($user['email']) . ")"; ?></p>
    <p><strong>Order Date:</strong> <?php echo $order['order_date']; ?></p>
    <p><strong>Total Amount:</strong> $<?php echo number_format($order['total_price'], 2); ?></p>
    
    <a href="download_receipt.php?order_id=<?php echo $order_id; ?>" class="download-btn">Download PDF</a>
</div>

<script src="script.js"></script> <!-- ✅ Include JavaScript -->
</body>
</html>

