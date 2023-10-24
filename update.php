<?php
session_start();
require_once("db.php");

$filename_baru = $_FILES["foto_baru"]["name"];
$temp_file_baru = $_FILES["foto_baru"]["tmp_name"];
$file_ext_baru = explode(".", $filename_baru);
$file_ext_baru = end($file_ext_baru);
$file_ext_baru = strtolower($file_ext_baru);
$foto = $_POST['foto'];

if (!empty($filename_baru)) {

    $filename = $_FILES["foto"]["name"];
    $temp_file = $_FILES["foto"]["tmp_name"];
    $file_ext = explode(".", $filename);
    $file_ext = end($file_ext);
    $file_ext = strtolower($file_ext);
    $foto = $filename_baru;

    switch ($file_ext) {
        case "webp":
            move_uploaded_file($temp_file, "Food/{$filename}");
            echo "Data berhasil di upload.";
            break;
        default:
            echo "Anda hanya bisa upload file webp.";
    }

}

$sql = "UPDATE foods SET `Food Name` = ?, Category = ?, Price = ?, `Image Path` = ?, `Description` = ? WHERE id = ?";

$stmt = $db->prepare($sql);
$data = [$_POST['name'], $_POST['category'], $_POST['price'], $foto, $_POST['description'], $_POST['id']];
$stmt->execute($data);

if ($_POST['category'] == 'Main Dish') {
    header("Location: main.php");
} else if ($_POST['category'] == 'Side Dish') {
    header("Location: side.php");
} else if ($_POST['category'] == 'Soup') {
    header("Location: soup.php");
} else {
    header("Location: drink.php");
}
?>