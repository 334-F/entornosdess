<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['fruit'] = $_POST['fruit'];
    header('Location: category2.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Select a fruit</h2>
<form method="post">
  <select name="fruit">
    <option value="Apple">Apple</option>
    <option value="Banana">Banana</option>
    <option value="Orange">Orange</option>
  </select>
  <br><br>
  <input type="submit" value="Next">
</form>
</body>
</html>
