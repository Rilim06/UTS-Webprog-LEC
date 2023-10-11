<?php
session_start();
require_once("db.php");

$sql = "DELETE FROM cart WHERE id = ?";

$stmt = $db->prepare($sql);
$data = [$_POST['id']];
$stmt->execute($data);

header("Location: cart.php");