<?php
$servername = "localhost";  // XAMPP default
$username = "root";         // Default username for MySQL in XAMPP
$password = "";             // Default password is empty
$database = "ecommerce_db"; // Change to your database name

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>