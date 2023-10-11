<?php
session_start();
?>

<a href='food.php'>Food Menu</a><br />
<a href='drink.php'>Drink Menu</a><br />
<a href='cart.php'>Cart</a><br />

<?php
if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
    echo "<a href='login.php'>Login</a>";
} else {
    echo "<a href= 'logout.php'>Logout</a>";
}
?>