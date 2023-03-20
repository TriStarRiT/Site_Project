<?php
session_start();
require "libs/db.php";
require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if(isset($_POST['action'])){
    $_SESSION['id'] = '';
    header('Location: catolog.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Lich_cab.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Document</title>
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

<!-- Личный кабинет начинается здесь-->
<nav class="main_content_nav">
        <label class="bold_text">Личный кабинет</label>
        <nav class="pre_main_content_nav top">
            <label class="usual_text">Личные данные</label>
            <nav class="top">
                <label class="proz">Фамилия</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['second_name'];
                            ?>
                        </label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Имя</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['first_name'];
                            ?>
                        </label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Отчество</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['fathers_name'];
                            ?>
                        </label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Адрес электронной почты</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['email'];
                            ?>
                        </label>
                    </div>
                    <div class="but_change">
                        <label class="info"></label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Пароль</label>
                <div class="stroc">
                    <div>
                        <label class="info">************</label>
                    </div>
                    <div class="but_change">
                        <a href="vosstanovlenie.php" class="info">Изменить</a>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Телефон</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['telephone'];
                            ?>
                        </label>
                    </div>
                    <div class="but_change">
                        <label class="info"></label>
                    </div>
                </div>
            </nav>

            <!--
            <nav class="top">
                <div>
                    <label class="info"></label>
                </div>
                <div class="stroc">
                    <label class="info"></label>
                </div>
            </nav>
            

            <nav class="top">
                <label class="proz">Адрес достаки на дом</label>
                <div class="stroc">
                    <div>
                        <label class="info"></label>
                    </div>
                    <div class="but_change">
                        <label class="info">Изменить</label>
                    </div>
                </div>
            </nav>
-->

            
            <form style="width:100%" action="Lich_cab.php" method="POST" >
                <input class="but_exit" type="submit" name="action" value='Выйти из аккаунта'>
            </form>
            <br><br>

        </nav>
    </nav>

    <footer>
        <div class="adaptivno">
            <div>

            </div>
            <div class="icona">
                <a href="glavnaia.html"><img src="/image/footerapple.png" alt="FOODD icon"></a>
                <div class="foot1">© FOODD, 2023</div>
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