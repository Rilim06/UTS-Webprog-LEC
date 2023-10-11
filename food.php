<?php
session_start();
require_once("db.php");

$sql = "SELECT * FROM foods WHERE Category = 'food'";

$stmt = $db->prepare($sql);
$stmt->execute([]);
?>

<!-- Item Menu -->
<h1>Food Menu</h1>

<!-- Fitur mengecek apakah sudah login atau belum saat ingin pesan -->
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center w-80 mx-auto fw-bold" role="alert">
        You are not logged in, log in to pesan.
        <a href="login.php"> Login</a>
    </div>
<?php endif; ?>

<a href='cart.php'>Cart</a><br />
<a href='index.php'>Back</a><br />

<?php
if ($_SESSION["nim"] == 001) {
    echo "<a href='add.php'>Add Menu</a>";
}
?>

<h1>Daftar Menu</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Picture</th>
        <th>Price in Mora</th>
        <th>Description</th>
    </tr>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $foodID = $row['ID'];
        ?>

        <tr>
            <td>
                <?= $row["Food Name"] ?>
            </td>
            <td><img style="width: 10vw;" src="./Food/<?= $row["Image Path"] ?>"></td>
            <td>
                <?= $row["Price"] ?>
            </td>
            <td>
                <?= $row["Description"] ?>
            </td>
            <td>
                <!-- Fitur Pesan dan Edit untuk Customer dan Admin -->
                <?php
                if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
                    echo "
                        <form action='pesan_process.php' method='POST'>
                            <button type='button' class='decrement' data-item='item-count-$foodID'>-</button>
                            <input type='text' id='item-count-$foodID' name='item_count' value='1' readonly>
                            <button type='button' class='increment' data-item='item-count-$foodID'>+</button>
                            <button type='submit' value='add_food' name='pesan'>Add to cart</button>
                        </form>
                    ";
                } else {
                    if ($_SESSION["nim"] == 001) {
                        echo "
                            <form method='POST' action='edit.php'>
                                <input type='hidden' name='id' value='" . $row['ID'] . "'>
                                <button type='submit' name='edit'>Edit</button>
                            </form>
                            <form method='POST' action='delete_menu.php'>
                                <input type='hidden' name='id' value='" . $row['ID'] . "'>
                                <button type='submit' value='food' name='delete'>Delete</button>
                            </form>
                        ";
                    } else {
                        echo "
                            <form action='pesan_process.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['ID'] . "'>
                                <button type='button' class='decrement' data-item='item-count-$foodID'>-</button>
                                <input type='text' id='item-count-$foodID' name='item_count' value='1' readonly>
                                <button type='button' class='increment' data-item='item-count-$foodID'>+</button>
                                <button type='submit' value='add_food' name='pesan'>Add to cart</button>
                            </form>
                        ";
                    }
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<a href='index.php'>Back</a>

<?php
if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
    echo "<a href='login.php'>Login</a>";
} else {
    echo "<a href= 'logout.php'>Logout</a>";
}
?>

<script>
    const decrementButtons = document.querySelectorAll('.decrement');
    const incrementButtons = document.querySelectorAll('.increment');

    decrementButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const targetItemId = button.getAttribute('data-item');
            const itemCountInput = document.getElementById(targetItemId);
            const currentCount = parseInt(itemCountInput.value);
            if (currentCount > 1) {
                itemCountInput.value = (currentCount - 1).toString();
            }
        });
    });

    incrementButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const targetItemId = button.getAttribute('data-item');
            const itemCountInput = document.getElementById(targetItemId);
            const currentCount = parseInt(itemCountInput.value);
            itemCountInput.value = (currentCount + 1).toString();
        });
    });
</script>