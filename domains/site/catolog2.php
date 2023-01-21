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
    echo $mark;
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
    <title>Document</title>
</head>
<body>
    <form>
        <nav class="header_top"> 
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
            <nav class="header_container_lower">
                
                <div class="text-field">
                    <input class="search" name="id_tov" type="text" placeholder="Я ищу...">
                </div>
                <button class="search_button">
                    <img class="header_account_image" src="image/search.png">
                    <label class="header_account_text" style="margin-top:8px;">Поиск</label>
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
        </nav>
    </form>

    <script src="categories.js">
        </script>

    <!--

    Каталог начинается тут

    -->
    <nav class="main_categories">
    <nav class="cat_osn">
        <p class="cat_text_main">Категории</p>
        <div class="line"></div>
        <div class="cat_cont">
            <div class="cat_cont_div">
                <input type="radio" id="dewey1" name="payment" value="картой" class="zakaz5">
                <label class="cat_text" for="dewey1">Картой курьеру</label>
            </div>
            <div class="cat_cont_div">
                <input type="radio" id="dewey1" name="payment" value="картой" class="zakaz5">
                <label for="dewey1">Картой курьеру</label>
            </div>
            

        </div>
    </nav>
    <!--    
    <form name="formName" action="catolog.php" method="POST">
        
        
        <nav class="cat_main1">
            <nav onclick=" " class="cat_main">
                <nav>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </nav>
                <div id="arrow" class="arrow_open"></div>
                <label class="cat_text_main">Категории</label>
            </nav>
            <nav id="ca">
                <input type="submit" name="ones2" id="ones" value="Молочные продукты" class="cat">
                <input type="submit" name="ones2" value="Мясо" class="cat">
                <input type="submit" name="ones2" value="Птица" class="cat">
                <input type="submit" name="ones2" value="Яйцо" class="cat">
                <input type="submit" name="ones2" value="Мясные продукты" class="cat">
                <input type="submit" name="ones2" value="Рыба" class="cat">
                <input type="submit" name="ones2" value="Майонез и соусы" class="cat">
                <input type="submit" name="ones2" value="Бакалея" class="cat">
                <input type="submit" name="ones2" value="Кофе и чай" class="cat">
                <input type="submit" name="ones2" value="Кондитерские изделия" class="cat">
                <input type="submit" name="ones2" value="Фрукты, овощи" class="cat">
                <input type="submit" name="ones2" value="Хлеб" class="cat">
                <input type="submit" name="ones2" value="Замороженные продукты" class="cat">
                <input type="submit" name="ones2" value="Консервы" class="cat">
                <input type="submit" name="ones2" value="Кулинария" class="cat">
                <input type="submit" name="ones2" value="Напитки" class="cat">
            </nav>
            </form>
        </nav>
            -->

    <div class="catalog_main">
    <?php
    //if (isset($mark))
    $data = R::getAll( 'SELECT * FROM product' );
    //debug($data);
    //echo count($data);
    
    for($i=0;$i<count($data);$i++){
        $pic = $data[$i]['picture'];
        $name = $data[$i]['name'];
        $desc = $data[$i]['description'];
        $cost = $data[$i]['_cost'];
        $id = $data[$i]['id'];

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
            <input class="tov_icon" name="add" type="image" src="image/pocket.png">
            <input class="tov_icon" type="image" src="image/heart.png">
        </div>
        </form>
    </nav>';
    }
    ?>
    </div>
    </nav>
</body>
</html>