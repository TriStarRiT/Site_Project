<?php
session_start();
require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
//alex-kashin-02@mail.ru
//


require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if(isset($_POST['action_up'])){
    //echo 'up';
    $add_to_pocket = load($add_to_pocket);
    //debug($add_to_pocket);
    $ones = R::findOne('pocket','id=?', [$add_to_pocket['id_tov']['value']])['ones'];
    $pocket = R::load('pocket', $add_to_pocket['id_tov']['value']);
    $pocket->ones = $ones+1;
    R::store($pocket);
    //debug($pocket);
}
if(isset($_POST['action_down'])){
    //echo 'down';
    $add_to_pocket = load($add_to_pocket);
    //debug($add_to_pocket);
    $ones = R::findOne('pocket','id=?', [$add_to_pocket['id_tov']['value']])['ones'];
    $pocket = R::load('pocket', $add_to_pocket['id_tov']['value']);
    if($pocket->ones!=1){
        $pocket->ones = $ones-1;
    }
    R::store($pocket);
}

if(isset($_POST['order'])){
    if($_SESSION['cost']>=300){
        header('Location: zakaz.php');
    }
}

if (!empty($_POST) && !isset($_POST['action_down']) && !isset($_POST['action_up']) && !isset($_POST['order'])) {
    $add_to_pocket = load($add_to_pocket);
    //debug($add_to_pocket);
    outo_pocket($add_to_pocket);
    //debug($add_to_pocket);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pocket.css">
    <title>Document</title>
</head>
<body>
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
                <input class="search" type="text" placeholder="Я ищу...">
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
    <nav class="color">
        <nav class="top_pocket">
            <div>
                <h1 class="bold_text">Корзина</h1>
                <p class="usual_text">Список продуктов, добавленных в козину</p>
                <nav class="main_content">
                    <?php
                    $a = R::findOne('user', 'id=?',[$_SESSION['id']])['order_id'];
                    //echo $a;
                    $data = R::getAll('SELECT * FROM pocket WHERE order_id= "'.$a.'"');
                    //echo debug($data);
                    $cost_all=0;
                    for($i=0;$i<count($data);$i++){
                        $id=$data[$i]['product_id'];
                        $ones=$data[$i]['ones'];
                        $id_m = $data[$i]['id'];

                        $pic = R::findOne('product','id=?',[$id])['picture'];
                        $name = R::findOne('product','id=?',[$id])['name'];
                        $desc = R::findOne('product','id=?',[$id])['description'];
                        $cost = R::findOne('product','id=?',[$id])['_cost'];
                        $cost_col = $cost * $ones;
                        $cost_all = $cost_all + $cost_col;
                        $_SESSION['cost'] = $cost_all;
                        echo '
                        <div class="line1"></div>   
                        <nav class="div_zac">
                        <img src="/image/prod/'.$pic.'" class="prod_pic"></img>
                        <nav style="margin-left:10px;">
                            <h3 class="usual_text">'.$name.'</h3>
                            <p class="usual_text">'.$desc.'</p>
                            <label class="usual_text">'.$cost.' ₽</label>
                            
                            <form action="" method="POST">
                            <nav style="display:grid; grid-template-columns:1fr 1fr 1fr; margin-top:100px">
                                
                            <form action="pocket.php" method="POST">
                                    <div class="list1" min="1" name="ones2" placeholder="" type="number">
                                    <label>'.$ones.'</label>
                                        <div>
                                            <input formaction="/pocket.php" name="action_up" type="submit" value="/\">
                                            <input type="hidden" name="id_tov" value="'.$id_m.'">
                                            <input formaction="/pocket.php" name="action_down" type="submit" value="\/">
                                        </div>
                                    </div>
                                </form>

                                <nav class="circle_full">
                                    <input type="image" style="margin:20px 0px 0px 20px" src="/image/pocket_dark.png">
                                </nav>
                                <form action="" method="POST">
                                <nav class="circle_full">
                                    <input type="hidden" name="id_tov" value="'.$id_m.'">
                                    <input formaction="/pocket.php" name="delete" type="image" style="margin:15px 0px 0px 20px" src="/image/trash.png">
                                </nav>
                                </form>
                            </nav>
                        </nav>
                    </nav>                        
                        ';
                    }




                    ?>
                    </nav>
            </div>
            <nav>
                <!-- navigacia -->
                <div class="mani">
                    <div class="width1">
                        <div class="statys1">
                            1
                        </div>
                        <div class="statys2 statys2_"></div>
                        <div class="statys1 statys1_">
                        2
                        </div>
                        <div class="statys2 statys2_"></div>
                        <div class="statys1 statys1_">
                        3
                        </div>
    
                    </div>
                    <div class="width2">
                        <div class="text">Корзина</div>
                        <div class="text text_">Оформление заказа</div>
                        <div class="text text_">Заказ принят</div>
                    </div>
                </div>
                <nav style="margin-top: 60px">
                    <label class="bold_text">Цена:</label>
                    <label class="bold_text cost"><?php echo $cost_all ?> ₽</label>
                </nav>
    
                <nav style="margin:20px 0px 0px 180px ">
                    <label class="usual_text">Хотите заказать эти продукты?</label>
                </nav>

                <form action="order.php" method="POST">
                <button class="big_but">
                    <nav>
                        <img style="margin:50px" src="/image/pic_zac.png">
                    </nav>
                    <nav style="margin-top:20px;">
                        <label class="bold_text">Заказать все <br> продукты из корзины</label>
                    </nav>
                    
                </button>
                <input class="big_but" type="submit" formaction="/pocket.php" name="order" value="Заказать все продукты из корзины">
                </form>
                
            </nav>
        </nav>
    </nav>
</body>
</html>