<?php
session_start();
require_once("db.php");

$sql = "DELETE FROM cart WHERE id = ?";

$stmt = $db->prepare($sql);
$data = [$_POST['id']];
$stmt->execute($data);

if ($_POST['cart-name'] == 'main') {
    header("Location: main.php?active=active");
} else if ($_POST['cart-name'] == 'side') {
    header("Location: side.php?active=active");
} else if ($_POST['cart-name'] == 'soup') {
    header("Location: soup.php?active=active");
} else {
    header("Location: drink.php?active=active");
}
