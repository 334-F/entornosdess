<?php
session_start();

// Handle adding/updating items
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['quantity'] as $item => $qty) {
        if ($qty > 0) {
            $_SESSION['cart'][$item] = $qty;
        } else {
            unset($_SESSION['cart'][$item]);
        }
    }
}

// Predefined catalog
$products = ['Apple', 'Banana', 'Orange', 'Water', 'Juice', 'Soda'];
?>
<!DOCTYPE html>
<html>
<body>
<h2>Shopping Cart</h2>
<form method="post">
<table border="1" cellpadding="5">
<tr><th>Product</th><th>Quantity</th></tr>
<?php foreach ($products as $p): ?>
<tr>
  <td><?= $p ?></td>
  <td><input type="number" name="quantity[<?= $p ?>]" value="<?= $_SESSION['cart'][$p] ?? 0 ?>" min="0"></td>
</tr>
<?php endforeach; ?>
</table>
<br>
<input type="submit" value="Update Cart">
</form>

<h3>Selected Products:</h3>
<ul>
<?php
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item => $qty) {
        echo "<li>$item - $qty units</li>";
    }
} else {
    echo "<li>No products selected</li>";
}
?>
</ul>
<a href="?reset=true">Clear Cart</a>

<?php
if (isset($_GET['reset'])) {
    session_destroy();
    header('Location: shop_cart.php');
    exit();
}
?>
</body>
</html>
