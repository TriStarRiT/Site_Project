<?php

session_start();
require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
//alex-kashin-02@mail.ru
//


require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';



if (isset($_POST['ones2'])){
    $ones1 = load($ones1);
    $mark = $ones1['ones2']['value'];
    if ($mark == "Сбросить категорию"){
        $mark = ""; 
    }
}

if (!empty($_POST) && !isset($_POST['ones2'])) {
    if (!empty($_SESSION['id'])){
        $add_to_pocket = load($add_to_pocket);
        to_pocket($add_to_pocket);
        //debug($add_to_pocket);
    }
    else {
        echo '<script>alert("Пожалуйста войдите в аккаунт или зарегестрируйтесь чтобы добавить в корзину")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/catolog.css">
    <link rel="stylesheet" href="css/categories.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>
<body>

    <header class="header_top"> 
        <nav class="header_container">
            <div>
                <img onclick="location.href='catolog.php'" class="logo_image" src="image/JjRfzsSZ5gU 1.png">
            </div>
            <div class="header_text">На главную</div>
            <div class="header_text">О нас</div>
            <div class="header_text">Контакты</div>
            <div class="header_text">Помощь</div>
            <?php
            if(($_SESSION['id'] == "") ){
                echo '
                <nav class="header_account_1">
                    <a href="sign_in.php" class="enter_but"><p class="enter_text">Вход</p></a>
                    <a href="registration.php" class="enter_but"><p class="enter_text">Регистрация</p></a>
                </nav>
                ';
            }
            else{
                echo '<a href="Lich_cab.php" class="header_account">
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
                <button type="submit" class="search_button">
                    <img class="header_account_image" src="image/search.png">
                    <div  value="Поиск" class="header_account_text" style="margin-top:8px;">Поиск</div>
                </button>
                <div onclick="location.href='pocket.php'" class="header_account">
                    <img class="header_account_image" src="image/pocket.png">
                    <label class="header_account_text" style="margin-top:13px;">Корзина</label>
                </div>
                <div class="header_account">
                    <img class="header_account_image" src="image/heart.png">
                    <label class="header_account_text">&nbsp &nbsp Мои<br>желания
                    </label>
                </div>
            </nav>
            </form>
        </div>
        </header>



    <!--

    Каталог начинается тут

    -->
    <nav style="margin-top:100px; background-color: rgba(246, 242, 233, 0.45);">
    <nav class="cat_main1">
        
        <nav class="cat_cont">
            <form name="formName" action="catolog.php" method="POST">
                <nav onclick=" " class="cat_main">
                    <nav>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </nav>
                    <div id="arrow" class="arrow_ope"></div>
                    <label class="cat_text_main">Категории</label>
                </nav>
                <nav id="ca">
                    <input type="submit" name="ones2" id="ones" value="Молочные продукты" class="cat">
                    <input type="submit" name="ones2" value="Мясо" class="cat">
                    <input type="submit" name="ones2" value="Мясные продукты" class="cat">
                    <input type="submit" name="ones2" value="Рыба" class="cat">
                    <input type="submit" name="ones2" value="Майонез и соусы" class="cat">
                    <input type="submit" name="ones2" value="Бакалея" class="cat">
                    <input type="submit" name="ones2" value="Кофе и чай" class="cat">
                    <input type="submit" name="ones2" value="Кондитерские изделия" class="cat">
                    <input type="submit" name="ones2" value="Фрукты и овощи" class="cat">
                    <input type="submit" name="ones2" value="Хлеб" class="cat">
                    <input type="submit" name="ones2" value="Замороженные продукты" class="cat">
                    <input type="submit" name="ones2" value="Консервы" class="cat">
                    <input type="submit" name="ones2" value="Кулинария" class="cat">
                    <input type="submit" name="ones2" value="Напитки" class="cat">
                    <input type="submit" name="ones2" value="Остальное" class="cat">
                    <input type="submit" name="ones2" value="Сбросить категорию" class="cat">
                </nav>
            </form>
        </nav>

        <div>
        <?php
        echo '<h1 style="margin-top:20px; color:#E9AC3C;">Выбранная категория: '.$mark.'</h1>';
        ?>
        <div class="catalog_main">
        <?php
        if (!empty($mark)){
            $data = R::getAll( 'SELECT * FROM product WHERE type_of_product="'.$mark.'"' );
        }
        else{
            if(!empty($_SESSION['search'])){
                $data = R::getAll('SELECT * FROM product WHERE name LIKE "%'.$_SESSION['search'].'%"');
            }
            else{
                $data = R::getAll( 'SELECT * FROM product' );
            }
        }
        //debug($data);
        //echo count($data);
        if (empty($data)){
            echo"<h1 style='color:#E9AC3C; margin-top:400px; margin-left:300px;'>ИЗВИНИТЕ,&nbspЗДЕСЬ&nbspПОКА&nbspНИЧЕГО&nbspНЕТ</h1>";
        }
        else{
            for($i=0;$i<count($data);$i++){
                $pic = $data[$i]['picture'];
                $name = $data[$i]['name'];
                $desc = $data[$i]['description'];
                $cost = $data[$i]['cost'];
                $id = $data[$i]['id'];
                $ones = $data[$i]['ones'];
    
                echo '
                <nav class="main_tov">
                <img src="image/prod/' . $pic . '" class="prod_pic">
    
                <div class="prod_text_div">
                    <label class="prod_text">' . $name . '  </label>
                </div>
                <div class="prod_text_div">
                    <label class="prod_desc">'.$desc.'</label>
                </div>
                <div>
                    <hr>
                </div>
                <form action="catolog.php" method="POST">
                <input type="hidden" name="id_tov" value="'.$id.'">
                <div style="display: grid; grid-template-columns: 4fr 2fr 2fr;" class="prod_text_div">
                    <label class="cost_text">' . $cost . ' ₽</label>
                    <input class="tov_icon" type="image" src="image/pocket.png">
                    <div class="ones_text_div">
                        <label class="ones_text">Осталось:</label>    
                        <label class="ones_text">&nbsp&nbsp'.$ones.' шт</label>
                    </div>
                </div>
                </form>
            </nav>';
            }
        }
        $_SESSION['search'] = "";
        ?>
        </div>
    </div>
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