<?php
session_start();
require_once("db.php");

echo "<h1>My Cart</h1>";

if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
    echo "
            You are not logged in, log in to view cart.<br />
            <a href='login.php'>Login</a><br />
    ";
} else {
    $sql = "SELECT * FROM cart WHERE id_user = ?";

    $stmt = $db->prepare($sql);
    $stmt->execute([$_SESSION['id']]);

    $totalAll = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $total = $row['Price'] * $row['Qty'];
        echo $row['Food Name'] . "<br />";
        echo $row['Price'] . "<br />";
        echo $row['Category'] . "<br />";
        echo "Harga : " . $row['Price'] . " x " . $row['Qty'] . " = " . $total . "<br />";
        echo "
            <form action='delete_cart.php' method='POST'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <button type='submit'>Remove from cart</button>
            </form>
        ";
        echo "<br />";
        $totalAll = $totalAll + $total;
    }

    $sql = "SELECT * FROM cart WHERE id_user = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_SESSION['id']]);

    if ($tempRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Total : " . $totalAll . "<br /><br />";
        echo "<a href='receipt.php'>Checkout</a><br />";
    }
}
?>
<a href='index.php'>Back</a>