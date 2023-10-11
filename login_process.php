<?php
session_start();
require_once("db.php");

$nim = $_POST["nim"];
$password = $_POST["password"];

$sql = "SELECT * FROM mahasiswa_login WHERE nim = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$nim]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($password, $row["password"])) {
    header("Location: login.php?error=error");
    exit;
} else {
    $_SESSION["id"] = $row["id"];
    $_SESSION["nim"] = $row["nim"];
    $_SESSION["nama"] = $row["nama"];
    header("Location: index.php");
}