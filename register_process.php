<?php
require_once("db.php");

$nim = $_POST["nim"];
$password = $_POST["password"];
$en_pass = password_hash($password, PASSWORD_BCRYPT);

$sql = "SELECT * FROM mahasiswa_login WHERE nim = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$nim]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($nim == $row["nim"]) {
        header("Location: register.php?error=error");
        exit;
} else {
        $sql = "INSERT INTO mahasiswa_login (nim, password) 
        VALUES (?, ?)";

        $stmt = $db->prepare($sql);
        $data = [$nim, $en_pass];
        $stmt->execute($data);

        header("Location: login.php");
}