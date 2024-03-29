<?php
session_start();
require "libs/db.php";
require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

function leave(){
    if($_SESSION['cost'] == ''){
        sleep(1);
        //header('Location: podtvergdeno.php');
        echo "<script type='text/javascript'>
        window.location.href = 'podtvergdeno.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказ на доставку</title>
    <link rel="icon" href="/image/apple.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/zakaz.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
<?php
  require "header.php"
  ?>



    <div class="telo">
        <form action="zakaz.php" method="POST">
        <div class="zakaz1">
            <div>
                <div>
                    <div class="zakaz2">Заказ на доставку</div>
                    <div class="zakaz1">
                        <div>
                            <div class="zakaz1 zakaz_1">
                                <div class="zakaz3">Имя</div>
                                <?php
                                echo '<div><input type="text" name="orderer_name" placeholder="'.R::findOne('user', 'id =?',[$_SESSION['id']] )['first_name'].'" class="zakaz4 razmer1"></div>'
                                ?>
                            
                            </div>
                            <div class="zakaz1 zakaz_1">
                                <div class="zakaz3">Номер телефона</div>
                                <?php
                                echo '<div><input type="tel" name="telephone" placeholder="'.R::findOne('user', 'id =?',[$_SESSION['id']] )['telephone'].'" size="20" minlength="11" maxlength="12"class="zakaz4 razmer1"></div>'
                                ?>
                            </div>
                            <div class="zakaz1 zakaz_1 adr">
                                <div class="zakaz3">Адрес доставки</div>
                                <div class="zakaz1 margg">
                                    <div>
                                        <div><input name="address_cit" type="text" placeholder="Город" class="zakaz4"><label class="star">*</label></div>
                                        <div><input name="address_str" type="text" placeholder="Улица" class="zakaz4"><label class="star">*</label></div>
                                        <div><input name="address_hou" type="text" placeholder="Дом" class="zakaz4"><label class="star">*</label></div>
                                    </div>
                                    <div>
                                        <div><input name="address_pod" type="text" placeholder="Подьезд" class="zakaz4 razmer2"></div>
                                        <div><input name="address_flo" type="text" placeholder="Этаж" class="zakaz4 razmer2"><label class="star">*</label></div>
                                        <div><input name="address_fla" type="text" placeholder="Квартира" class="zakaz4 razmer2"><label class="star">*</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="kom zakaz_1"><input name="comment" type="text" placeholder="Комментарий" class="zakaz4 razmer1"></div>
                            <label class="star">* - поле, обязательное для заполнения</label>
                            
                        </div>
                    </div>
                </div>

                <div class="map top">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9f52a28b26ddd0454d1416e5c3f4ffd123a312e945375fd15e9d75c4bcff9747&amp;width=800&amp;height=550&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
                <div>
                    <div class="zakaz2 zakaz2_">Способ оплаты</div>
                    <div>
                        <div class="zakaz3">
                            <input type="radio" id="dewey1" name="payment" value="картой" class="zakaz5">
                            <label for="dewey1">Картой курьеру</label>
                        </div>
                        <div class="zakaz3">
                            <input type="radio" id="dewey2" name="payment" value="наличными" class="zakaz5">
                            <label for="dewey2">Наличными</label>
                        </div>
                        <!--
                        <div class="zakaz6 zakaz5">С какой суммы подготовить сдачу?<input type="text" placeholder="Сумма" class="zakaz4 razmer2">₽ <input type="checkbox" name="sdacha" id="dewey3" class="zakaz5_"><label for="dewey3">Без сдачи</label></div>
                        -->
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div class="width1">
                        <div class="statys1">
                            <svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.4347 26L0 14.4442L3.91232 10.1116L10.4347 17.3327L26.0858 0L30 4.33265L10.4347 26ZM3.91232 13L2.60821 14.4442L10.4347 23.1116L27.3899 4.33265L26.0858 2.88843L10.4347 20.2231L3.91232 13Z" fill="black"/>
                            </svg>
                        </div>
                        <div class="statys2"></div>
                        <div class="statys1">
                            2
                        </div>
                        <div class="statys2 statys2_"></div>
                        <div class="statys1 statys1_">
                            3                 
                        </div>
                        
                    </div>
                    <div class="width2">
                        <div class="text">Корзина</div>
                        <div class="text">Оформление заказа</div>
                        <div class="text text_">Заказ принят</div>
                    </div>
                </div>
                <div class="zakaz7_">
                <div class="zakaz7">
                    <div class="zakaz8">Состав заказа</div>
                    <div class="zakaz9">
                        <iframe src="tovar_in_pocket.php" frameborder="0" class="zakaz9_"></iframe>
                    </div>
                    <div class="zakaz10 zakaz1">
                        <div>Итого:</div>
                        <div><?php echo $_SESSION['cost'] ?> ₽</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="zakaz1_"><button name="action" type="submit" class="signin4">Оформить заказ</button></div>
        <?php
        if (!empty($_POST)){
            $order = load($order);
            if($errors = main_errors($order)){
                debug($errors);
                
            } 
            else {
                //debug($order);
                if (empty($order['orderer_name']['value'])){
                    $order['orderer_name']['value'] = R::findOne('user', 'id =?',[$_SESSION['id']] )['first_name'];
                }
                if (empty($order['telephone']['value'])){
                    $order['telephone']['value'] = R::findOne('user', 'id =?', [$_SESSION['id']])['telephone'];
                }
                order($order);
                $_SESSION['cost'] = '';
                leave();
            }
        }
        
        ?>
    
    </form>
    </div>
    <?php
  require "footer.php"
  ?>
</body>
</html>