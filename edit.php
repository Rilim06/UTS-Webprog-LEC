<?php
session_start();
require_once("db.php");

$sql = "SELECT * FROM foods WHERE id = ?";

$stmt = $db->prepare($sql);
$data = [$_POST['id']];
$stmt->execute($data);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row["ID"] ?>" />
    <input type="text" name="name" value="<?= $row["Food Name"] ?>" /><br />
    <input type="text" name="category" value="<?= $row["Category"] ?>" /><br />
    <input type="text" name="price" value=<?= $row["Price"] ?> /><br />
    <input type="text" name="description" value="<?= $row["Description"] ?>" /><br />
    <label>Foto Sekarang:<br /><img style="width: 10vw;" src="./Food/<?= $row["Image Path"] ?>"></label><br />
    <label>Label Baru</label><br />
    <input type="hidden" name="foto" value="<?= $row["Image Path"] ?>">
    <input type="file" name="foto_baru" id="foto" /><br />
    <input type="submit" />
</form>