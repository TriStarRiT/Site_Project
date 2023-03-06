<?php

session_start();
require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
//alex-kashin-02@mail.ru
//


require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';



if (isset($_POST['ones2'])){
    $ones1 = load($ones1);
    $mark = $ones1['ones2']['value'];
    if ($mark == "Сбросить категорию"){
        $mark = ""; 
    }
}

if (!empty($_POST) && !isset($_POST['ones2'])) {
    if (!empty($_SESSION['id'])){
        $add_to_pocket = load($add_to_pocket);
        to_pocket($add_to_pocket);
        //debug($add_to_pocket);
    }
    else {
        echo '<script>alert("Пожалуйста войдите в аккаунт или зарегестрируйтесь чтобы добавить в корзину")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    --><title>Glavnaia</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="glavnaia.css">
    <link rel="stylesheet" href="categories.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="css/header.css">
    
    <!-- Подключаем CSS слайдера -->
    <link rel="stylesheet" href="image/itc-slider.css">
    <!-- Подключаем JS слайдера -->
    <script defer src="image/itc-slider.js"></script>
    <!--<link rel="stylesheet" href="image/glavn_slider_style.css">-->
    <style>
        *,
        *::before,
        *::after {
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
        }
    
        body {
          margin: 0;
          font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto,
          'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
          'Segoe UI Symbol';
        }
    
        .container {
          max-width: 1072px;
          margin: 0 auto;
        }
    
        .itc-slider__wrapper {
          overflow: hidden;
          border-radius: 25px;
        }
    
        .itc-slider__items {
          counter-reset: slide;
        }
    
        .itc-slider-1 {
          margin-bottom: 4rem;
        }
    
        .itc-slider-1 .itc-slider__item {
          flex: 0 0 100%;
          max-width: 100%;
          counter-increment: slide;
          height: 430px;
          position: relative;
        }
    
        .itc-slider-1 .itc-slider__item::before {
          content: counter(slide) "/5";
          position: absolute;
          top: 10px;
          right: 20px;
          color: #fff;
          font-style: italic;
          font-size: 1.5rem;
          font-weight: bold;
          display: block;
        }
    
        .itc-slider-2 .itc-slider__item {
          flex: 0 0 25%;
          max-width: 25%;
          height: 350px;
          display: flex;
          justify-content: center;
          align-items: center;
          color: rgba(255, 255, 255, 0.8);
          font-size: 5rem;
        }
    
        .itc-slider__item:nth-child(6) {
          background-color: #7583ed;
        }
        .itc-slider__item:nth-child(7) {
          background-color: #b772a8;
        }
        .itc-slider__item:nth-child(8) {
          background-color: #b0fab3;
        }
        .itc-slider__item:nth-child(9) {
          background-color: #e8a85f;
        }
        .itc-slider__item:nth-child(10) {
          background-color: #e7f046;
        }
        .itc-slider__item:nth-child(11) {
          background-color: #d46767;
        }
        .itc-slider__item:nth-child(12) {
          background-color: #70def1;
        }
        .itc-slider__item:nth-child(13) {
          background-color: #004502;
        }
        .itc-slider__item:nth-child(14) {
          background-color: #25805e;
        }
        .itc-slider__item:nth-child(15) {
          background-color: #1b0044;
        }
      </style>
</head>
<body>
        <header class="header_top"> 
        <nav class="header_container">
            <div>
                <img onclick="location.href='catolog.php'" class="logo_image cursor_pointer" src="image/JjRfzsSZ5gU 1.png">
            </div>
            <div class="header_text"> <label class="cursor_pointer header_text1">На главную</label></div>
            <div class="header_text"><label class="cursor_pointer header_text1">О нас</label></div>
            <div class="header_text"><label class="cursor_pointer header_text1">Контакты</label></div>
            <div class="header_text"><label class="cursor_pointer header_text1">Помощь</label></div>
            <?php
            if(($_SESSION['id'] == "") ){
                echo '
                <nav class="header_account_1">
                    <a href="sign_in.php" class="enter_but cursor_pointer"><p class="enter_text">Вход</p></a>
                    <a href="registration.php" class="enter_but cursor_pointer"><p class="enter_text">Регистрация</p></a>
                </nav>
                ';
            }
            else{
                echo '<a href="Lich_cab.php" class="header_account header_account_2 hov_but">
                <image class="header_account_image" src="image/Vector.png"></image>
                <div class="header_account_text">Личный кабинет</div>
                </a>';
            }

            ?>
        </nav>
        <div>
            <form action="search.php" method="post">
            <nav class="header_container_lower">
                <div class="text-field">
                    <input class="search" name="search" type="text" placeholder="Я ищу...">
                </div>
                <button type="submit" class="search_button cursor_pointer centre hov_but">
                    <img class="header_account_image" src="image/search.png">
                    <div  value="Поиск" class="header_account_text cursor_pointer">Поиск</div>
                </button>
                <div onclick="location.href='pocket.php'" class="header_account cursor_pointer hov_but">
                    <img class="header_account_image" src="image/pocket.png">
                    <label class="header_account_text cursor_pointer" >Корзина</label>
                </div><!--
                <div class="header_account">
                    <img class="header_account_image" src="image/heart.png">
                    <label class="header_account_text">&nbsp &nbsp Мои<br>желания
                    </label>
                </div>-->
            </nav>
            </form>
        </div>
        </header>

    

    <div class="telo">
        <div class="flex1">
            <div>
                <nav onclick="check_cat() " class="cat_main">
                    <nav>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </nav>
                    <div id="arrow" class="arrow_close"></div>
                    <label class="cat_text_main">Категории</label>
                </nav>
                <nav id="cat">
                    <div class="cat"><label class="cat_text">Молочные продукты</label></div>
                    <div class="cat"><label class="cat_text">Мясо</label></div>
                    <div class="cat"><label class="cat_text">Птица</label></div>
                    <div class="cat"><label class="cat_text">Яйцо</label></div>
                    <div class="cat"><label class="cat_text">Мясные продукты</label></div>
                    <div class="cat"><label class="cat_text">Рыба</label></div>
                    <div class="cat"><label class="cat_text">Майонез и соусы</label></div>
                    <div class="cat"><label class="cat_text">Бакалея</label></div>
                    <div class="cat"><label class="cat_text">Кофе и чай</label></div>
                    <div class="cat"><label class="cat_text">Кондитерские изделия</label></div>
                    <div class="cat"><label class="cat_text">Фрукты, овощи</label></div>
                    <div class="cat"><label class="cat_text">Хлеб</label></div>
                    <div class="cat"><label class="cat_text">Замороженные продукты</label></div>
                    <div class="cat"><label class="cat_text">Консервы</label></div>
                    <div class="cat"><label class="cat_text">Кулинария</label></div>
                    <div class="cat"><label class="cat_text">Напитки</label></div>
                </nav>
            
                    <script src="categories.js">
                    </script>
            </div>
            <div>
                <div class="container">
                
                    <div class="itc-slider itc-slider-1" data-slider="itc-slider" data-loop="false">
                      <div class="itc-slider__wrapper">
                        <div class="itc-slider__items">
                          <div class="itc-slider__item">
                            <!-- Контент 1 слайда -->
                            <img src="/image/slider1.svg" alt="">
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 2 слайда -->
                            <img src="/image/slider1.svg" alt="">
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 3 слайда -->
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 4 слайда -->
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 5 слайда -->
                          </div>
                        </div>
                      </div>
                      <button class="itc-slider__btn itc-slider__btn_prev"></button>
                      <button class="itc-slider__btn itc-slider__btn_next"></button>
                    </div>
                  
                    <div class="itc-slider itc-slider-2" data-slider="itc-slider" data-loop="true">
                      <div class="itc-slider__wrapper">
                        <div class="itc-slider__items">
                          <div class="itc-slider__item">
                            <!-- Контент 1 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale1.svg" alt="Молочные продукты">
                                <div class="sale_product_text">Молочные продукты</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 2 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale2.svg" alt="Мясо">
                                <div class="sale_product_text">Мясо</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 3 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale3.svg" alt="Птица">
                                <div class="sale_product_text">Птица</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 4 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale4.svg" alt="Фрукты, овощи">
                                <div class="sale_product_text">Фрукты, овощи</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 5 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale5.svg" alt="Напитки">
                                <div class="sale_product_text">Напитки</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 6 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale1.svg" alt="Молочные продукты">
                                <div class="sale_product_text">Молочные продукты</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 7 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale1.svg" alt="Молочные продукты">
                                <div class="sale_product_text">Молочные продукты</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 8 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale1.svg" alt="Молочные продукты">
                                <div class="sale_product_text">Молочные продукты</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 9 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale1.svg" alt="Молочные продукты">
                                <div class="sale_product_text">Молочные продукты</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 10 слайда -->
                            <div class="sale_product">
                                <img src="/image/sale1.svg" alt="Молочные продукты">
                                <div class="sale_product_text">Молочные продукты</div>
                            </div>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 11 слайда -->
                            11
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 12 слайда -->
                            12
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 13 слайда -->
                            13
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 14 слайда -->
                            14
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 15 слайда -->
                            15
                          </div>
                        </div>
                      </div>
                      <button class="itc-slider__btn itc-slider__btn_prev"></button>
                      <button class="itc-slider__btn itc-slider__btn_next"></button>
                    </div>
                  
                  </div>
                <!--
                <div class="slider_image flex">
                    <form action="#">
                        <button class="slider_button previous">
                            <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.40959 16.7224L0.395508 8.7083L8.40959 0.694214L9.41117 1.6958L2.39867 8.7083L9.41117 15.7208L8.40959 16.7224Z" fill="white" fill-opacity="0.86"/>
                            </svg>
                        </button>
                    </form>
                    <a href="#">
                        <div class="a_width"></div>
                    </a>
                    <form action="#">
                        <button class="slider_button next">
                            <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.17346 16.7224L9.18754 8.7083L1.17346 0.694214L0.171875 1.6958L7.18437 8.7083L0.171875 15.7208L1.17346 16.7224Z" fill="white" fill-opacity="0.89"/>
                            </svg>
                        </button>
                    </form>
                </div>
                
                <div class="center">
                    <div class="points flex">
                        <div class="point"></div>
                        <div class="point"></div>
                        <div class="point"></div>
                        <div class="point"></div>
                        <div class="point"></div>
                    </div>
                </div>
                -->
                <!--
                <div class="flex1 flex1_">
                    <div>
                        <div class="slider_sale_head">Скидки по категориям</div>
                        <div class="slider_sale flex">
                            <form action="#">
                                <button class="slider_button previous">
                                    <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.40959 16.7224L0.395508 8.7083L8.40959 0.694214L9.41117 1.6958L2.39867 8.7083L9.41117 15.7208L8.40959 16.7224Z" fill="white" fill-opacity="0.86"/>
                                    </svg>
                                </button>
                            </form>
                            <div class="sale_products flex">
                                <div class="sale_product">
                                    <img src="/image/sale1.svg" alt="Молочные продукты">
                                    <div class="sale_product_text">Молочные продукты</div>
                                </div>
                                <div class="sale_product">
                                    <img src="/image/sale2.svg" alt="Мясо">
                                    <div class="sale_product_text">Мясо</div>
                                </div>
                                <!----
                                <div class="sale_product">
                                    <img src="/image/sale3.svg" alt="Птица">
                                    <div class="sale_product_text">Птица</div>
                                </div> --
                                <div class="sale_product">
                                    <img src="/image/sale4.svg" alt="Фрукты, овощи">
                                    <div class="sale_product_text">Фрукты, овощи</div>
                                </div>
                                <!----
                                <div class="sale_product">
                                    <img src="/image/sale5.svg" alt="Напитки">
                                    <div class="sale_product_text">Напитки</div>
                                </div> --
                            </div>
                            <form action="#">
                                <button class="slider_button next">
                                    <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.17346 16.7224L9.18754 8.7083L1.17346 0.694214L0.171875 1.6958L7.18437 8.7083L0.171875 15.7208L1.17346 16.7224Z" fill="white" fill-opacity="0.89"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div> 
                    <div class="hit">
                        <div class="margin">
                            Хит продаж
                            <br>в этом месяце
                        </div>
                        <div class="hit_products">
                            <div class="hit_product">
                                <img src="/image/hit1.svg" alt="">
                            </div>
                            <div class="hit_product">
                                <img src="/image/hit2.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
        
    </div>
    <footer>
        <div class="adaptivno">
            <div>

            </div>
            <div class="icona">
                <a href="glavnaia.html"><img src="/image/footerapple.png" alt="FOODD icon"></a>
                <div class="foot1">© foodd, 2023</div>
            </div>
            <div>
                <div class="foot2">Помощь</div>
                <a href="help1.html" class="foot3">Инструкции и советы</a>
                <br><a href="help1.html#12" class="foot3">Написать в поддержку</a>
                <!--<br><a href="#" class="foot3">Правовые документы</a>-->
            </div>
            <div>
                <div class="foot2">Партнерство</div>
                <a href="help1.html#4" class="foot3">FOODD для бизнеса</a>
                <br><a href="mailto:foodd.bisness@yandex.ru" class="foot3">foodd.bisness@yandex.ru</a>
            </div>
            <div>
                <div class="foot2">FOODD в соц сетях</div>
                <a href="#" class="foot3">ВКонтакте</a>
                <br><a href="#" class="foot3">Instagram</a>
                <br><a href="#" class="foot3">Facebook</a>
                <br><a href="#" class="foot3">Одноклассники</a>
            </div>
            <div>
                <div class="foot2">Для СМИ</div>
                <a href="mailto:foodd@yandex.ru" class="foot3">foodd@yandex.ru</a>
            </div>
            <div>
                <div class="foot2">Правообладателям</div>
                <a href="#" class="foot3">О  предъявлении претензий</a>
            </div>
        </div>
        
    </footer>
</body>
</html>