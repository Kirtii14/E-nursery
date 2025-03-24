<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "Please login first!";
    exit;
}

$user_id = $_SESSION['user_id'];
$total_price = 0;

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty!";
    exit;
}

foreach ($_SESSION['cart'] as $id) {
    $id = intval($id);
    $result = mysqli_query($conn, "SELECT price FROM products WHERE id=$id");
    if ($row = mysqli_fetch_assoc($result)) {
        $total_price += $row['price'];
    }
}

$query = "INSERT INTO orders (user_id, total_price) VALUES ($user_id, $total_price)";
if (mysqli_query($conn, $query)) {
    $order_id = mysqli_insert_id($conn);
    $_SESSION['cart'] = [];
    header("Location: receipt.php?order_id=$order_id");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
