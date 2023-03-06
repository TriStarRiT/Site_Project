<?php

require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';

require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if(!empty($_POST)){
    debug($_POST);
    $fields = load($fields);

    
    debug($fields);
    if($errors = errors($fields)){
        debug($errors);
    }
    else{
        echo 'ok';
        $password = $fields['password']['value'];
        $user = R::dispense('user');
        $user -> First_name = $fields['sname']['value'];
        $user -> Second_name = $fields['name']['value'];
        $user -> Fathers_name = $fields['fname']['value'];
        $user -> email = $fields['email']['value'];
        $user -> passsword = password_hash($password, PASSWORD_DEFAULT);
        $user -> telephone = $fields['telephone']['value'];
        $user -> date_of_birth = $fields['dbirth']['value'];
        $user = R::store($user);
        $user = R::load('user',$id);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>Document</title>
</head>
<body>
    
    <nav class="apple_folder">
        <img onclick="" class="apple" src="image/apple.png">
        <nav class="reg_text_nav">
            <label class="reg_text">Регистрация</label>
            <form action="admin.php" method="POST">
                <input class="input" type="text"name="sname" placeholder="Фамилия">
                <input class="input" type="text"name="name" placeholder="Имя">
                <input class="input" type="file"name="fname" placeholder="Отчество">
                <input class="input" type="email"name="email" placeholder="Адрес электронной почты">
                <input class="input" type="password"name="password" placeholder="Пароль">
                <input class="input" type="text"name="telephone" placeholder="Телефон">
                <input class="input" type="date"name="dbirth" placeholder="Дата рождения">
                <nav class="ent_and_reg">
                    <label class="if">Если у вас уже есть аккаунт,<br> нажмите <a><span style="color:#D1A14B">войти</span></a> </label>
                        <button type="submit" class="but_reg">Зарегистрироваться</button>
                </nav>
            </form>
        </nav>
    </nav>
    <script src="registration.js"></script>
</body>
</html>
