<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Start
if (isset($_COOKIE['username'])) {
    // If cookie exists → greet user
    $username = $_COOKIE['username'];
    echo "<h2>Welcome back, $username!</h2>";
    echo '<a href="?logout=true">Logout</a>';

    // Logout = delete cookie
    if (isset($_GET['logout'])) {
        setcookie('username', '', time() - 3600);
        header("Location: cookie_login.php");
        exit();
    }
} else {
    // No cookie → show login form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Simple validation (any user/password accepted)
        if (!empty($username) && !empty($password)) {
            setcookie('username', $username, time() + 3600); // 1 hour
            echo "<p>Cookie created! Welcome $username</p>";
            echo '<meta http-equiv="refresh" content="1;url=cookie_login.php">';
        } else {
            echo "<p style='color:red;'>Incorrect data, try again.</p>";
        }
    }

    // Form
    echo '<form method="post">
        Username: <input name="username"><br><br>
        Password: <input name="password" type="password"><br><br>
        <input type="submit" value="Login">
    </form>';
}
?>

    
</body>
</html>