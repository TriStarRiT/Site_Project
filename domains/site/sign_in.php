<?php

require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
//alex-kashin-02@mail.ru
//

require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if(!empty($_POST)){
    debug($_POST);
    $fields_enter = load($fields_enter);
    debug($fields_enter);
    $r = R::findOne('user', 'email = ?', [$fields_enter['email']['value']])['passsword'];
    echo $r;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign_in</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="sign_in.css">
</head>
<body>
<div class="telo">
    <div class="appl"><a href="#">
    <img class="apple" src="image/apple.png"></a>
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
        <div class="otdelno"><label class="signin3_">Если у вас нет аккаунта,<br> нажмите <a href="#" class="signin3">зарегистрироваться</a></label></div>
        <div>
            <button type="submit" class="signin4">Войти</button>
            <a href="/vosstanovlenie.html" class="signin3">Забыли пароль?</a>
        </div>
    </div>
</form>
</div>
<script src="registration.js"></script>
</body>
</html>