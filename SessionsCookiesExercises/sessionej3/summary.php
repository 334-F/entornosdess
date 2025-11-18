<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<h2>Your Selected Products</h2>
<p><b>Fruits:</b> <?= implode(', ', $_SESSION['fruits'] ?? []) ?></p>
<p><b>Drinks:</b> <?= implode(', ', $_SESSION['drinks'] ?? []) ?></p>
<a href="fruits.php">Change Fruits</a><br>
<a href="drinks.php">Change Drinks</a><br>
<a href="fruits.php">Start again</a>
</body>
</html>
