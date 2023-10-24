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

        .all#blur.active {
            filter: blur(20px);
            pointer-events: none;
            user-select: none;
        }

        #popup {
            position: fixed;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            padding: 50px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, .30);
            background: #fff;
            visibility: hidden;
            opacity: 0;
            transition: 0.5s;
        }

        #popup.active {
            top: 50%;
            visibility: visible;
            opacity: 1;
            transition: 0.5s;
        }

        .button {
            background: #2B2D2F;
            height: 80px;
            width: 200px;
            text-align: center;
            position: absolute;
            bottom: 0;
            transform: translateY(-50%);
            left: 0;
            right: 0;
            margin: 0 auto;
            cursor: pointer;
            border-radius: 4px;
        }

        .text {
            font: bold 1.25rem/1 poppins;
            color: #71DFBE;
            position: absolute;
            top: 50%;
            transform: translateY(-52%);
            left: 0;
            right: 0;
        }

        .progress-bar {
            position: absolute;
            height: 10px;
            width: 0;
            right: 0;
            top: 50%;
            left: 50%;
            border-radius: 200px;
            transform: translateY(-50%) translateX(-50%);
            background: #505357;
        }

        svg {
            width: 30px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%) translateX(-50%);
            left: 50%;
            right: 0;
        }

        .check {
            fill: none;
            stroke: #FFFFFF;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        #slide-cart {
            position: fixed;
            left: 150%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 100%;
            padding: 50px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
            background: #fff;
            visibility: hidden;
            opacity: 0;
            transition: left 0.5s;
            overflow-y: auto;
        }

        #slide-cart.active {
            left: 90%;
            top: 50%;
            visibility: visible;
            opacity: 1;
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

<div class='all' id='blur'>
    <div class="fixed top-2 left-0 w-full bg-gray-200 id='blur'">
        <!-- Item Menu -->
        <div class="text-center">
            <h1><b>Food Menu</b></h1>
        </div>

        <div class="feature gap-5 my-3">
            <?php
            if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
                if ($_SESSION["username"] == 'admin') {
                    ?>
                    <a href='index.php'>Back</a><br />
                    <?php
                } else {
                    ?>
                    <button onclick='toggle_cart()'>Cart</button>
                    <a href='index.php'>Back</a><br />
                    <?php
                }
            } else {
                ?>
                <button onclick='toggle_cart()'>Cart</button>
                <a href='index.php'>Back</a><br />
                <?php
            }
            ?>

            <?php
            if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
                if ($_SESSION["username"] == 'admin') {
                    ?>
                    <a href='add.php'>Add Menu</a>
                    <?php
                }
            }
            ?>

            <?php
            if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) {
                ?>
                <a href='login.php'>Login</a>
                <?php
            } else {
                ?>
                <a href='logout.php'>Logout</a>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="bg-gray-200 p-4">
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
                    <div>
                          <button onclick='showPopup()'>Choose</button>
                    </div>
                    <?php
                } else {
                    if ($_SESSION["username"] == 'admin') {
                        ?>
                        <div class='flex items-center mt-4'>
                            <form method='POST' action='edit.php'>
                                <input type='hidden' name='id' id='food-id' value=''>
                                <button type='submit' class='bg-blue-500 text-white px-2 py-1 rounded' name='edit'>Edit</button>
                            </form>
                            <form method='POST' action='delete_menu.php'>
                                <input type='hidden' name='id' id='food-id-del' value=''>
                                <button type='submit' class='bg-blue-500 text-white px-2 py-1 rounded' value='food'
                                    name='delete'>Delete</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div>
                            <button onclick='showPopup()'>Choose</button>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>

        </div>
    </div>
</div>

<div id='popup'>
    <form method='POST' action='pesan_process.php' id='cart-form'>
        <input type='hidden' name='id' id='food-id-del' value=''>
        <input type='hidden' name='id' id='food-id' value=''>
        <input type='hidden' value='add_food' name='pesan'>
        <div>
        <img id="popup-food-image" class="w-full h-auto" src="" alt="Selected Food">
        <h2 id="popup-food-name"></h2>
        <p id="popup-food-description"></p>
        <div class="price flex gap-2">
            <p id="popup-food-price"></p>
            <p>Mora</p>
        </div>
        <?php
        if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
            ?>
            Log in to pesan
            <?php
        } else {
            ?>
            
            <div>
                <button type='button' class='bg-blue-500 text-white px-2 py-1 rounded'
                    data-item='item-count-" . $foodID . "-decrement'>-</button>
                <input type='text' id='item-count-" . $foodID . "' name='item_count' value='1' readonly
                    class='w-10 text-center mx-2'>
                <button type='button' class='bg-blue-500 text-white px-2 py-1 rounded'
                    data-item='item-count-" . $foodID . "-increment'>+</button>
            </div>
            <div>
                
                <button type='submit' class='button' onclick='addFoodToCart()'>
                    <div class='text'>Add to Cart</div>
                    <div class="progress-bar"></div>
                    <svg x="0px" y="0px" viewBox="0 0 25 30" style="enable-background:new 0 0 25 30;">
                        <path class="check" class="st0" d="M2,19.2C5.9,23.6,9.4,28,9.4,28L23,2" />
                    </svg>
                </button>
            </div>
            <?php
        }
        ?>
    </form>
    <a href="#" onclick='toggle()'>Close</a>
</div>
<div id="slide-cart">
    <a href="#" onclick="toggle_cart()">Close</a>

    <h1>My Cart</h1>

    <?php
    if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
        $sql = "SELECT * FROM cart WHERE id_user = ?";

        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['id']]);

        $totalAll = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $total = $row['Price'] * $row['Qty'];
            ?>

            <p>
                <?= $row['Food Name'] ?>
            </p>
            <p>
                <?= $row['Price'] ?>
            </p>
            <p>
                <?= $row['Category'] ?>
            </p>
            <p>Harga :
                <?= $row['Price'] ?> x
                <?= $row['Qty'] ?> =
                <?= $total ?>
            </p>

            <form action='delete_cart.php' method='POST'>
                <input type='hidden' name='cart-name' value='food'></input>
                <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                <button type='submit'>Remove from cart</button>
            </form>
            <br>

            <?php
            $totalAll += $total;
        }

        $sql = "SELECT * FROM cart WHERE id_user = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['id']]);

        if ($tempRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <p>Total :
                <?= $totalAll ?>
            </p>
            <br>
            <a href='receipt.php'>Checkout</a>
            <?php
        }
    } else {
        ?>
        <p>You are not logged in, log in to view cart.</p>
        <a href='login.php'>Login</a>
        <?php
    }
    ?>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js'></script>

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

<script type='text/javascript'>

    function toggle_cart() {
        var cart = document.getElementById('slide-cart');
        if (cart.classList.contains('active')) {
            cart.style.left = '150%';

            setTimeout(function () {
                cart.classList.remove('active');
            }, 500); 
        } else {
            cart.style.left = '90%';
            setTimeout(function () {
                cart.classList.add('active');
            }, 0); 
        }
    }

</script>

<script>
    function showPopup() {
        // Get the selected food item's details
        var blur = document.getElementById('blur');
        blur.classList.toggle('active')
        var popup = document.getElementById('popup');
        popup.classList.toggle('active')

        const selectedFoodImage = document.getElementById('food-image').getAttribute('src');
        const selectedFoodName = document.getElementById('food-name').textContent;
        const selectedFoodDescription = document.getElementById('food-description').textContent;
        const selectedFoodPrice = document.getElementById('food-price').textContent;
        const selectedFoodID = document.getElementById('food-id').value;

        // Update the popup elements with the selected food details
        document.getElementById('popup-food-image').src = selectedFoodImage;
        document.getElementById('popup-food-name').textContent = selectedFoodName;
        document.getElementById('popup-food-description').textContent = selectedFoodDescription;
        document.getElementById('popup-food-price').textContent = selectedFoodPrice;
        document.getElementById('selected-food-id').value = selectedFoodID;

        // Show the popup
        toggle();
    }
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
<script type="text/javascript">
    var basicTimeline = anime.timeline({
        autoplay: false
    });

    var pathEls = $(".check");
    for (var i = 0; i < pathEls.length; i++) {
        var pathEl = pathEls[i];
        var offset = anime.setDashoffset(pathEl);
        pathEl.setAttribute("stroke-dashoffset", offset);
    }

    basicTimeline
        .add({
            targets: ".text",
            duration: 1,
            opacity: "0"
        })
        .add({
            targets: ".button",
            duration: 1300,
            height: 10,
            width: 300,
            backgroundColor: "#2B2D2F",
            border: "0",
            borderRadius: 100
        })
        .add({
            targets: ".progress-bar",
            duration: 2000,
            width: 300,
            easing: "linear"
        })
        .add({
            targets: ".button",
            width: 0,
            duration: 1
        })
        .add({
            targets: ".progress-bar",
            width: 80,
            height: 80,
            delay: 500,
            duration: 750,
            borderRadius: 80,
            backgroundColor: "#71DFBE"
        })
        .add({
            targets: pathEl,
            strokeDashoffset: [offset, 0],
            duration: 200,
            easing: "easeInOutSine"
        });

    $(".button").click(function () {
        basicTimeline.play();
    });

    $(".text").click(function () {
        basicTimeline.play();
    });
</script>

<script>
    function addFoodToCart() {
        const delayInSeconds = 5;
        event.preventDefault();
        setTimeout(function () {
            document.getElementById('cart-form').submit();
        }, delayInSeconds * 1000);
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const activeCart = urlParams.get("active");

        if (activeCart === "active") {
            // Set the class for the "food" cart as active
            document.getElementById("slide-cart").classList.add("active");
        }
    });
</script>