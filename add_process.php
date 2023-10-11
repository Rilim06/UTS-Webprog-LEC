<?php
session_start();
require_once("db.php");

$filename = $_FILES["foto"]["name"];
$temp_file = $_FILES["foto"]["tmp_name"];
$file_ext = explode(".", $filename);
$file_ext = end($file_ext);
$file_ext = strtolower($file_ext);
$foto = $filename;

switch ($file_ext) {
    case "webp":
        move_uploaded_file($temp_file, "Food/{$filename}");
        echo "Data berhasil di upload.";
        break;
    default:
        echo "Anda hanya bisa upload file webp.";
}

$sql = "INSERT INTO foods(`Food Name`, Category, Price, `Image Path`, `Description`)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);
$data = [$_POST['name'], $_POST['category'], $_POST['price'], $foto, $_POST['description']];
$stmt->execute($data);

if ($_POST['category'] == 'Food') {
    header("Location: food.php");
} else {
    header("Location: drink.php");
}
?>