<?php
session_start();
require_once("db.php");

$sql = "DELETE FROM foods WHERE id = ?";

$stmt = $db->prepare($sql);
$data = [$_POST['id']];
$stmt->execute($data);

if ($_POST['delete'] == 'main') {
    header("Location: main.php");
} else if ($_POST['delete'] == 'side') {
    header("Location: side.php");
} else if ($_POST['delete'] == 'soup') {
    header("Location: soup.php");
} else {
    header("Location: drink.php");
}
?>