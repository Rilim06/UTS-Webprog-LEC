<?php
$data = [
    "hans" => [
        "id" => "1",
        "image" => "./img/myson.jpg",
        "nama" => "Hans Philemon Limanza",
        "nim" => "00000070710",
        "ig" => "https://www.instagram.com/hans.pl/",
        "profile" => "@hans.pl"
    ],
    "jackson" => [
        "id" => "2",
        "image" => "./img/walaw.jpg",
        "nama" => "Jackson Lawrence",
        "nim" => "00000070612",
        "ig" => "https://www.instagram.com/jacksonciek/",
        "profile" => "@jacksonciek"
    ],
    "louis" => [
        "id" => "3",
        "image" => "./img/achoi.jpg",
        "nama" => "Louis Gabriel Hernandes",
        "nim" => "00000070250",
        "ig" => "https://www.instagram.com/lou1s.gh/",
        "profile" => "@lou1s.gh"
    ],
    "rich" => [
        "id" => "4",
        "image" => "./img/dad.jpg",
        "nama" => "Rich Marvin Lim",
        "nim" => "00000079061",
        "ig" => "https://www.instagram.com/rmarvin_/",
        "profile" => "@rmarvin_"
    ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran IF330</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <link rel="stylesheet" href="navbar/stylenavbar.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="about.css">n
    <link rel="stylesheet" type="text/css" href="section2/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="section1/section1.css" />
    <link rel="stylesheet" type="text/css" href="aos/styleaos.css" />
    <link rel="stylesheet" type="text/css" href="slider/slider.css" />
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <header id="headeraos" class="shadow-xl">
        <a href="#" class="logo font-semibold" id="logoaos"><span>IF 330 - A5</span></a>
        <ul class="navbar">
            <li class="font-semibold text-[#ee3c20]  px-2 text-md xl:text-lg" id="navaos" style="--i:1;"><a href="index.php" class="active">Home</a><br /></li>
            <?php
            if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
                if ($_SESSION["username"] == 'admin') {
            ?>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='soup.php'>Soup</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a href='drink.php'>Drink</a><br /></li>
                <?php
                } else {
                ?>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='soup.php'>Soup</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a href='drink.php'>Drink</a><br /></li>
                    <!-- <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='cart.php'>Cart</a><br /></li> -->
                <?php
                }
            } else { ?>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='soup.php'>Soup</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a href='drink.php'>Drink</a><br /></li>
                <!-- <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='cart.php'>Cart</a><br /></li> -->
            <?php
            }
            ?>
            <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:6;"><a href="about.php " class="font-semibold  px-2 text-md xl:text-lg">About Us</a></li>
        </ul>
        <div class="main">
            <?php
            if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) { ?>
                <a href="login.php" id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:7;"><i class="ri-user-fill"></i>Sign In</a>
                <!-- <a href="#" onclick="toggle_cart()" id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:8;"><i class="ri-shopping-cart-line"></i></a> -->
                <!-- <li id="navaos" ><a href='cart.php'><i class="fas icon-park-outline:shopping"></i>Cart</a><br /></li> -->
            <?php
            } else { ?>
                <a href='logout.php' id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:7;"><i class="ri-user-fill"></i>Logout</a></li>
                <!-- <a href="#" onclick="toggle_cart()" id="navaosRight" class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:8;"><i class="ri-shopping-cart-line"></i></a> -->
                <!-- <li id="navaos" style="--i:8;"><a href='cart.php'><i class="fas icon-park-outline:shopping"></i>Cart</a><br /></li> -->
            <?php }
            ?>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

        </div>
    </header>
    <div class="container">
        <div class="card__container pt-6">
            <?php foreach ($data as $key => $value) : ?>
                <article class="card__article">
                    <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['nama']; ?>" class="card__img">
                    <div class="card__data">
                        <span class="card__description">
                            <?php echo $value['nama']; ?>
                        </span>
                        <h2 class="card__title">Student ID:
                            <?php echo $value['nim']; ?>
                        </h2>
                        <a href="<?php echo $value['ig']; ?>" class="card__button" target="_blank">Instagram:
                            <?php echo $value['profile']; ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script>
        ScrollReveal({
            reset: true,
            distance: '60px',
            duration: 2500,
            delay: 150
        });
        ScrollReveal().reveal('.main-title, .section-title, .tranding-slider-control', {
            delay: 200,
            origin: 'left'
        });
        ScrollReveal().reveal('.image, .info', {
            delay: 250,
            origin: 'bottom'
        });
        ScrollReveal().reveal('.text-box', {
            delay: 300,
            origin: 'right'
        });
        ScrollReveal().reveal('.media-icons i, .swiper', {
            delay: 200,
            origin: 'bottom',
            interval: 100
        });
        ScrollReveal().reveal('.sec-02 .image, .sec-03 .image, .ourbev', {
            delay: 200,
            origin: 'top'
        });
        ScrollReveal().reveal('.media-info li', {
            delay: 200,
            origin: 'left',
            interval: 100
        });
    </script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        let menu = document.querySelector('#menu-icon');
        let navbar = document.querySelector('.navbar');

        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('open');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>