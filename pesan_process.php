<?php
session_start();
require_once("db.php");

$id = $_POST['id'];
$sql = "SELECT * FROM foods WHERE id = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

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

if ($_POST['pesan'] == 'add_main') {
    header("Location: main.php");
} else if ($_POST['pesan'] == 'add_side') {
    header("Location: side.php");
} else if ($_POST['pesan'] == 'add_soup') {
    header("Location: soup.php");
} else {
    header("Location: drink.php");
}
?>