<?php

require "libs/db.php";

require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

if (!empty($_POST)){
    $product = load($product);
    if ($errors = product_errors($product)){
        debug($errors);
    }
}


?>