<?php
session_start();
require_once("db.php");

echo "<h1>Receipt</h1>";
echo "<h1>Thankyou for ordering</h1>";

$sql = "SELECT * FROM cart WHERE id_user = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$_SESSION['id']]);

$totalAll = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $total = $row['Price'] * $row['Qty'];
    echo $row['Food Name'] . "          ";
    echo $row['Qty'] . " x " . $row['Price'] . " = " . $total . "<br />";
    $totalAll = $totalAll + $total;
    echo "<br />";
}
$tax = $totalAll * 0.1;
echo "Tax 10% : " . $tax . "<br />";
echo "Total : " . $totalAll + $tax . "<br /><br />";

$sql = "DELETE FROM cart WHERE id_user = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$_SESSION['id']]);

?>

<a href='index.php'>Back to Home</a>