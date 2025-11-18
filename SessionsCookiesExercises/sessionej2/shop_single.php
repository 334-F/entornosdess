<?php
session_start();
$step = $_GET['step'] ?? 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($step == 1) $_SESSION['fruit'] = $_POST['fruit'];
    if ($step == 2) $_SESSION['drink'] = $_POST['drink'];
    $step++;
}
?>
<!DOCTYPE html>
<html>
<body>
<?php if ($step == 1): ?>
  <h2>Select a fruit</h2>
  <form method="post" action="?step=1">
    <select name="fruit">
      <option>Apple</option>
      <option>Banana</option>
      <option>Orange</option>
    </select>
    <input type="submit" value="Next">
  </form>

<?php elseif ($step == 2): ?>
  <h2>Select a drink</h2>
  <form method="post" action="?step=2">
    <select name="drink">
      <option>Water</option>
      <option>Juice</option>
      <option>Soda</option>
    </select>
    <input type="submit" value="Finish">
  </form>

<?php else: ?>
  <h2>Summary</h2>
  <p>Fruit: <?= $_SESSION['fruit'] ?></p>
  <p>Drink: <?= $_SESSION['drink'] ?></p>
  <a href="?step=1">Start again</a>
<?php endif; ?>
</body>
</html>
