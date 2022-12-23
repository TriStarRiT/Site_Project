<?php

function debug($data){
    echo '<nav style="  width:200px; height:200px; background-color:red;"></nav';
    echo '<div><pre style="color:red;">' . print_r($data, true) . '</pre></div>';
}
function load($data){
    foreach($_POST as $k => $v){
        if(array_key_exists($k, $data)){
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}
function errors($data){
    $errors = '';
    foreach ($data as $k => $v){
        if($data[$k]['requiered'] && empty($data[$k]['value'])){
            $errors .= "<p style='width:100%; text-align: center'>Вы не заполнили поле {$data[$k]['field_name']}</p>";
        }
    }
    if(R::findOne('user', 'email = ?', [$data['email']['value']])){
        $errors .= "<p style='width:100%; text-align: center' >Эта почта уже зарегестрирована </p>" ;
    }
    if(R::findOne('user', 'telephone = ?', [$data['telephone']['value']])){
        $errors .= "<p style='width:100%; text-align: center' >Этот телефон уже зарегестрирован </p>" ;
    }
    return $errors;
}

function product_errors($data){
    $errors = '';
    foreach ($data as $k => $v){
        if ($data[$k]['requiered'] && empty($data[$k]['value'])){
            $errors .= "<p style='width:100%; text-align: center'>Вы не заполнили поле {$data[$k]['field_name']}</p>";
        }
    }
}