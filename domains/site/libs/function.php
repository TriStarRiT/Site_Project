<?php

function debug($data){
    echo '<pre>' . print_r($data, true) . '</pre>';
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
            $errors .= "<li>Вы не заполнили поле {$data[$k]['field_name']}</li>";
        }
    }
    if(R::findOne('user', 'email = ?', [$data['email']['value']])){
        $errors .= "<li>Эта почта уже зарегестрирована </li>" ;
    }
    if(R::findOne('user', 'telephone = ?', [$data['telephone']['value']])){
        $errors .= "<li>Этот телефон уже зарегестрирован </li>" ;
    }
    return $errors;
}