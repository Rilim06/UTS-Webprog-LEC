<?php
require_once("db.php");

$password = $_POST["password"];
$en_pass = password_hash($password, PASSWORD_BCRYPT);

$sql = "SELECT * FROM user WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$_POST['username']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row && $_POST['username'] == $row["username"]) {
        $_SESSION['signup_mode'] = true;
        header("Location: login.php?error=error");
} else {
        $sql = "INSERT INTO user (first_name, last_name, username, password, tanggal_lahir, jenis_kelamin) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $db->prepare($sql);
        $stmt->execute([$_POST['first'], $_POST['last'], $_POST['username'], $en_pass, $_POST['tanggal'], $_POST['gender']]);

        unset($_SESSION['signup_mode']);

        header("Location: login.php");
}