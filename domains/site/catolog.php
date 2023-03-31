<?php

session_start();
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
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/catolog.css">
    <link rel="stylesheet" href="css/categories.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Document</title>
</head>
<body>

<?php
  require "header.php"
  ?>



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

    <?php
  require "footer.php"
  ?>
</body>
</html>