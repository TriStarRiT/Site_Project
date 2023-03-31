<?php
session_start();

require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>

<?php
  require "header.php"
  ?>

    <div class="telo">
        <div class="about1">
        <div class="about1_5">
            Тратьте
            <br>свое время
            <br>с пользой
        </div>
        </div>
        <div class="about2">
            Тратьте своё время на то что действительно важно,
            <br>а мы сходим за вас в магазин
        </div>
        <div class="about3">
            Мы доставляем продукты и товары во всему Кирову и его пригороду. Ассортимент в FOODD такой же, как в магазинах, но вам не придётся стоять в очереди и носить тяжёлые сумки. Мы бережно собираем и быстро доставляем продукты и другие товары прямо до двери
        </div>
    </div>
    <?php
  require "footer.php"
  ?>
</body>
</html>