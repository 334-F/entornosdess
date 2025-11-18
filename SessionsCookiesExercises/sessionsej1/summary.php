<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<h2>Your Selected Items</h2>
<p>Fruit: <?php echo $_SESSION['fruit'] ?? 'None'; ?></p>
<p>Drink: <?php echo $_SESSION['drink'] ?? 'None'; ?></p>
<a href="category1.php">Start again</a>
</body>
</html>
