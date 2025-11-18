<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $cookieName = "user_" . $username;

    if (isset($_COOKIE[$cookieName])) {
        echo "<p>Welcome back, $username!</p>";
        echo "<p>Your last login was: " . $_COOKIE[$cookieName] . "</p>";
    } else {
        echo "<p>Hello $username, first login recorded!</p>";
    }

    // Update login time
    $now = date("Y-m-d H:i:s");
    setcookie($cookieName, $now, time() + (86400 * 30)); // 30 days
    echo "<p>Current login: $now</p>";
    echo '<a href="cookie_multiusers.php">Login again</a>';
} else {
?>
<form method="post">
  <h2>Multiple Users Login</h2>
  Username: <input name="username"><br><br>
  Password: <input name="password" type="password"><br><br>
  <input type="submit" value="Login">
</form>
<?php
}
?>

</body>
</html>