<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['fruits'] = $_POST['fruits'] ?? [];
    header('Location: drinks.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Select your fruits</h2>
<form method="post">
  <input type="checkbox" name="fruits[]" value="Apple"> Apple<br>
  <input type="checkbox" name="fruits[]" value="Banana"> Banana<br>
  <input type="checkbox" name="fruits[]" value="Orange"> Orange<br>
  <br>
  <input type="submit" value="Next">
</form>
</body>
</html>
