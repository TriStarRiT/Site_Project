<?php

session_start();
require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';

require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registration.css">
    <title>Document</title>
</head>
<body>
    
    <nav class="apple_folder">
        <img onclick="location.href='catolog.php'" class="apple" src="image/apple.png">
        <nav class="reg_text_nav">
            <label class="reg_text">Регистрация</label>
            <form action="registration.php" method="POST">
                <div class="grider">
                    <input class="input" type="text"name="sname" placeholder="Фамилия">
                    <label class="star">*</label>
                    <input class="input" type="text"name="name" placeholder="Имя">
                    <label class="star">*</label>
                    <input class="input" type="text"name="fname" placeholder="Отчество">
                    <label class="star"></label>
                    <input class="input" type="email"name="email" placeholder="Адрес электронной почты">
                    <label class="star">*</label>
                    <input class="input" type="password"name="password" placeholder="Пароль">
                    <label class="star">*</label>
                    <input class="input" type="tel"name="telephone" placeholder="Телефон">
                    <label class="star">*</label>
                    <input class="input" type="date"name="dbirth" placeholder="Дата рождения">
                    <label class="star">*</label>
                </div>
                <label class="star">* - поле, обязательное для заполнения</label>
                <nav class="ent_and_reg">
                    <label class="if">Если у вас уже есть аккаунт,<br> нажмите <a href="sign_in.php"><span style="color:#D1A14B">войти</span></a> </label>
                        <button type="submit" class="but_reg">Зарегистрироваться</button>
                </nav>
                <?php
                        if(!empty($_POST)){
                            //debug($_POST);
                            $fields = load($fields);

                            
                            //debug($fields);
                            if($errors = errors($fields)){
                                debug($errors);
                                
                            }
                            else{
                                echo 'ok';
                                $password = $fields['password']['value'];
                                $user = R::dispense('user');
                                $user -> second_name = $fields['sname']['value'];
                                $user -> first_name = $fields['name']['value'];
                                $user -> fathers_name = $fields['fname']['value'];
                                $user -> email = $fields['email']['value'];
                                $user -> passsword = password_hash($password, PASSWORD_DEFAULT);
                                $user -> telephone = $fields['telephone']['value'];
                                $user -> date_of_birth = $fields['dbirth']['value'];
                                $user -> permission = 'user';
                                $user = R::store($user);
                                $_SESSION['id'] = R::findOne('user', 'email = ?', [$fields['email']['value']])['id'];
                                order_create();
                                //debug($user);
                                header('Location: catolog.php');
                            }
                        }
        ?>
            </form>
        </nav>
    </nav>
    <script src="registration.js"></script>
</body>
</html>
