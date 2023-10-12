<?php
session_start();
?>

<?php
if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
    if ($_SESSION["username"] == 'admin') {
        echo "
            <a href='food.php'>Food Menu</a><br />
            <a href='drink.php'>Drink Menu</a><br />
        ";
    } else {
        echo "
            <a href='food.php'>Food Menu</a><br />
            <a href='drink.php'>Drink Menu</a><br />
            <a href='cart.php'>Cart</a><br />
        ";
    }
} else {
    echo "
        <a href='food.php'>Food Menu</a><br />
        <a href='drink.php'>Drink Menu</a><br />
        <a href='cart.php'>Cart</a><br />
    ";
}
?>

<?php
if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
    echo "<a href='login.php'>Login</a>";
} else {
    echo "<a href= 'logout.php'>Logout</a>";
}
?>