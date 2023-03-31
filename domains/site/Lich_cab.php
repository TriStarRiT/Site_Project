<?php
session_start();
require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if(isset($_POST['action'])){
    $_SESSION['id'] = '';
    header('Location: catolog.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Lich_cab.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Document</title>
</head>
<body>
<?php
  require "header.php"
  ?>  

<!-- Личный кабинет начинается здесь-->
<nav class="main_content_nav">
        <label class="bold_text">Личный кабинет</label>
        <nav class="pre_main_content_nav top">
            <label class="usual_text">Личные данные</label>
            <nav class="top">
                <label class="proz">Фамилия</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['second_name'];
                            ?>
                        </label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Имя</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['first_name'];
                            ?>
                        </label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Отчество</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['fathers_name'];
                            ?>
                        </label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Адрес электронной почты</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['email'];
                            ?>
                        </label>
                    </div>
                    <div class="but_change">
                        <label class="info"></label>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Пароль</label>
                <div class="stroc">
                    <div>
                        <label class="info">************</label>
                    </div>
                    <div class="but_change">
                        <a href="vosstanovlenie.php" class="info">Изменить</a>
                    </div>
                </div>
            </nav>

            <nav class="top">
                <label class="proz">Телефон</label>
                <div class="stroc">
                    <div>
                        <label class="info">
                            <?php
                            echo R::findOne('user', 'id =?',[$_SESSION['id']] )['telephone'];
                            ?>
                        </label>
                    </div>
                    <div class="but_change">
                        <label class="info"></label>
                    </div>
                </div>
            </nav>

            <!--
            <nav class="top">
                <div>
                    <label class="info"></label>
                </div>
                <div class="stroc">
                    <label class="info"></label>
                </div>
            </nav>
            

            <nav class="top">
                <label class="proz">Адрес достаки на дом</label>
                <div class="stroc">
                    <div>
                        <label class="info"></label>
                    </div>
                    <div class="but_change">
                        <label class="info">Изменить</label>
                    </div>
                </div>
            </nav>
-->

            
            <form style="width:100%" action="Lich_cab.php" method="POST" >
                <input class="but_exit" type="submit" name="action" value='Выйти из аккаунта'>
            </form>
            <br><br>

        </nav>
    </nav>

    <?php
  require "footer.php"
  ?>
</body>
</html>