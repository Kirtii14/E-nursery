<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM products");

echo "<div class='product-container'>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='product-card'>
            <img src='uploads/" . $row['image'] . "' alt='" . $row['name'] . "'>
            <p>" . $row['name'] . " - $" . $row['price'] . "</p>
            <a href='cart.php?id=" . $row['id'] . "' class='add-to-cart'>Add to Cart</a>
          </div>";
}

echo "</div>";
?>
