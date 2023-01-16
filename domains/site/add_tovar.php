<?php

require "libs/db.php";

require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if (!empty($_POST)) {
    $products = load($products);

    //debug($_POST);
    if ($errors = product_errors($products)) {
        //debug($errors);
    } else {
        $ran = rand(0000000, 9999999);
        $put = 'image/prod/';
        if (isset($_FILES['filename']['name']) && ($_FILES['filename']['name'] != '')) {
            $name = $_FILES['filename']['name'];
            move_uploaded_file($_FILES['filename']['tmp_name'], $put . $ran . $name);
            $namefile = $ran . $name;
            $products['picture']['value'] = trim($namefile);
            //load_file($product);
            //debug($product);

            $product = R::dispense('product');
            $product->name = $products['name']['value'];
            $product->description = $products['description']['value'];
            $product->expiration_date = $products['expiration_date']['value'];
            $product->type_of_product = $products['type_of_product']['value'];
            $product->Number_of_order = $products['number_of_order']['value'];
            $product->Cost = $products['cost']['value'];
            $product->Ones = $products['ones']['value'];
            if ($products['expiration_date']['value'] < date('Y/m/d')) {
                $product->quality_by_expiration_date = true;
            }
            $product->picture = $products['picture']['value'];
            $product = R::store($product);
            $product = R::load('product', $id);
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/product_create.css">
    <title>Document</title>
</head>
<body>
        <div class="main">
            <form action="add_tovar.php" method="POST" enctype="multipart/form-data">
                <div class="input_div">
                    <label class="text_input">Название</label>
                    <input type="text" name="name" class="input"  placeholder="Название">
                </div>

                <div class="input_div">
                    <label class="text_input">Описание</label>
                    <input type="text" name="description" class="input" placeholder="Описание">
                </div>

                <div class="input_div">
                    <label class="text_input">Срок годности</label>
                    <input type="date" name="expiration_date" class="input" placeholder="Срок годности">
                </div>

                <div class="input_div">
                    <select name="type_of_product" class="input">
                        <option value="Молочные продукты">Молочные продукты</option>
                        <option value="Мясо">Мясо</option>
                        <option value="Мясные продукты">Мясные продукты</option>
                        <option value="Рыба">Рыба</option>
                        <option value="Соусы">Майонез и соусы</option>
                        <option value="Бакалея">Бакалея</option>
                        <option value="Кофе и чай">Кофе и чай</option>
                        <option value="Кондитерские изделия">Кондитерские изделия</option>
                        <option value="Фрукты и овощи">Фрукты и овощи</option>
                        <option value="Хлеб">Хлеб</option>
                        <option value="Замороженные продукты">Замороженные продукты</option>
                        <option value="Консервы">Консервы</option>
                        <option value="Кулинария">Кулинария</option>
                        <option value="Напитки">Напитки</option>
                        <option value="Остальное">Остальное</option>
                    </select>
                </div>
                <!--
                <div class="input_div">
                    <label class="text_input">Тип продукта</label>
                    <input type="text" name="type_of_product" class="input" placeholder="Тип продукта">
                </div>
-->
                <div class="input_div">
                    <label class="text_input">Номер заказа</label>
                    <input type="text" name="number_of_order" class="input" placeholder="Номер заказа">
                </div>

                <div class="input_div">
                    <label class="text_input">Цена</label>
                    <input type="number" name="cost" class="input" placeholder="Цена">
                </div>

                <div class="input_div">
                    <label class="text_input">Количество</label>
                    <input type="number" name="ones" class="input" placeholder="Количество">
                </div>

                <div class="input_div">
                    <label class="text_input">Фото продукта</label>
                    <input type="file" name="filename" class="input_file" placeholder="Фото продукта">
                </div>
                <button type="submit" class="but_add_tov">Создать товар</button>
            </form>
        </div>
</body>
</html>