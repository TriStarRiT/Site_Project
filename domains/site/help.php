<?php
session_start();
require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';
?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/help.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>

<?php
  require "header.php"
  ?>  
        
<div class="telo">
        <div class="help1">
            <span class="help1_1">Здравствуйте,</span>
            <br><span>Чем мы можем вам помочь?</span>
        </div>
        <div class="help2">
            <div class="help2_1">Инструкции</div>
            <div class="help2_2">
                <div>
                    <ul>
                        <li><a href="help1.php#3" class="a_help">Как сделать заказ?</a></li>
                        <li><a href="help1.php#4" class="a_help">Могут ли заказывать юридические лица?</a></li>
                        <li><a href="help1.php#5" class="a_help">Как узнать о наличии продуктов?</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a href="help1.php#7" class="a_help">Как перенести или отменить заказ?</a></li>
                        <li><a href="help1.php#8" class="a_help">Что происходит с моим заказом?</a></li>
                        <li><a href="help1.php#9" class="a_help">Почему мне заменили товар?</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a href="help1.php#10" class="a_help">Как узнать, где сейчас мой заказ?</a></li>
                        <li><a href="help1.php#11" class="a_help">Как вернуть товар?</a></li>
                        <li><a href="help1.php#2" class="a_help">Доставляете ли вы по моему адресу?</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="help2">
            <div class="help2_1">
                <div>Часто задаваемые вопросы</div>
            </div>
            <div class="help2_2 help3_2">
                <div><a href="help1.php#2" class="a_help">Доставка</a></div>
                <div><a href="help1.php#9" class="a_help">Проблемы с товаром</a></div>
                <div><a href="help1.php#11" class="a_help">Возврат</a></div>
                <div><a href="help1.php#6" class="a_help">Заказ и оплата</a></div>
                <div><a href="help1.php#12" class="a_help">Профиль</a></div>
            </div>
        </div>
        <div  class="help1 help4">
            <span class="help1_1">Остались вопросы?</span>
            <br><span>Свяжитесь с нами для решения вашей проблемы</span>
        </div>
        <div id="social" class="help2 help5">
            <div class="help2_1 help5_1">Связаться с нами</div>
            <div class="help2_2">
                <a href="#"><img src="/image/inst.svg" alt="inst"></a>
                <a href="#"><img src="/image/vk.svg" alt="vk"></a>
                <a href="#"><img src="/image/facebook.svg" alt="facebook"></a>
                <a href="#"><img src="/image/ok.svg" alt="ok"></a>
                <a href="mailto:foodd@yandex.ru" class="a_help a_help1">foodd@yandex.ru</a>
            </div>
        </div>
    </div>
    <?php
  require "footer.php"
  ?>
</body>
</php>