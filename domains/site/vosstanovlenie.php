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
    <title>Vosstanovlenie</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/vosstanovlenie.css">
    <link rel="stylesheet" href="css/vosstanovlenie_obratno.css">
</head>
<body>
<div class="telo">
    <div class="appl"><a href="glavnaia.php">
    <img class="apple" src="image/apple.png"></a>
    
    <?php
    if ($_SESSION['code']==""){
        echo'
        </div>
        <div class="marg">
            <div class="signin1">Восстановление пароля</div> 
        </div>
            
        <form action="vosstanovlenie.php" method="POST">
        <div  class="marg marg1">
            <div class="marg2">
                <div class="signin1 textalign">Введите адрес электронной почты</div>
                <input type="email" name="ones2" placeholder="example@mail.com" class="signin2">
            </div>
        </div>
            
        <!--<div  class="marg">
            <input type="password" placeholder="Пароль" class="signin2">
        </div>-->
    
        <div class="rasdelenie  marg">
            <!--<div class="otdelno"><label class="signin3_">Если у вас нет аккаунта,<br> нажмите <a href="#" class="signin3">зарегистрироваться</a></label></div>-->
            <div class="rasdelenie1">
                <button type="submit" class="signin4">
                    Далее
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="strelka">
                        <path d="M9.72949 18.3401L15.7295 12.3401L9.72949 6.34009" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                        
                </button></form>
                <!--<a href="#" class="signin3">Забыли пароль?</a>-->
            </div>
        </div>  
        ';
    }
    else{
        echo'
        <form action="vosstanovlenie.php" method="POST">
        <div>
            <div class="marg">
            <div class="signin1">Восстановление пароля</div> 
        </div>
        <input name="one" type="" placeholder="код" class="signin10">
        </div>
        <div class="rasdelenie  marg">
            <!--<div class="otdelno"><label class="signin3_">Если у вас нет аккаунта,<br> нажмите <a href="#" class="signin3">зарегистрироваться</a></label></div>-->
            <div class="rasdelenie1">
                <button type="submit" class="signin4">
                    Проверить код
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="strelka">
                        <path d="M9.72949 18.3401L15.7295 12.3401L9.72949 6.34009" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                        
                </button></form>
                <!--<a href="#" class="signin3">Забыли пароль?</a>-->
            </div>
        </div> 
        </form> 
        ';
    }
    ?>
    <?php
    if(isset($_POST['ones2'])){
        $ones1=load($ones1);
        if(empty(R::findOne('user', 'email = ?', [$ones1['ones2']['value']])['id'])){
            echo"
            <div><label style='color:red; display: margin-left:100px'>Такого аккаунта не существует</label></div>
            ";
        }
        else {
            $to = $ones1['ones2']['value'];
            $subject='Восстановление пароля';
            $rand= rand(10000, 99999);
            $_SESSION['change_pas_id']= $ones1['ones2']['value'];
            //$rand= password_hash($password, PASSWORD_DEFAULT)
            $message='Для восстановления пароля введите этот код: '.$rand;
            $headers="From: noreplyFOODD@site.ru\r\n";
            $_SESSION['code']=$rand;
            mail($to, $subject, $message, $headers);
            header('Location:vosstanovlenie.php');
        }
    }
    if(isset($_POST['one'])){
        $code=load($code);
        if($code['one']['value']==$_SESSION['code']){
            $_SESSION['code']="";
            header('Location:change_password.php');
        }
        else{
            echo"
            <div><label style='color:red; display: margin-left:100px'>Неверный код, попробуйте ещё раз</label></div>
            ";
        }
    }
    
?>
</div>
</body>
</html>