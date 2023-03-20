<?php
session_start();
require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
//alex-kashin-02@mail.ru
//

require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign_in</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/sign_in.css">
</head>
<body>
<div class="telo">
    <div class="appl"><a href="#">
    <img onclick="location.href='catolog.php'" class="apple" src="image/apple.png"></a>
    </div>
    <div class="marg">
        <div class="signin1">Войти</div> 
    </div>
        
    <form action="sign_in.php" method="POST">
    <div  class="marg">
        <input name="email" type="email" placeholder="Адрес электронной почты" class="signin2">
    </div>
        
    <div  class="marg">
        <input name="password" type="password" placeholder="Пароль" class="signin2">
    </div>

    <div class="rasdelenie  marg">
        <div class="otdelno"><label class="signin3_">Если у вас нет аккаунта,<br> нажмите <a href="registration.php" class="signin3">зарегистрироваться</a></label></div>
        <div>
            <button type="submit" class="signin4">Войти</button>
            <a href="/vosstanovlenie.php" class="signin3">Забыли пароль?</a>
        </div>
    </div>

    <div>
        <?php
        
        if(!empty($_POST)){
            //debug($_POST);
            $fields_enter = load($fields_enter);
            //debug($fields_enter);
            $r = R::findOne('user', 'email = ?', [$fields_enter['email']['value']])['passsword'];
            if (password_verify($fields_enter['password']['value'], $r)){
                echo 'Вы вошли!';
                $_SESSION['id'] = R::findOne('user', 'email = ?', [$fields_enter['email']['value']])['id'];
                if (empty(R::findOne('user','id=?',[$_SESSION['id']])['order_id'])){
                    order_create();
                }
                else{
                    $_SESSION['pocket'] = R::findOne('user', 'id=?', [$_SESSION['id']])['order_id'];
                    //echo $_SESSION['pocket'];
                }
                $perm=R::findOne('user', 'id=?',[$_SESSION['id']])['permission'];
                if ($perm=="deliverer"){
                    header('Location: deliver.php');
                }
                else{
                    header('Location: glavnaia.php');
                }
            }
            else {
                echo '<p style="color:red; font-family: "Inter";">Неверная почта или пароль</p>';
            }
}
        ?>
    </div>
</form>
</div>
<script src="registration.js"></script>
</body>
</html>