<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['drink'] = $_POST['drink'];
    header('Location: summary.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Select a drink</h2>
<form method="post">
  <select name="drink">
    <option value="Water">Water</option>
    <option value="Juice">Juice</option>
    <option value="Soda">Soda</option>
  </select>
  <br><br>
  <input type="submit" value="Show Summary">
</form>
</body>
</html>
