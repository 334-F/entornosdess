<?php
session_start();

// Handle login
if (!isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['username'] = $_POST['username'];
        header("Location: cookie_cart.php");
        exit();
    }

    echo '<form method="post">
        <h2>Enter your name to login</h2>
        <input name="username" required>
        <input type="submit" value="Login">
    </form>';
    exit();
}

$username = $_SESSION['username'];
$cookieName = "cart_" . $username;

// Load old cart if cookie exists
if (isset($_COOKIE[$cookieName])) {
    $_SESSION['cart'] = explode(",", $_COOKIE[$cookieName]);
}

// Add products to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['products'])) {
    $_SESSION['cart'] = $_POST['products'];
    $cartString = implode(",", $_SESSION['cart']);
    setcookie($cookieName, $cartString, time() + (86400 * 30));
    header("Location: cookie_cart.php");
    exit();
}

// Logout and save cookie
if (isset($_GET['logout'])) {
    $cartString = implode(",", $_SESSION['cart'] ?? []);
    setcookie($cookieName, $cartString, time() + (86400 * 30));
    session_destroy();
    header("Location: cookie_cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Hello, <?= htmlspecialchars($username) ?>!</h2>

<form method="post">
  <h3>Select products:</h3>
  <input type="checkbox" name="products[]" value="Apple"> Apple<br>
  <input type="checkbox" name="products[]" value="Banana"> Banana<br>
  <input type="checkbox" name="products[]" value="Orange"> Orange<br>
  <input type="checkbox" name="products[]" value="Water"> Water<br>
  <br>
  <input type="submit" value="Save Cart">
</form>

<h3>Your current cart:</h3>
<ul>
<?php
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) echo "<li>$item</li>";
} else echo "<li>No items selected.</li>";
?>
</ul>
<a href="?logout=true">Logout (Save Cart)</a>
</body>
</html>
