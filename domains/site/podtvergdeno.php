<?php
session_start();
require "libs/db.php";
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

<header class="header_top"> 
        <nav class="header_container">
            <div>
                <img onclick="location.href='glavnaia.php'" class="logo_image cursor_pointer" src="image/JjRfzsSZ5gU 1.png">
            </div>
            <div class="header_text"><a href="glavnaia.php" class="cursor_pointer header_text1">На главную</a></div>
            <div class="header_text"><a href="catolog.php" class="cursor_pointer header_text1">Каталог</a></div>
            <div class="header_text"><a href="aboutus.php" class="cursor_pointer header_text1">О нас</a></div>
            <div class="header_text"><a href="help.php" class="cursor_pointer header_text1">Помощь</a></div>
            <?php
            if(($_SESSION['id'] == "") ){
                echo '
                <nav class="header_account_1">
                    <a href="sign_in.php" class="enter_but cursor_pointer"><p class="enter_text">Вход</p></a>
                    <a href="registration.php" class="enter_but cursor_pointer"><p class="enter_text">Регистрация</p></a>
                </nav>
                ';
            }
            else{
                echo'<a href="Lich_cab.php" class="header_account header_account_2 hov_but">
                <image class="header_account_image" src="image/Vector.png"></image>
                <div class="header_account_text">Личный кабинет</div>
                </a>';

            }

            ?>
        </nav>
        <div>
            <form action="search.php" method="post">
            <nav class="header_container_lower">
                <div class="text-field">
                    <input class="search" name="search" type="text" placeholder="Я ищу...">
                </div>
                <button type="submit" class="search_button cursor_pointer centre hov_but">
                    <img class="header_account_image" src="image/search.png">
                    <div  value="Поиск" class="header_account_text cursor_pointer">Поиск</div>
                </button>
                <?php
                $perm=R::findOne('user', 'id=?',[$_SESSION['id']])['permission'];
                switch($perm){
                    case "user":
                        echo '<a href="pocket.php" class="header_account cursor_pointer hov_but">
                        <img class="header_account_image" src="image/pocket.png">
                        <label class="header_account_text cursor_pointer" >Корзина</label>
                    </a>';
                        break;
                    case "admin":
                        echo '<a href="add_tovar.php" class="header_account header_account_2 hov_but add_tov_but">
                        <img class="header_account_image" src="image/pocket.png">
                        <label class="header_account_text cursor_pointer" >Добавить &#160&#160товар</label>
                        </a>';
                        break;
                    }
                ?>
            </nav>
            </form>
        </div>
        </header>
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
    <footer>
        <div class="adaptivno">
            <div>

            </div>
            <div class="icona">
                <a href="glavnaia.php"><img src="/image/footerapple.png" alt="FOODD icon"></a>
                <div class="foot1">© foodd, 2023</div>
            </div>
            <div>
                <div class="foot2">Помощь</div>
                <a href="help1.html" class="foot3">Инструкции и советы</a>
                <br><a href="help1.html#12" class="foot3">Написать в поддержку</a>
                <!--<br><a href="#" class="foot3">Правовые документы</a>-->
            </div>
            <div>
                <div class="foot2">Партнерство</div>
                <a href="help1.html#4" class="foot3">FOODD для бизнеса</a>
                <br><a href="mailto:foodd.bisness@yandex.ru" class="foot3">foodd.bisness@yandex.ru</a>
            </div>
            <div>
                <div class="foot2">FOODD в соц сетях</div>
                <a href="#" class="foot3">ВКонтакте</a>
                <br><a href="#" class="foot3">Instagram</a>
                <br><a href="#" class="foot3">Facebook</a>
                <br><a href="#" class="foot3">Одноклассники</a>
            </div>
            <div>
                <div class="foot2">Для СМИ</div>
                <a href="mailto:foodd@yandex.ru" class="foot3">foodd@yandex.ru</a>
            </div>
            <div>
                <div class="foot2">Правообладателям</div>
                <a href="#" class="foot3">О  предъявлении претензий</a>
            </div>
        </div>
        
    </footer>
</body>
</html>