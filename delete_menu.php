<?php
session_start();
require_once("db.php");

$sql = "DELETE FROM foods WHERE id = ?";

$stmt = $db->prepare($sql);
$data = [$_POST['id']];
$stmt->execute($data);

if ($_POST['delete'] == 'food') {
    header("Location: food.php");
} else {
    header("Location: drink.php");
}
?>