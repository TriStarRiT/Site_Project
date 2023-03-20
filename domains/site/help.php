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
    <title>Help</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/help.css">
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
        <div class="help1">
            <span class="help1_1">Здравствуйте,</span>
            <br><span>Чем мы можем вам помочь?</span>
        </div>
        <div class="help2">
            <div class="help2_1">Инструкции</div>
            <div class="help2_2">
                <div>
                    <ul>
                        <li><a href="help1.html#3" class="a_help">Как сделать заказ?</a></li>
                        <li><a href="help1.html#4" class="a_help">Могут ли заказывать юридические лица?</a></li>
                        <li><a href="help1.html#5" class="a_help">Как узнать о наличии продуктов?</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a href="help1.html#7" class="a_help">Как перенести или отменить заказ?</a></li>
                        <li><a href="help1.html#8" class="a_help">Что происходит с моим заказом?</a></li>
                        <li><a href="help1.html#9" class="a_help">Почему мне заменили товар?</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a href="help1.html#10" class="a_help">Как узнать, где сейчас мой заказ?</a></li>
                        <li><a href="help1.html#11" class="a_help">Как вернуть товар?</a></li>
                        <li><a href="help1.html#2" class="a_help">Доставляете ли вы по моему адресу?</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="help2">
            <div class="help2_1">
                <div>Часто задаваемые вопросы</div>
            </div>
            <div class="help2_2 help3_2">
                <div><a href="help1.html#2" class="a_help">Доставка</a></div>
                <div><a href="help1.html#9" class="a_help">Проблемы с товаром</a></div>
                <div><a href="help1.html#11" class="a_help">Возврат</a></div>
                <div><a href="help1.html#6" class="a_help">Заказ и оплата</a></div>
                <div><a href="help1.html#12" class="a_help">Профиль</a></div>
            </div>
        </div>
        <div  class="help1 help4">
            <span class="help1_1">Остались вопросы?</span>
            <br><span>Свяжитесь с нами для решения вашей проблемы</span>
        </div>
        <div id="social" class="help2 help5">
            <div class="help2_1 help5_1">Связаться с нами</div>
            <div class="help2_2">
                <a href="#"><img src="/image/inst.svg" alt="inst"></a>
                <a href="#"><img src="/image/vk.svg" alt="vk"></a>
                <a href="#"><img src="/image/facebook.svg" alt="facebook"></a>
                <a href="#"><img src="/image/ok.svg" alt="ok"></a>
                <a href="mailto:foodd@yandex.ru" class="a_help a_help1">foodd@yandex.ru</a>
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