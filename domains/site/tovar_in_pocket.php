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
    <link rel="stylesheet" href="/css/tovar_in_pocket.css">
    <title>Document</title>
</head>
<body>
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
        $cost = R::findOne('product','id=?',[$id])['cost'];
        $cost_col = $cost * $ones;
        $cost_all = $cost_all + $cost_col;
        $_SESSION['cost'] = $cost_all;
        echo '
        <div class="line1"></div> 
        <nav class="main">
            <image src="/image/prod/'.$pic.'" class="image"></image>
            <nav>
                <label class="text">'.$name.'</label>
                <br>
                <br>
                <label class="text">'.$cost.' ₽</label>
                <div class="col">'.$ones.' шт.</div>
            </nav>
        </nav>  
        <br>             
        ';
    }



    ?>
</body>
</html>