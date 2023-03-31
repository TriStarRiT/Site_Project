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
    <title>Podtvergdeno</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/podtvergdeno.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>

<?php
  require "header.php"
  ?>

        
    <div class="telo">
        <div class="polozenie1">
            <div class="width1">
                <div class="statys1">
                    1
                </div>
                <div class="statys2"></div>
                <div class="statys1">
                    2
                </div>
                <div class="statys2"></div>
                <div class="statys1">
                    <svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4347 26L0 14.4442L3.91232 10.1116L10.4347 17.3327L26.0858 0L30 4.33265L10.4347 26ZM3.91232 13L2.60821 14.4442L10.4347 23.1116L27.3899 4.33265L26.0858 2.88843L10.4347 20.2231L3.91232 13Z" fill="black"/>
                    </svg>                        
                </div>
            </div>
            <div class="width2">
                <div class="text">Корзина</div>
                <div class="text">Оформление заказа</div>
                <div class="text">Заказ принят</div>
            </div>
        </div>

        <div class="polozenie2">
            <div class="kryg">
                <svg width="450" height="446" viewBox="0 0 450 446" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M156.521 446L0 247.774L58.6848 173.452L156.521 297.322L391.288 0L450 74.3216L156.521 446ZM58.6848 223L39.1232 247.774L156.521 396.452L410.849 74.3216L391.288 49.5478L156.521 346.904L58.6848 223V223Z" fill="#0C9800"/>
                </svg>
            </div>
        </div>
    
    </div>
    <?php
  require "footer.php"
  ?>
</body>
</html>