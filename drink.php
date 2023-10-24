<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Drink Menu</title>
    <link rel="stylesheet" href="fooddrink\foodcss.css">
    <link rel="stylesheet" href="navbar/stylenavbar.css">
    <style>
        body {
            overflow-x: hidden;
            background-color: lightgray;
        }
    </style>
</head>
<?php
session_start();
require_once("db.php");

$sql = "SELECT * FROM foods WHERE Category = 'drink'";

$stmt = $db->prepare($sql);
$stmt->execute([]);
?>
<header id="headeraos" class="shadow-xl">
    <ul class="navbar">
        <li class="font-semibold text-[#ee3c20]  px-2 text-md xl:text-lg" id="navaos" style="--i:1;"><a href="index.php" class="active">Back</a><br /></li>
        <?php
        if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
            if ($_SESSION["username"] == 'admin') {
        ?>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main
                        Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side
                        Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='soup.php'>Soup</a><br />
                </li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a href='drink.php'>Drink</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a href='add.php'>Add
                        Menu</a><br /></li>
            <?php
            } else {
            ?>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main
                        Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side
                        Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='soup.php'>Soup</a><br />
                </li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a href='drink.php'>Drink</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:6;"><a href="about.php " class="font-semibold  px-2 text-md xl:text-lg">About Us</a></li>
            <?php
            }
        } else { ?>
            <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main
                    Dish</a><br /></li>
            <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side
                    Dish</a><br /></li>
            <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='soup.php'>Soup</a><br />
            </li>
            <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a href='drink.php'>Drink</a><br /></li>
            <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:6;"><a href="about.php " class="font-semibold  px-2 text-md xl:text-lg">About Us</a></li>
        <?php
        }
        ?>
    </ul>
    <div class="main">
        <?php
        if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) { ?>
            <a href="login.php" id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:7;"><i class="ri-user-fill"></i>Sign In</a>
            <a href="#" onclick="toggle_cart()" id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:8;"><i class="ri-shopping-cart-line"></i></a>
        <?php
        } else if ($_SESSION["username"] == 'admin') { ?>
            <a href='logout.php' id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:7;"><i class="ri-user-fill"></i>Logout</a></li>
        <?php } else { ?>
            <a href='logout.php' id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:7;"><i class="ri-user-fill"></i>Logout</a></li>
            <a href="#" onclick="toggle_cart()" id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:8;"><i class="ri-shopping-cart-line"></i></a>
        <?php
        }
        ?>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</header>
<div class='all pt-4' id='blur'>
    <div class=" p-4 h-full">
        <div class="container">
            <div class="menu-container">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 w-full h-80">
                    <?php
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $drinkID = $row['ID'];
                    ?>
                        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4 food-card">
                            <img class="w-full h-auto" src="./Food/<?= $row["Image Path"] ?>" alt="<?= $row["Food Name"] ?>" data-description="<?= $row["Description"] ?>" price="<?= $row["Price"] ?>" id="<?= $row["ID"] ?>">
                            <p class="text-center font-semibold">
                                <?= $row["Food Name"] ?>
                            </p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="detail bg-[#ebe0ce] rounded-lg p-4  shadow-6xl  text-center w-full">
                <img id="food-image" class="w-[100%] md:w-[90%] xl:w-[80%] md:pl-12 xl:pl-36 floating" src="" alt="Selected Food">
                <br />
                <div class="flex md:flex-row flex-col justify-between px-5">
                    <b>
                        <h2 id="food-name" class="text-md md:text-2xl xl:text-3xl "></h2>
                    </b>
                    <div class="price flex gap-2 text-md md:text-2xl xl:text-3xl">
                        <p id="food-price"></p>
                        <p>Mora</p>
                    </div>
                </div>
                <div class="pb-8"></div>
                <?php
                if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
                ?>
                    <div>
                        <button class='bg-[#ee3c20] lalala hover:bg-[#ebe0ce] hover:text-[#ee3c20] font-semibold text-white px-6 py-3 rounded-lg' onclick='togglePopup()'>Choose</button>
                    </div>
                    <?php
                } else {
                    if ($_SESSION["username"] == 'admin') {
                    ?>
                        <div class='flex justify-center gap-4 items-center mt-4'>
                            <form method='POST' action='edit.php'>
                                <input type='hidden' name='id' id='food-id' value=''>
                                <button type='submit' class='bg-[#ee3c20] lalala hover:bg-[#ebe0ce] hover:text-[#ee3c20] font-semibold text-white px-6 py-3 rounded-lg' name='edit'>Edit</button>
                            </form>
                            <form method='POST' action='delete_menu.php'>
                                <input type='hidden' name='id' id='food-id-del' value=''>
                                <button type='submit' class='bg-[#ee3c20] lalala hover:bg-[#ebe0ce] hover:text-[#ee3c20] font-semibold text-white px-6 py-3 rounded-lg' value='drink' name='delete'>Delete</button>
                            </form>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div>
                            <button class='bg-[#ee3c20] mr-3 lalala hover:bg-[#ebe0ce] hover:text-[#ee3c20] font-semibold text-white px-6 py-3 rounded-lg' onclick='togglePopup()'>Choose</button>
                        </div>
                <?php
                    }
                }
                ?>
                <p id="food-description" class="opacity-0"></p>
            </div>

        </div>
    </div>
</div>

<div id="slide-cart">
    <a class='card__desc' href="#" onclick="toggle_cart()">&times;</a>

    <h1 class='card__title'>My Cart</h1>
    <br />
    <?php
    if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
        $sql = "SELECT * FROM cart WHERE id_user = ?";

        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['id']]);

        $totalAll = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $total = $row['Price'] * $row['Qty'];
    ?>

            <p class='card__desc'>
                <?= $row['Food Name'] ?>
            </p>
            <p class='card__desc'>
                <?= $row['Price'] ?>
            </p>
            <p class='card__desc'>
                <?= $row['Category'] ?>
            </p>
            <p class='card__desc'>Harga :
                <?= $row['Price'] ?> x
                <?= $row['Qty'] ?> =
                <?= $total ?>
            </p>

            <form action='delete_cart.php' method='POST'>
                <input type='hidden' name='cart-name' value='drink'></input>
                <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                <button type='submit' class='bg-[#ee3c20] text-white px-2 py-1 rounded'>
                    <p>Remove from cart</p>
                </button>
            </form>

        <?php
            $totalAll += $total;
        }

        $sql = "SELECT * FROM cart WHERE id_user = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['id']]);

        if ($tempRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <p class='card__desc'>Total :
                <?= $totalAll ?>
            </p>
            <br>
            <button class=''>
                <a class='card__desc bg-[#ee3c20] text-white px-2 py-1 rounded' href='receipt.php'>Checkout</a>
            </button>
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
<div id='popup' class="mt-1">
    <form method='POST' action='pesan_process.php' id='cart-form'>
        <input type='hidden' name='id' id='food-id-del' value=''>
        <input type='hidden' name='id' id='food-id' value=''>
        <input type='hidden' value='add_drink' name='pesan'>
        <div class="whole">
            <div class="left">
                <h2 id="popup-food-name"></h2>
                <p id="popup-food-description" class="text-justify mr-6 text-sm md:text-md"></p>
                <div class="popup-price">
                    <p id="popup-food-price"></p>
                    <p>Mora</p>
                </div>
            </div>
            <div class="right">
                <img id="popup-food-image" class="" src="" alt="Selected Food">
                <?php
                if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
                ?>
                    Log in to order
                <?php
                } else {
                ?>
                    <div class="value">
                        <button type='button' class='bg-blue-500 text-white px-4 py-1 rounded' data-item='item-count-" . $foodID . "-decrement'>-</button>
                        <input type='text' id='item-count-" . $foodID . "' name='item_count' value='1' readonly class='w-10 text-center bg-transparent mx-3'>
                        <button type='button' class='bg-blue-500 text-white px-4 py-1 rounded' data-item='item-count-" . $foodID . "-increment'>+</button>
                    </div>
                    <div>
                        <button type='submit' class='button bg-[#ee3c20] rounded-xl' onclick='addFoodToCart()'>
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
            </div>
    </form>
    <div class="closing">
        <a class="closing" href="#" onclick='togglePopup()'>
            <button class="text-4xl pr-6 pt-6">&times;
                <!-- <span class="X"></span>
                <span class="Y"></span> -->
            </button>
        </a>
    </div>
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

            setTimeout(function() {
                cart.classList.remove('active');
            }, 500);
        } else {
            cart.style.left = '90%';
            setTimeout(function() {
                cart.classList.add('active');
            }, 0);
        }
    }
</script>

<script type='text/javascript'>
    function togglePopup() {
        var blur = document.getElementById('blur');
        blur.classList.toggle('active');
        var popup = document.getElementById('popup');
        popup.classList.toggle('active');

        if (popup.classList.contains('active')) {
            const selectedFoodImage = document.getElementById('food-image').getAttribute('src');
            const selectedFoodName = document.getElementById('food-name').textContent;
            const selectedFoodDescription = document.getElementById('food-description').textContent;
            const selectedFoodPrice = document.getElementById('food-price').textContent;
            const selectedFoodID = document.getElementById('food-id').value;

            document.getElementById('popup-food-image').src = selectedFoodImage;
            document.getElementById('popup-food-name').textContent = selectedFoodName;
            document.getElementById('popup-food-description').textContent = selectedFoodDescription;
            document.getElementById('popup-food-price').textContent = selectedFoodPrice;
            document.getElementById('selected-food-id').value = selectedFoodID;
        }
    }
</script>

<script>
    const foodCards = document.querySelectorAll('.food-card');
    const foodNameDisplay = document.getElementById('food-name');
    const foodDescriptionDisplay = document.getElementById('food-description');
    const foodPriceDisplay = document.getElementById('food-price');
    const drinkIDDisplay = document.getElementById('food-id');
    const drinkIDDDisplay = document.getElementById('food-id-del');
    const foodImageDisplay = document.getElementById('food-image');

    if (foodCards.length > 0) {
        const firstFoodCard = foodCards[0];
        const firstFoodImage = firstFoodCard.querySelector('img');
        const initialFoodName = firstFoodImage.getAttribute('alt');
        const initialFoodDescription = firstFoodImage.getAttribute('data-description');
        const initialPriceDescription = firstFoodImage.getAttribute('price');
        const initialdrinkID = firstFoodImage.getAttribute('id');
        const initialdrinkIDD = firstFoodImage.getAttribute('id');
        const initialImageSrc = firstFoodImage.getAttribute('src');

        foodNameDisplay.textContent = initialFoodName;
        foodDescriptionDisplay.textContent = initialFoodDescription;
        foodPriceDisplay.textContent = initialPriceDescription;
        drinkIDDisplay.value = initialdrinkID;
        drinkIDDDisplay.value = initialdrinkIDD;
        foodImageDisplay.src = initialImageSrc;

        foodCards.forEach(card => {
            card.addEventListener('click', () => {
                const foodImage = card.querySelector('img');
                const foodName = foodImage.getAttribute('alt');
                const foodDescription = foodImage.getAttribute('data-description');
                const foodPrice = foodImage.getAttribute('price');
                const drinkID = foodImage.getAttribute('id');
                const drinkIDD = foodImage.getAttribute('id');
                const imageSrc = foodImage.getAttribute('src');

                foodNameDisplay.textContent = foodName;
                foodDescriptionDisplay.textContent = foodDescription;
                foodPriceDisplay.textContent = foodPrice;
                drinkIDDisplay.value = drinkID;
                drinkIDDDisplay.value = drinkIDD;
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

    $(".button").click(function() {
        basicTimeline.play();
    });

    $(".text").click(function() {
        basicTimeline.play();
    });
</script>
<script>
    function addFoodToCart() {
        const delayInSeconds = 5;
        event.preventDefault();
        setTimeout(function() {
            document.getElementById('cart-form').submit();
        }, delayInSeconds * 1000);
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const activeCart = urlParams.get("active");

        if (activeCart === "active") {
            // Set the class for the "food" cart as active
            document.getElementById("slide-cart").classList.add("active");
        }
    });
</script>