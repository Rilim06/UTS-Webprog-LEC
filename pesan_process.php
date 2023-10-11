<?php
session_start();
require_once("db.php");

if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
    if ($_POST['pesan'] == 'add_food') {
        header("Location: food.php?error=error");
    } else {
        if ($_POST['pesan'] == 'add_drink')
            header("Location: drink.php?error=error");
    }
}

$id = $_POST['id'];
$sql = "SELECT * FROM foods WHERE id = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Insert to Database
$sql = "SELECT * FROM cart WHERE id_user = ? AND `Food Name` = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$_SESSION['id'], $row['Food Name']]);

if ($tempRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $newQty = $tempRow['Qty'] + $_POST['item_count'];
    $sql = "UPDATE cart SET Qty = ? WHERE id_user = ? AND `Food Name` = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$newQty, $_SESSION['id'], $row['Food Name']]);
} else {
    $sql = "INSERT INTO cart(`Food Name`, Category, Price, Qty, id_user)
            VALUES (?, ?, ?, ?, ?);
            WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$row['Food Name'], $row['Category'], $row['Price'], $_POST['item_count'], $_SESSION['id'], $_POST['id']]);
}

$total = $_POST['item_count'] * $row['Price'];
echo "Berhasil memesan<br />";
echo $row['Food Name'] . " x " . $_POST['item_count'] . "<br />";
echo "Total : " . $total;

echo "<br /><br />";

echo "<a href='cart.php'>Cart</a>";

echo "<br />";
if ($_POST['pesan'] == 'add_food') {
    echo "<a href='food.php'>Back</a>";
} else {
    echo "<a href='drink.php'>Back</a>";
}
?>