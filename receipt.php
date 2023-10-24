<head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

        body {
            font-family: "Poppins", sans-serif;
            background-color: #ebe0ce;
        }

        .card {
            position: relative;
            width: 800px;
            height: 500px;
            background: url("./img/tycard.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
            margin-top: 3%;
        }

        .card:hover {
            transform: rotate(-5deg) scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card__content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            background: url("./img/bgrcpt.png");
            background-size: cover;
            opacity: 0;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
            overflow-y: auto;
        }

        .card:hover .card__content {
            transform: translate(-50%, -50%) rotate(0deg);
            opacity: 1;
        }

        .card__title {
            font-size: 24px;
            color: #ee3c20;
            font-weight: 700;
            text-align: center;
        }

        .card__description {
            margin: 10px 0 0;
            font-size: 14px;
            color: #777;
            line-height: 1.4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card:hover svg {
            scale: 0;
            transform: rotate(-45deg);
        }

        .icon {
            width: 80%;
            margin-right: 90%;
            margin-top: 10%;
            animation: floatPaimon 4s ease-in-out infinite;
            transition: 0.5s;

        }

        .card__desc{
            color: #777;

            text-align: center;

        }

        @keyframes floatPaimon {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-35px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .front {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .back {
            text-align: center;
            margin-top: 10px;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<?php
session_start();
require_once("db.php");

$sql = "SELECT * FROM cart WHERE id_user = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$_SESSION['id']]);

$totalAll = 0;
?>
<div class="container">
    <div class="card">
        <div class='front'>
            <img class='icon' src='./img/paimonRegister.webp'>
        </div>

        <div class="card__content">
            <p class="card__title">Receipt</p>

            <p class="card__description">
                <?php
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
                ?>
            </p>
            <p class="card__title">Thankyou</p>
            <p class="card__desc">-  Ad astra abyssosque  -</p>
        </div>
    </div>
    <div class="back">
        <a href='index.php' style='text-decoration: none;'><b>Back to Home</b></a>
    </div>
</div>

<?php
$sql = "DELETE FROM cart WHERE id_user = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$_SESSION['id']]);
?>