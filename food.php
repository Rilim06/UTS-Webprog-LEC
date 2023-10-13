<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Food Menu</title>
    <style>
        .food-card {
            transition: transform 0.2s;
        }

        .food-card:hover {
            transform: scale(1.05);
        }

        .container {
            display: flex;
            justify-content: center;
            margin-top: 80px;
        }

        .menu-container {
            display: flex;
            overflow-x: auto;
            max-width: 100%;
            padding: 0 16px;
            overflow-y: auto;
            height: 80vh;
        }


        .detail {
            width: 30%;
            padding: 16px;
            margin-left: 15px;
            height: 80vh;
            overflow-y: auto;
        }

        .feature {
            display: flex;
            justify-content: center;
        }

        .price {
            justify-content: center;
        }
    </style>
</head>
<?php
session_start();
require_once("db.php");

$sql = "SELECT * FROM foods WHERE Category = 'food'";

$stmt = $db->prepare($sql);
$stmt->execute([]);
?>

<div class="fixed top-2 left-0 w-full bg-gray-200">
    <!-- Item Menu -->
    <div class="text-center">
        <h1><b>Food Menu</b></h1>
    </div>

    <!-- Fitur mengecek apakah sudah login atau belum saat ingin pesan -->
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center w-80 mx-auto fw-bold" role="alert">
            You are not logged in, log in to pesan.
            <a href="login.php"> Login</a>
        </div>
    <?php endif; ?>

    <div class="feature gap-5 my-3">
        <?php
        if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
            if ($_SESSION["username"] == 'admin') {
                echo "
                    <a href='index.php'>Back</a><br />
                ";
            } else {
                echo "
                    <a href='cart.php'>Cart</a><br />
                    <a href='index.php'>Back</a><br />
                ";
            }
        } else {
            echo "
                <a href='cart.php'>Cart</a><br />
                <a href='index.php'>Back</a><br />
            ";
        }
        ?>

        <?php
        if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
            if ($_SESSION["username"] == 'admin') {
                echo "<a href='add.php'>Add Menu</a>";
            }
        }
        ?>

        <?php
        if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
            echo "<a href='login.php'>Login</a>";
        } else {
            echo "<a href= 'logout.php'>Logout</a>";
        }
        ?>
    </div>
</div>

<body class="bg-gray-200 p-4">
    <div class="container">
        <div class="menu-container">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 w-full h-80">
                <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $foodID = $row['ID'];
                    ?>
                    <div class="bg-white rounded-lg p-4 shadow-lg food-card">
                        <img class="w-full h-auto" src="./Food/<?= $row["Image Path"] ?>" alt="<?= $row["Food Name"] ?>"
                            data-description="<?= $row["Description"] ?>" price="<?= $row["Price"] ?>"
                            id="<?= $row["ID"] ?>">
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
        <div class="detail bg-white rounded-lg p-4 shadow-lg text-center">
            <img id="food-image" class="w-full h-auto" src="" alt="Selected Food">
            <br />
            <b>
                <h2 id="food-name"></h2>
            </b>
            <br />
            <p id="food-description"></p>
            <br />
            <div class="price flex gap-2">
                <p id="food-price"></p>
                <p>Mora</p>
            </div>

            <?php
            if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
                ?>
                <div class="flex items-center mt-4">
                    <form method='POST' action='pesan_process.php'>
                        <input type='hidden' name='id' id='food-id-del' value=''>
                        <input type='hidden' name='id' id='food-id' value=''>
                        <button type='button' class='bg-blue-500 text-white px-2 py-1 rounded'
                            data-item='item-count-" . $foodID . "-decrement'>-</button>
                        <input type='text' id='item-count-" . $foodID . "' name='item_count' value='1' readonly
                            class='w-10 text-center mx-2'>
                        <button type='button' class='bg-blue-500 text-white px-2 py-1 rounded'
                            data-item='item-count-" . $foodID . "-increment'>+</button>
                        <button type='submit' value='add_food' name='pesan'
                            class='ml-auto mt-2 bg-green-500 text-white px-4 py-2 rounded'>Add to Cart</button>
                    </form>
                </div>
                <?php
            } else {
                if ($_SESSION["username"] == 'admin') {
                    echo "
                        <div class='flex items-center mt-4'>
                            <form method='POST' action='edit.php'>
                                <input type='hidden' name='id' id='food-id' value=''>
                                <button type='submit' class='bg-blue-500 text-white px-2 py-1 rounded' name='edit'>Edit</button>
                            </form>
                            <form method='POST' action='delete_menu.php'>
                                <input type='hidden' name='id' id='food-id-del' value=''>
                                <button type='submit' class='bg-blue-500 text-white px-2 py-1 rounded' value='food' name='delete'>Delete</button>
                            </form>
                        </div>
                    ";
                } else {
                    echo "
                        <div class='flex items-center mt-4'>
                            <form method='POST' action='pesan_process.php'>
                            <input type='hidden' name='id' id='food-id-del' value=''>
                                <input type='hidden' name='id' id='food-id' value=''>
                                <button type='button' class='bg-blue-500 text-white px-2 py-1 rounded' data-item='item-count-" . $foodID . "-decrement'>-</button>
                                <input type='text' id='item-count-" . $foodID . "' name='item_count' value='1' readonly class='w-10 text-center mx-2'>
                                <button type='button' class='bg-blue-500 text-white px-2 py-1 rounded' data-item='item-count-" . $foodID . "-increment'>+</button>
                                <button type='submit' value='add_food' name='pesan' class='ml-auto mt-2 bg-green-500 text-white px-4 py-2 rounded'>Add to Cart</button>
                            </form>
                        </div>
                    ";
                }
            }
            ?>
        </div>

    </div>
</body>

<script>
    const decrementButtons = document.querySelectorAll('[data-item$="-decrement"]');
    const incrementButtons = document.querySelectorAll('[data-item$="-increment"]');

    decrementButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const targetItemId = button.getAttribute('data-item').replace('-decrement', '');
            const itemCountInput = document.getElementById(targetItemId);
            const currentCount = parseInt(itemCountInput.value);
            if (currentCount > 1) {
                itemCountInput.value = (currentCount - 1).toString();
            }
        });
    });

    incrementButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const targetItemId = button.getAttribute('data-item').replace('-increment', '');
            const itemCountInput = document.getElementById(targetItemId);
            const currentCount = parseInt(itemCountInput.value);
            itemCountInput.value = (currentCount + 1).toString();
        });
    });
</script>

<script>
    const foodImages = document.querySelectorAll('.food-card img');
    const foodNameDisplay = document.getElementById('food-name');
    const foodDescriptionDisplay = document.getElementById('food-description');
    const foodPriceDisplay = document.getElementById('food-price');
    const foodIDDisplay = document.getElementById('food-id');
    const foodIDDDisplay = document.getElementById('food-id-del');
    const foodImageDisplay = document.getElementById('food-image');

    if (foodImages.length > 0) {
        const firstFoodImage = foodImages[0];
        const initialFoodName = firstFoodImage.getAttribute('alt');
        const initialFoodDescription = firstFoodImage.getAttribute('data-description');
        const initialPriceDescription = firstFoodImage.getAttribute('price');
        const initialFoodID = firstFoodImage.getAttribute('id');
        const initialFoodIDD = firstFoodImage.getAttribute('id');
        const initialImageSrc = firstFoodImage.getAttribute('src');

        foodNameDisplay.textContent = initialFoodName;
        foodDescriptionDisplay.textContent = initialFoodDescription;
        foodPriceDisplay.textContent = initialPriceDescription;
        foodIDDisplay.value = initialFoodID;
        foodIDDDisplay.value = initialFoodIDD;
        foodImageDisplay.src = initialImageSrc;

        foodImages.forEach(image => {
            image.addEventListener('click', () => {
                const foodName = image.getAttribute('alt');
                const foodDescription = image.getAttribute('data-description');
                const foodPrice = image.getAttribute('price');
                const foodID = image.getAttribute('id');
                const foodIDD = image.getAttribute('id');
                const imageSrc = image.getAttribute('src');

                foodNameDisplay.textContent = foodName;
                foodDescriptionDisplay.textContent = foodDescription;
                foodPriceDisplay.textContent = foodPrice;
                foodIDDisplay.value = foodID;
                foodIDDDisplay.value = foodIDD;
                foodImageDisplay.src = imageSrc;
            });
        });
    }

</script>