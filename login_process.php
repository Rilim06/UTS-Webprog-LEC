<?php
session_start();
require_once("db.php");

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: login.php?error=empty");
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($password, $row["password"])) {
    header("Location: login.php?error=error");
} else {
    $_SESSION["id"] = $row["id"];
    $_SESSION["username"] = $row["username"];
    header("Location: index.php");
}