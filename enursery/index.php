<?php
session_start(); // Start session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Nursery | Home</title>
    <link rel="stylesheet" href="style.css"> 
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

<!-- 🌿 Hero Section -->
<div class="heroo">
    <h1> HAPPINESS IS <br>
       <span style = "color: #A7D477;"> ...BUYING PLANTS</span></h1>

</div>

<!-- 🌿 Product Display Section -->
<h2>Our Beautiful Plants</h2>
<div class="product-container">
    <?php include 'products.php'; ?>
</div>

<script src="script.js"></script> 
</body>
</html>

