<?php
session_start();
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
//alex-kashin-02@mail.ru
//


require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if(isset($_POST['action_up'])){
    $add_to_pocket = load($add_to_pocket);
    $ones = R::findOne('pocket','id=?', [$add_to_pocket['id_tov']['value']])['ones'];
    $id_tov = R::findOne('pocket','id=?', [$add_to_pocket['id_tov']['value']])['product_id'];
    $ones_have=R::findOne('product','id=?',[$id_tov])['ones'];
    if ($ones<$ones_have){
        $pocket = R::load('pocket', $add_to_pocket['id_tov']['value']);
        $pocket->ones = $ones+1;
        R::store($pocket);
        //debug($pocket);  
    }
    else{
        echo '<script>alert("В корзине уже максимальное количество этих продуктов")</script>';
    }
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
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/pocket.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="import" href="footer.html">
    <title>Document</title>
</head>
<body>
<?php
  require "header.php"
  ?>  


    <nav class="color">
        <nav class="top_pocket">
            <div>
                <h1 class="bold_text">Корзина</h1>
                <p class="usual_text">Список продуктов, добавленных в козину</p>
                <nav class="main_content">
                    <?php
                    $a = R::findOne('user', 'id=?',[$_SESSION['id']])['order_id'];
                    if (empty($a)){
                        echo '
                        <div ">
                            <div class="line1"></div>   
                            <div style="margin-top:200px; margin-left:300px">
                                <p class="usual_text">Здесь пока ничего нет...</p>
                            </div>  
                        </div>
                        ';
                    }
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
                        $cost = R::findOne('product','id=?',[$id])['cost'];
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
                                    <label style="margin-top:12px">'.$ones.'</label>
                                        <div class="arr_div">
                                            <input formaction="/pocket.php" class="but_arr" name="action_up" type="submit" value="/\">
                                            <input type="hidden" name="id_tov" value="'.$id_m.'">
                                            <input formaction="/pocket.php" class="but_arr" name="action_down" type="submit" value="\/">
                                        </div>
                                    </div>
                            </form>

                                <nav >
                                    
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


                <form action="order.php" method="POST"><!--
                <button class="big_but">
                    <nav>
                        
                    </nav>
                    <nav style="margin-top:20px;">
                        <label class="bold_text">Заказать все <br> продукты из корзины</label>
                    </nav>
                    
                </button>-->
                <label for="but_tex" class="bold_text big_but cursor_pointer"><div><img style="margin:50px" src="/image/pic_zac.png"></div><div>Заказать все <br> продукты из корзины</div>
                <input class="but_text bold_text " type="submit" formaction="/pocket.php" name="order" id="but_tex" ></label> <!--value="Заказать все продукты из корзины"-->

                </form>

                <nav style="margin:20px 0px 0px 180px ">
                    <label class="usual_text">Заказ осуществляется от 300 рублей</label>
                </nav>
                
            </nav>
        </nav>
    </nav>

    <?php
  require "footer.php"
  ?>
    
</body>
</html>