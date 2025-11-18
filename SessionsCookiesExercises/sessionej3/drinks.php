<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['drinks'] = $_POST['drinks'] ?? [];
    header('Location: summary.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Select your drinks</h2>
<form method="post">
  <input type="checkbox" name="drinks[]" value="Water"> Water<br>
  <input type="checkbox" name="drinks[]" value="Juice"> Juice<br>
  <input type="checkbox" name="drinks[]" value="Soda"> Soda<br>
  <br>
  <input type="submit" value="Show Summary">
</form>
<a href="fruits.php">Back to Fruits</a>
</body>
</html>
