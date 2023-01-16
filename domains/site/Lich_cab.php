<?php
session_start();
require "libs/db.php";
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
    <title>Document</title>
</head>
<body>
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
                        <label class="info">Изменить</label>
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
                        <label class="info">Изменить</label>
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
                        <label class="info">Изменить</label>
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
            -->

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

            <div class="map top">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9f52a28b26ddd0454d1416e5c3f4ffd123a312e945375fd15e9d75c4bcff9747&amp;width=800&amp;height=550&amp;lang=ru_RU&amp;scroll=true"></script>

            <form action="Lich_cab.php" method="POST" >
                <input type="submit" name="action" value='Выйти из аккаунта'>
            </form>

        </nav>
    </nav>
</body>
</html>