<?php
session_start();

// Simple login
if (!isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['user'] = $_POST['username'];
        header("Location: cookie_favorites.php");
        exit();
    }

    echo '<form method="post">
        <h2>Login</h2>
        <input name="username" required>
        <input type="submit" value="Enter">
    </form>';
    exit();
}

$user = $_SESSION['user'];
$cookieName = "fav_" . $user;

// Load favorites from cookie
$favorites = [];
if (isset($_COOKIE[$cookieName])) {
    $favorites = explode(",", $_COOKIE[$cookieName]);
}

// Update favorites
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['favorites'])) {
    $favorites = $_POST['favorites'];
    $favString = implode(",", $favorites);
    setcookie($cookieName, $favString, time() + (86400 * 30));
    header("Location: cookie_favorites.php");
    exit();
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: cookie_favorites.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Hello, <?= htmlspecialchars($user) ?>!</h2>
<form method="post">
  <h3>Select your favorite products:</h3>
  <input type="checkbox" name="favorites[]" value="Apple" <?= in_array("Apple", $favorites) ? "checked" : "" ?>> Apple<br>
  <input type="checkbox" name="favorites[]" value="Banana" <?= in_array("Banana", $favorites) ? "checked" : "" ?>> Banana<br>
  <input type="checkbox" name="favorites[]" value="Orange" <?= in_array("Orange", $favorites) ? "checked" : "" ?>> Orange<br>
  <input type="checkbox" name="favorites[]" value="Water" <?= in_array("Water", $favorites) ? "checked" : "" ?>> Water<br><br>
  <input type="submit" value="Save Favorites">
</form>

<h3>Your favorites:</h3>
<ul>
<?php
if (!empty($favorites)) {
    foreach ($favorites as $f) echo "<li>$f</li>";
} else echo "<li>No favorites selected.</li>";
?>
</ul>

<a href="?logout=true">Logout</a>
</body>
</html>
