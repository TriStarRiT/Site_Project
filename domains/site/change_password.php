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
    <title>Смена пароля</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/vosstanovlenie_obratno.css">
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/vosstanovlenie.css">
    <link rel="stylesheet" href="css/vosstanovlenie_obratno.css">
</head>
<body>
<div class="telo">
    <div class="appl"><a href="glavnaia.php">
    <img class="apple" src="image/apple.png"></a>
    <form action="change_password.php" method="POST">
        <div>
            <div class="marg">
            <div class="signin1">Восстановление пароля</div> 
        </div>
        <input name="one" type="password" placeholder="Новый пароль" class="signin11">
        </div>
        <div class="rasdelenie  marg">
            <!--<div class="otdelno"><label class="signin3_">Если у вас нет аккаунта,<br> нажмите <a href="#" class="signin3">зарегистрироваться</a></label></div>-->
            <div class="rasdelenie1">
                <button type="submit" class="signin4">
                    Сменить пароль
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="strelka">
                        <path d="M9.72949 18.3401L15.7295 12.3401L9.72949 6.34009" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                        
                </button></form>
                <!--<a href="#" class="signin3">Забыли пароль?</a>-->
            </div>
        </div> 
        </form> 
        <?php
            if(!empty($_POST)){
                $code= load($code); 
                $id= R::findOne('user', 'email = ?', [$_SESSION['change_pas_id']])['id'];
                $user= R::load('user', $id);
                $user->passsword = password_hash($code['one']['value'], PASSWORD_DEFAULT);
                R::store($user);
                $_SESSION['id']="";
                header('Location: sign_in.php');
            }
        ?>
</div>
</body>
</html>