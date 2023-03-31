<?php

session_start();
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

/*if (!empty($_POST) && !isset($_POST['ones2'])) {
    if (!empty($_SESSION['id'])){
        $add_to_pocket = load($add_to_pocket);
        to_pocket($add_to_pocket);
        //debug($add_to_pocket);
    }
    else {
        echo '<script>alert("Пожалуйста войдите в аккаунт или зарегестрируйтесь чтобы добавить в корзину")</script>';
    }
}*/

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
    <link rel="stylesheet" href="css/glavnaia.css">
    <link rel="stylesheet" href="css/categories.css">
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
      </style>
</head>
<body>
  <?php
  require "header.php"
  ?>
    <div class="telo">
        <div class="flex1">
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
                      <form name="formName" action="catolog.php" method="POST">
                      <div class="itc-slider__wrapper">
                        <div class="itc-slider__items">
                          <div class="itc-slider__item">
                            <!-- Контент 1 слайда -->
                            <button name="ones2" value="Молочные продукты" class="sale_product">
                                <img src="/image/sale1.svg" alt="Молочные продукты" class="img_size">
                                <div class="sale_product_text">Молочные продукты</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 2 слайда -->
                            <button name="ones2" value="Мясо" class="sale_product">
                                <img src="/image/sale2.svg" alt="Мясо" class="img_size">
                                <div class="sale_product_text">Мясо</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 3 слайда -->
                            <button name="ones2" value="Мясные продукты" class="sale_product">
                                <img src="/image/sale3.jpg" alt="Мясные продукты" class="img_size">
                                <div class="sale_product_text">Мясные продукты</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 4 слайда -->
                            <button name="ones2" value="Рыба" class="sale_product">
                                <img src="/image/sale6.jpg" alt="Рыба" class="img_size">
                                <div class="sale_product_text">Рыба</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 5 слайда -->
                            <button name="ones2" value="Майонез и соусы" class="sale_product">
                                <img src="/image/sale7.png" alt="Майонез и соусы" class="img_size">
                                <div class="sale_product_text">Майонез и соусы</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 6 слайда -->
                            <button name="ones2" value="Бакалея" class="sale_product">
                                <img src="/image/sale8.jpg" alt="Бакалея" class="img_size">
                                <div class="sale_product_text">Бакалея</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 7 слайда -->
                            <button name="ones2" value="Кофе и чай" class="sale_product">
                                <img src="/image/sale9.jpg" alt="Кофе и чай" class="img_size">
                                <div class="sale_product_text">Кофе и чай</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 8 слайда -->
                            <button name="ones2" value="Кондитерские изделия" class="sale_product">
                                <img src="/image/sale10.jpg" alt="Кондитерские изделия" class="img_size">
                                <div class="sale_product_text">Кондитерские изделия</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 9 слайда -->
                            <button name="ones2" value="Фрукты и овощи" class="sale_product">
                                <img src="/image/sale4.svg" alt="Фрукты и овощи" class="img_size">
                                <div class="sale_product_text">Фрукты и овощи</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 10 слайда -->
                            <button name="ones2" value="Хлеб" class="sale_product">
                                <img src="/image/sale11.jpg" alt="Хлеб" class="img_size">
                                <div class="sale_product_text">Хлеб</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 11 слайда -->
                            <button name="ones2" value="Замороженные продукты" class="sale_product">
                                <img src="/image/sale12.jpg" alt="Замороженные продукты" class="img_size">
                                <div class="sale_product_text">Замороженные продукты</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 12 слайда -->
                            <button name="ones2" value="Консервы" class="sale_product">
                                <img src="/image/sale13.jpg" alt="Консервы" class="img_size">
                                <div class="sale_product_text">Консервы</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 13 слайда -->
                            <button name="ones2" value="Кулинария" class="sale_product">
                                <img src="/image/sale14.jpg" alt="Кулинария" class="img_size">
                                <div class="sale_product_text">Кулинария</div>
                            </button>
                          </div>
                          <div class="itc-slider__item">
                            <!-- Контент 14 слайда -->
                            <button name="ones2" value="Напитки" class="sale_product">
                                <img src="/image/sale5.svg" alt="Напитки" class="img_size">
                                <div class="sale_product_text">Напитки</div>
                            </button>
                          </div>
                          
                          <div class="itc-slider__item">
                             <!--Контент 15 слайда-->
                             <button name="ones2" value="Остальное" class="sale_product">
                                <img src="/image/sale15.jpg" alt="Остальное" class="img_size">
                                <div class="sale_product_text">Остальное</div>
                             </button>
                          </div>
                        </div>
                      </div>
                      </form>
                      <button class="itc-slider__btn itc-slider__btn_prev"></button>
                      <button class="itc-slider__btn itc-slider__btn_next"></button>
                    </div>
                  
                  </div>
            </div>
        </div>
        
    </div>
    <?php
  require "footer.php"
  ?>
</body>
</html>