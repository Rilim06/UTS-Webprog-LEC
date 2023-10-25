<?php
session_start();
require_once("db.php")
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
    <link rel="stylesheet" type="text/css" href="section2/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="section1/section1.css" />
    <link rel="stylesheet" type="text/css" href="aos/styleaos.css" />
    <link rel="stylesheet" type="text/css" href="footer/footer.css" />
    <link rel="stylesheet" type="text/css" href="slider/slider.css" />
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <header id="headeraos" class="shadow-xl">
        <a href="#" class="logo font-semibold" id="logoaos"><span>IF 330 - A5</span></a>
        <ul class="navbar">
            <li class="font-semibold text-[#ee3c20]  px-2 text-md xl:text-lg" id="navaos" style="--i:1;"><a
                    href="index.php" class="active">Home</a><br /></li>
            <?php
            if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
                if ($_SESSION["username"] == 'admin') {
                    ?>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main
                            Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side
                            Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a
                            href='soup.php'>Soup</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a
                            href='drink.php'>Drink</a><br /></li>
                    <?php
                } else {
                    ?>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main
                            Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side
                            Dish</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a
                            href='soup.php'>Soup</a><br /></li>
                    <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a
                            href='drink.php'>Drink</a><br /></li>
                    <!-- <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='cart.php'>Cart</a><br /></li> -->
                    <?php
                }
            } else { ?>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:2;"><a href='main.php'>Main
                        Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:3;"><a href='side.php'>Side
                        Dish</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a
                        href='soup.php'>Soup</a><br /></li>
                <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:5;"><a
                        href='drink.php'>Drink</a><br /></li>
                <!-- <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:4;"><a href='cart.php'>Cart</a><br /></li> -->
                <?php
            }
            ?>
            <li class="font-semibold  px-2 text-md xl:text-lg" id="navaos" style="--i:6;"><a href="about.php "
                    class="font-semibold  px-2 text-md xl:text-lg">About Us</a></li>
        </ul>
        <div class="main">
            <?php
            if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"])) { ?>
                <a href="login.php" id="navaosRight"
                    class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:7;"><i
                        class="ri-user-fill"></i>Sign In</a>
                <a href="#" onclick="toggle_cart()" id="navaosRight"
                    class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:8;"><i
                        class="ri-shopping-cart-line"></i></a>
                <!-- <li id="navaos" ><a href='cart.php'><i class="fas icon-park-outline:shopping"></i>Cart</a><br /></li> -->
                <?php
            } else { ?>
                <a href='logout.php' id="navaosRight"
                    class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:7;"><i
                        class="ri-user-fill"></i>Logout</a></li>
                <a href="#" onclick="toggle_cart()" id="navaosRight"
                    class="user font-semibold  px-2 text-md xl:text-lg text-black hover:text-[#ee3c20]" style="--i:8;"><i
                        class="ri-shopping-cart-line"></i></a>
                <!-- <li id="navaos" style="--i:8;"><a href='cart.php'><i class="fas icon-park-outline:shopping"></i>Cart</a><br /></li> -->
            <?php }
            ?>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

        </div>
    </header>

    <section class="awal1 awal w-full min-h-screen pt-20 p-70 px-10 flex items-center relative ">
        <div class="containersecidle flex flex-col">

            <div class="flex justify-between">
                <div class="home-content ml-0 md:ml-7 lg:m-8 xl:ml-16 leading-loose">
                    <h3
                        class="md:text-3xl pb-5 text-[#ee3c20] text-2xl md:pb-12 lg:text-xl xl:text-2xl lg:pb-8 xl:pb-10">
                        Ad astra abyssosque</h3>
                    <h1 class="md:text-6xl pb-3 text-4xl md:pb-3 lg:text-5xl xl:text-6xl lg:pb-1 xl:pb-2">Restoran IF330
                    </h1>
                    <h3 class="md:text-3xl  text-xl lg:text-2xl xl:text-4xl">Welcome <span
                            class="multiple-text text-[#ee3c20]"></span></h3>
                    <p class="text-justify w-[80%] leading-8">Join us at Teyvat's Table for an unforgettable dining
                        experience, where fantasy meets food, and every bite is a journey through Teyvat's enchanting
                        landscapes. </p>
                    <div class="flex mt-10 gap-4 md:gap-7 lg:gap-5 xl:gap-8    ">
                        <div id="shinycard"
                            class="cardeu omaomagod flex justify-center text-white items-center  text-sm md:text-md lg:text-lg xl:w-[170px] bg-[#ee3c20] w-[140px] h-[85px] lg:h-[90px] lg:w-[180px] md:w-[170px] md:h-[95px] xl:h-[90px] rounded-2xl bg-[#e0e0e0] ">
                            <button onclick="navigateToSection(2)">
                                <h1>Recommendations</h1>
                            </button>

                        </div>
                        <div id="shinycard"
                            class="cardeur omaomagod flex justify-center text-white items-center text-sm  md:text-md lg:text-lg xl:w-[170px] bg-[#ee3c20] w-[140px] h-[85px] lg:h-[90px] lg:w-[180px] md:w-[170px] md:h-[95px] xl:h-[90px] rounded-2xl bg-[#e0e0e0] ">
                            <button onclick="navigateToSection(3)">
                                <h1>Categories</h1>
                            </button>

                        </div>
                    </div>
                </div>
                <div class="idle md:pb-12 lg:pl-20 xl:pl-20">
                    <img src="./img/2f97a5421dcf61e13d52173e25ffaa48.gif" alt="">
                </div>
            </div>
        </div>
    </section>
    <div class="custom-shape-divider-bottom-1697999422">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="fill-[#ee3c20]"></path>
        </svg>
    </div>
    <section class="page-wrapper min-h-screen bg-[#ee3c20] pt-10 relative " id="section2">
        <div class="ourrec flex justify-center">
            <h1 class="text-3xl md:text-5xl">Our Recommendation</h1>
        </div>
        <div class="slider mt-10">
            <ul class="slider-list">
                <li class="slider-list__item slider-list__item_active">
                    <span class="back__element">
                        <img src="section2/img/back_strawberry_003.png" />
                    </span>
                    <span class="main__element">
                        <img src="section2/img/bottle_strawberry_003.png" />
                    </span>
                    <span class="front__element">
                        <img src="section2/img/front_strawberry_003.png" />
                    </span>
                    <span class="title__element">
                        <span class="title">Berry Juice</span>
                    </span>
                    <span class="more__element">
                        <span class="content">
                            <span class="headline">Sparking Berry Juice</span>
                            <span class="excerpt">An all-new non-alcoholic beverage. Valberries of varying ripeness add
                                layers of
                                sour-to-sweet to this juice while the cooling sparkling water refreshes the soul
                                a fine companion for a pleasant and leisurely time.</span>
                            <span class="link">
                                <div class="fill "></div>
                                <a href="drink.php">Open catalog</a>
                            </span>
                        </span>
                    </span>
                </li>
                <li class="slider-list__item">
                    <span class="back__element">
                        <img src="section2/img/back_apple_002.png" />
                    </span>
                    <span class="main__element">
                        <img src="section2/img/bottle_apple_002.png" />
                    </span>
                    <span class="front__element">
                        <img src="section2/img/front_apple_002.png" />
                    </span>
                    <span class="title__element">
                        <span class="title">Fonta</span>
                    </span>
                    <span class="more__element">
                        <span class="content">
                            <span class="headline">Fonta</span>
                            <span class="excerpt">A specialty drink created by the Fontaine Research Institute. It is
                                well-received by locals.
                                "Refreshing Fonta, a Font of Refreshment!"</span>
                            <span class="link">
                                <div class="fill "></div>
                                <a href="drink.php">Open catalog</a>
                            </span>
                        </span>
                    </span>
                </li>
                <li class="slider-list__item">
                    <span class="back__element">
                        <img src="section2/img/back_grapes_001.png" />

                    </span>
                    <span class="main__element">
                        <img src="section2/img/bottle_grapes_001.png" />
                    </span>
                    <span class="front__element">
                        <img src="section2/img/front_grapes_001.png" />

                    </span>
                    <span class="title__element">
                        <span class="title">Dango</span>
                    </span>
                    <span class="more__element">
                        <span class="content">
                            <span class="headline">Dango Milk</span>
                            <span class="excerpt">A creative snack made by adding sticky dango to milk. It is sweet and
                                has a dense mouthfeel. All the customers who have tried it love it.
                                Still, it is dango that's been added in — drink too much and you might lose your
                                appetite.</span>
                            <span class="link">
                                <div class="fill fill-dark"></div>
                                <a href="drink.php">Open catalog</a>
                            </span>
                        </span>
                    </span>
                </li>
            </ul>
            <div>
                <a class="nav-control"></a>
                <a class="nav-control"></a>
                <a class="nav-control"></a>
            </div>
            <div class="slider__controls">
                <a class="slider__arrow slider__arrow_prev"></a>
                <a class="slider__arrow slider__arrow_next"></a>
            </div>
        </div>
    </section>

    <section class="sec-01 min-h-screen relative bg-[#ebe0ce]" id="section3">
        <div class="custom-shape-divider-top-1697999540">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="fill-[#ee3c20]"></path>
            </svg>
        </div>
        <div class="containeraos flex items-center justify-center ">
            <div class="ourbev flex justify-center pt-40">
                <h1 class="text-3xl md:text-5xl"><a href="main.php">Main Dish</a></h1>
            </div>
            <div class="contentaos pt-10 md:ml-20 lg:ml-0 flex flex-col lg:flex-row">
                <div class="image relative ml-0 lg:ml-10 xl:ml-0">
                    <img src="./Food/Item_Barbeque_Ribs.webp" id="updownfood" style="--a:1;"
                        class="z-1 w-[95%] pl-8 md:ml-28 md:pt-20 md:w-[70%] lg:w-[75%] lg:ml-20 xl:w-[75%] xl:ml-20 xl:pt-2"
                        alt="">
                    <img src="./Food/Item_Fontainian_Foie_Gras.webp" id="updownfood" style="--a:2;"
                        class="z-2 w-[100%] pr-20 pt-20 md:pt-60 md:w-[85%] md:pr-40 lg:pt-40 lg:pr-16 lg:w-[75%] xl:w-[200%] xl:pr-52 xl:pt-32"
                        alt="">
                    <img src="./Food/Item_Adeptus_Temptation.webp" id="updownfood" style="--a:3;"
                        class="z-3 w-[95%] pt-40 pl-28 md:pt-80 md:pl-40 md:w-[90%] lg:pt-60 lg:ml-20 lg:w-[80%] xl:w-[85%] xl:pt-48 xl:ml-20"
                        alt="">
                </div>
                <div
                    class="text-box shadow-xl rounded-2xl w-[300px] md:w-[400px] font-bold ml-16 md:ml-16 lg:ml-4 mb-20">
                    <div class="textboxC"></div>
                    <img src="./img/Paimon.webp" alt="" class="w-[40%] absolute ml-60 pb-20">
                    <h1 class="text-3xl pb-8 text-[#ee3c20]">Main Dish</h1>

                    <p class="font-semibold text-justify">Savor the essence of Teyvat "Harmony of the Elements Platter,"
                        a diverse menu and delectable dish that combines flavors from across the realm in one
                        captivating culinary experience.</p>
                    <div class="contentbox">
                        <a href="main.php" class="shadow-2xl pt-10">Open catalog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-02 page-wrapper min-h-screen pt-32 tranding relative bg-[#ebe0ce]">
        <div class="ourbev flex justify-center">
            <h1 class="text-3xl md:text-5xl"><a href="drink.php">Beverages</a></h1>
        </div>
        <div class="containerSlider">
            <div class="swiper tranding-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Dango_Milk.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name ">
                                    Dango Milk
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Fonta.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Fonta
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Fruits_of_the_Festival.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Fruits of the Festival
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Fruity_Duet.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Fruity Duet
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Fruity_Smoothie.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Fruity Smoothie
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Holy_Water.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Holy Water
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Minty_Fruit_Tea.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Minty Fruit Tea
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Pure_Water.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Pure Water
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Sparkling_Berry_Juice.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Sparking Berry Juice
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Sunset_Berry_Tea.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Sunset Berry Tea
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./Food/Item_Wolfhook_Juice.webp" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <div class="tranding-slide-content-bottom">
                                <h2 class="drink_name">
                                    Wolfhook Juice
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tranding-slider-control pt-10">
                <div class="swiper-button-prev slider-arrow ">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </div>
                <div class="swiper-button-next slider-arrow ">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </div>
                <div class="swiper-pagination pt-9"></div>
            </div>
        </div>
    </section>
    <section class="sec-01 min-h-screen relative bg-[#ebe0ce]">
        <div class="containeraos flex items-center justify-center ">
            <div class="ourbev flex justify-center pt-36">
                <h1 class="text-3xl md:text-5xl text-[#]"><a href="side.php">Side Dish</a></h1>
            </div>
            <div class="contentaos  md:ml-20 lg:ml-0 flex flex-col lg:flex-row">
                <div
                    class="text-box shadow-xl rounded-2xl w-[300px] md:w-[400px] font-bold ml-16 md:ml-16 lg:ml-4 mb-20">
                    <div class="textboxC"></div>
                    <img src="./img/Paimon.webp" alt="" class="w-[40%] absolute ml-60 pb-20">
                    <h1 class="text-3xl pb-8 text-[#ee3c20]">Side Dish</h1>
                    <p class="font-semibold text-justify">Introducing our side dish that embodies the essence of
                        Teyvat's natural beauty. Crisp lotus root and fresh, seasonal vegetables harmonize with a
                        delicate dressing, bringing a touch of the divine to your meal. A refreshing, celestial delight
                        that perfectly complements your Genshin-themed culinary adventure.</p>
                    <div class="contentbox">
                        <a href="side.php" class="shadow-2xl pt-10">Open catalog</a>
                    </div>
                </div>
                <div class="image relative ml-0 lg:ml-10 xl:ml-0">
                    <img src="./Food/Item_Zhongyuan_Chop_Suey.webp" id="updownfood" style="--a:1;"
                        class="z-1 w-[95%] pl-8 md:ml-28 md:pt-10 md:w-[70%] lg:w-[75%] lg:ml-20 xl:w-[75%] xl:ml-20 xl:pt-2"
                        alt="">
                    <img src="./Food/Item_Bird_Egg_Sushi.webp" id="updownfood" style="--a:2;"
                        class="z-2 w-[100%] pr-20 pt-20 md:pt-40 md:w-[85%] md:pr-40 lg:pt-40 lg:pr-16 lg:w-[75%] xl:w-[200%] xl:pr-52 xl:pt-32"
                        alt="">
                    <img src="./Food/Item_Crab_Roe_Kourayaki.webp" id="updownfood" style="--a:3;"
                        class="z-3 w-[95%] pt-40 pl-28 md:pt-48 md:pl-40 md:w-[90%] lg:pt-60 lg:ml-16 lg:w-[90%] xl:w-[90%] xl:pt-48 xl:ml-20"
                        alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="sec-01 min-h-screen relative bg-[#ebe0ce]" id="section3">
        <div class="containeraos flex items-center justify-center ">
            <div class="ourbev flex justify-center pt-20">
                <h1 class="text-3xl md:text-5xl"><a href="soup.php">Soup</a></h1>
            </div>
            <div class="contentaos pt-10 md:ml-20 lg:ml-0 flex flex-col lg:flex-row">
                <div class="image relative ml-0 lg:ml-10 xl:ml-0">
                    <img src="./Food/Item_Bamboo_Shoot_Soup.webp" id="updownfood" style="--a:1;"
                        class="z-1 w-[95%] pl-8 md:ml-28 md:pt-20 md:w-[70%] lg:w-[75%] lg:ml-20 xl:w-[75%] xl:ml-20 xl:pt-2"
                        alt="">
                    <img src="./Food/Item_Black-Back_Perch_Stew.webp" id="updownfood" style="--a:2;"
                        class="z-2 w-[100%] pr-20 pt-20 md:pt-60 md:w-[85%] md:pr-40 lg:pt-40 lg:pr-16 lg:w-[75%] xl:w-[200%] xl:pr-52 xl:pt-32"
                        alt="">
                    <img src="./Food/Item_Jade_Fruit_Soup.webp" id="updownfood" style="--a:3;"
                        class="z-3 w-[95%] pt-40 pl-28 md:pt-80 md:pl-40 md:w-[90%] lg:pt-60 lg:ml-20 lg:w-[80%] xl:w-[85%] xl:pt-48 xl:ml-20"
                        alt="">
                </div>
                <div
                    class="text-box shadow-xl rounded-2xl w-[300px] md:w-[400px] font-bold ml-16 md:ml-16 lg:ml-4 mb-20">
                    <div class="textboxC"></div>
                    <img src="./img/Paimon.webp" alt="" class="w-[40%] absolute ml-60 pb-20">
                    <h1 class="text-3xl pb-8 text-[#ee3c20]">Soup</h1>

                    <p class="font-semibold text-justify">Savor the essence of Teyvat "Harmony of the Elements Platter,"
                        a diverse menu and delectable soup that combines flavors from across the realm in one
                        captivating culinary experience.</p>
                    <div class="contentbox">
                        <a href="soup.php" class="shadow-2xl pt-10">Open catalog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="h-[8vh] md:h-[10vh] lg:h-[15vh] xl:h-[11vh] relative bg-[#ebe0ce]">
        <div class="line relative overflow-hidden bg-cover h-[20vh] w-screen z-100">
            <div class="waveani wave1 absolute left-0 z-15"></div>
            <div class="waveani wave2 absolute left-0 z-10"></div>
            <div class="waveani wave3 absolute left-0 z-5"></div>
        </div>
    </section>
    <footer class="footer">
        <div class="containerfoot">
            <div class="rowfoot mt-32">
                <div class="footer-col">
                    <h4 class="md:text-[20px] lg:text-[24px]">Restoran IF 330</h4>
                    <ul>
                        <li><a href="#">Copyright &copy; 2023 by A5</a></li>
                        <li><a href="https://www.umn.ac.id/">Based from UMN</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="md:text-[20px] lg:text-[24px]">Recommendation</h4>
                    <ul>
                        <li><a href="drink.php">Sparking Berry Juice</a></li>
                        <li><a href="drink.php">Fonta</a></li>
                        <li><a href="drink.php">Dango Milk</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="md:text-[20px] lg:text-[24px]">Categories</h4>
                    <ul>
                        <li><a href="main.php">Main Dish</a></li>
                        <li><a href="side.php">Side Dish</a></li>
                        <li><a href="drink.php">Beverages</a></li>
                        <li><a href="soup.php">Soup</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="md:text-[20px] lg:text-[24px]">About Us</h4>
                    <ul>
                        <li><a href="about.php">Jackson Lawrence</a></li>
                        <li><a href="about.php">Hans Philemon Limanza</a></li>
                        <li><a href="about.php">Louis Gabriel Hernandes</a></li>
                        <li><a href="about.php">Rich Marvin Lim</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script>
        function navigateToSection(sectionNumber) {
            // Get the section by its ID
            const section = document.getElementById(`section${sectionNumber}`);

            if (section) {
                // Scroll to the section
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>
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
    <script>
        var TrandingSlider = new Swiper('.tranding-slider', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 2.5,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    </script>

    <script type="text/javascript">
        class Slider {
            constructor(props) {
                this.rootElement = props.element;
                this.slides = Array.from(
                    this.rootElement.querySelectorAll(".slider-list__item")
                );
                this.slidesLength = this.slides.length;
                this.current = 0;
                this.isAnimating = false;
                this.direction = 1; // -1
                this.baseAnimeSettings = {
                    rotation: 45,
                    duration: 750,
                    easing: 'easeInOutCirc'
                };
                this.baseAnimeSettingsBack = {
                    rotation: 45,
                    duration: 1850,
                    elasticity: (el, i, l) => 200 + i * 200
                };
                this.baseAnimeSettingsFront = {
                    rotation: 45,
                    duration: 2250,
                    elasticity: (el, i, l) => 200 + i * 200
                };
                this.baseAnimeSettingsTitle = {
                    rotation: 45,
                    duration: 1750,
                    elasticity: (el, i, l) => 200 + i * 200
                };

                this.navBar = this.rootElement.querySelector(".slider__nav-bar");
                this.thumbs = Array.from(this.rootElement.querySelectorAll(".nav-control"));
                this.prevButton = this.rootElement.querySelector(".slider__arrow_prev");
                this.nextButton = this.rootElement.querySelector(".slider__arrow_next");

                this.slides[this.current].classList.add("slider-list__item_active");
                this.thumbs[this.current].classList.add("nav-control_active");

                this._bindEvents();
            }

            goTo(index, dir) {
                if (this.isAnimating) return;
                let prevSlide = this.slides[this.current];
                let nextSlide = this.slides[index];

                this.isAnimating = true;
                this.current = index;
                nextSlide.classList.add("slider-list__item_active");

                anime({
                    ...this.baseAnimeSettings,
                    targets: nextSlide,
                    rotate: [90 * dir + 'deg', 0],
                    translateX: [90 * dir + '%', 0]
                });

                anime({
                    ...this.baseAnimeSettingsBack,
                    targets: nextSlide.querySelectorAll('.back__element'),
                    rotate: [90 * dir + 'deg', 0],
                    translateX: [90 * dir + '%', 0]
                });

                anime({
                    ...this.baseAnimeSettingsFront,
                    targets: nextSlide.querySelectorAll('.front__element'),
                    rotate: [90 * dir + 'deg', 0],
                    translateX: [90 * dir + '%', 0]
                });

                anime({
                    ...this.baseAnimeSettingsTitle,
                    targets: nextSlide.querySelectorAll('.title__element'),
                    rotate: [90 * dir + 'deg', 0],
                    translateX: [90 * dir + '%', 0]
                });

                anime({
                    ...this.baseAnimeSettings,
                    targets: prevSlide,
                    rotate: [0, -90 * dir + 'deg'],
                    translateX: [0, -150 * dir + '%'],
                    complete: (anim) => {
                        this.isAnimating = false;
                        prevSlide.classList.remove("slider-list__item_active");
                        this.thumbs.forEach((item, index) => {
                            const action = index === this.current ? "add" : "remove";
                            item.classList[action]("nav-control_active");
                        });
                    }
                });

                anime({
                    ...this.baseAnimeSettingsBack,
                    targets: prevSlide.querySelectorAll('.back__element'),
                    rotate: [0, -90 * dir + 'deg'],
                    translateX: [0, -150 * dir + '%']
                });

                anime({
                    ...this.baseAnimeSettingsFront,
                    targets: prevSlide.querySelectorAll('.front__element'),
                    rotate: [0, -90 * dir + 'deg'],
                    translateX: [0, -150 * dir + '%']
                });

                anime({
                    ...this.baseAnimeSettingsTitle,
                    targets: prevSlide.querySelectorAll('.title__element'),
                    rotate: [0, -90 * dir + 'deg'],
                    translateX: [0, -150 * dir + '%']
                });
            }

            goStep(dir) {
                let index = this.current + dir;
                let len = this.slidesLength;
                let currentIndex = (index + len) % len;
                this.goTo(currentIndex, dir);
            }

            goNext() {
                this.goStep(1);
            }

            goPrev() {
                this.goStep(-1);
            }

            _navClickHandler(e) {
                if (this.isAnimating) return;
                let target = e.target.closest(".nav-control");
                if (!target) return;
                let index = this.thumbs.indexOf(target);
                if (index === this.current) return;
                let direction = index > this.current ? 1 : -1;
                this.goTo(index, direction);
            }

            _bindEvents() {
                ["goNext", "goPrev", "_navClickHandler"].forEach((method) => {
                    this[method] = this[method].bind(this);
                });
                this.nextButton.addEventListener("click", this.goNext);
                this.prevButton.addEventListener("click", this.goPrev);
                this.navBar.addEventListener("click", this._navClickHandler);
            }
        }

        let slider = new Slider({
            element: document.querySelector(".slider")
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
    <script type="text/javascript">
        let menu = document.querySelector('#menu-icon');
        let navbar = document.querySelector('.navbar');

        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('open');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script type="text/javascript">
        var typed = new Typed(".multiple-text", {
            strings: ["Traveler", "to Teyvat's Table: A Gourmet Adventure!"],
            typeSpeed: 100,
            backSpeed: 100,
            backDelay: 1000,
            loop: true
        })
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>