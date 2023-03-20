<?php
session_start();
require "libs/db.php";
require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if(isset($_POST['start'])){
    $add_to_pocket= load($add_to_pocket);
    $_SESSION['order'] = $add_to_pocket['id_tov']['value'];
    //debug($add_to_pocket);
}

if(isset($_POST['end'])){
    $order = R::load('order',$_SESSION['order']);
    $order->stat = "Завершён";
    R::store($order);
    $_SESSION['order'] = "";

}

if(isset($_POST['exit'])){
    $_SESSION['id'] = '';
    header('Location: glavnaia.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/deliver.css">
    <title>Document</title>
</head>
<body>
    <?php
    //echo $a;
    if(empty($_SESSION['order'])){
        $data = R::getAll('SELECT * FROM dbsite.order WHERE stat= "Заказан"');
        if(empty($data)){
            echo '
            <div>
                <h1>Заказов пока нет, ожидайте...<h2>
            </div>
            ';
        }
        //echo debug($data);
        $cost_all=0;
        for($i=0;$i<count($data);$i++){
            $id = $data[$i]['id'];
            $city=$data[$i]['address_cit'];
            $street=$data[$i]['address_str'];
            $flor=$data[$i]['address_flo'];
            $cost=$data[$i]['cost'];

            echo '
            <br>
            <hr>
            <form action="deliver.php" method="POST">
            <nav class="main">
                <nav class="tabl">
                    <div class="tabl1">
                        <label>Заказ №'.$id.'</label>
                        <div></div>
                        <label>Город:'.$city.'</label>
                        <label>Этаж:'.$flor.'</label>
                        <label>Улица:'.$street.'</label>
                        <div></div>
                        <div></div>
                        <label>Цена:'.$cost.' ₽</label>
                    </div>
                    <div>
                            <input type="hidden" name="id_tov" value="'.$id.'">
                            <input name="start" class="but" type="submit" value="Принять">
                    </div>
                </nav>
            </nav>   
            </form>                   
            ';
        }
    }
    else{
        $id = $_SESSION['order'];
        $city = R::findOne('order', 'id =?',[$id] )['address_cit'];
        $street = R::findOne('order', 'id =?',[$id] )['address_str'];
        $house = R::findOne('order', 'id =?', [$id])['address_hou'];
        $flat = R::findOne('order', 'id =?', [$id])['address_fla'];
        $pod=R::findOne('order', 'id =?', [$id])['address_pod'];
        $com = R::findOne('order', 'id =?', [$id])['comment'];
        $cost = R::findOne('order', 'id =?', [$id])['cost'];
        $pay = R::findOne('order', 'id =?', [$id])['payment'];
        ;
        if(empty($pod)){
            echo '
        <div>
            <h2>Заказ №'.$_SESSION['order'].'</h2>
            <label>Адрес: Г. '.$city.', ул. '.$street.', д. '.$house.', кв. ',$flat,' </label>
            <hr>
            <label>Комментарий: '.$com.'</label>
        </div>
        ';
        }  
        else{
            echo '
        <div>
            <h2>Заказ №'.$_SESSION['order'].'</h2>
            <label>Адрес: Г. '.$city.' ул. '.$street.' д. '.$house.' кв. ',$flat,', '.$pod.' подъезд</label>
            <hr>
            <label>Комментарий: '.$com.'</label>
        </div>
        ';
        } 
        
        $data = R::getAll('SELECT * FROM pocket WHERE order_id= "'.$_SESSION['order'].'"');
        //echo debug($data);
        for ($i = 0; $i < count($data); $i++) {
            $id = $data[$i]['product_id'];
            $ones = $data[$i]['ones'];
            $id_m = $data[$i]['id'];

            $pic = R::findOne('product', 'id=?', [$id])['picture'];
            $name = R::findOne('product', 'id=?', [$id])['name'];
            $desc = R::findOne('product', 'id=?', [$id])['description'];
            $cost = R::findOne('product', 'id=?', [$id])['cost'];
            $cost_col = $cost * $ones;
            $cost_all = $cost_all + $cost_col;
            $_SESSION['cost'] = $cost_all;
            echo '
            <hr>
            <div class="main_2">
                <img src="/image/prod/'.$pic.'" class="pic">
                <div>
                    <p>'.$name.'</p>
                    <p>'.$ones.' шт.</p>
                    <br>
                    <p>'.$cost.' ₽</p>
                </div>
            </div>
            ';
        }
        
        
        echo '
        <hr>
            <p>Метод оплаты: '.$pay.'</p>
            <h1>К оплате: '.$cost_all.' ₽</h1>
        <hr>
        <form action="deliver.php" method="POST">
            <input type="submit" name="end" value="Закрыть заказ">
        </form>
        ';
    }
    
    
    
    
    ?>
    <div style="display:flex; justify-content: center;">
        <form method="POST" action="deliver.php">
        <input name="exit" style="width:500px; height:100px; font-size:20px" type="submit" value="Закончить работу">
    </div>
</body>
</html>