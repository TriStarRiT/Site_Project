<?php

$fields = [
    'sname' => [
        'field_name'=>'фамилия',
        'requiered'=> 1
    ],

    'name' => [
        'field_name'=>'имя',
        'requiered'=> 1
    ],

    'fname' => [
        'field_name'=>'отчество',
        'requiered'=> 0
    ],
    
    'email' => [
        'field_name'=>'электронная почта',
        'requiered'=> 1
    ],

    'password' => [
        'field_name'=>'пароль',
        'requiered'=> 1
    ],

    'telephone' => [
        'field_name'=>'номер телефона',
        'requiered'=> 1
    ],

    'dbirth' => [
        'field_name'=>'дата рождения',
        'requiered'=> 1
    ],
];

$fields_enter = [
    'email' => [
        'field_name' => 'электронная почта'
    ],
    'password' => [
        'field_name' => 'пароль'
    ]
];

$product = [
    'name'=>[
        'field_name' => 'Название',
        'requiered'=> 1
    ],
    'expiration date' => [
        'field_name' => 'Срок годности',
        'requiered'=> 1
    ],
    'type_of_product'=>[
        'field_name' => 'Тип продукта',
        'requiered'=> 1
    ],
    'Number_of_order' => [
        'field_name' => 'Номер заказа',
        'requiered'=> 1
    ],
    /*'size'=>[
        'field_name' => 'Размер продукта',
        'requiered'=> 1
    ],*/
    'Cost' => [
        'field_name' => 'Цена',
        'requiered'=> 1
    ],
    /*'Ones_in_storage'=>[
        'field_name' => 'Количество на складе',
        'requiered'=> 1
    ],*/
    'quality_by_expiration_date' => [
        'field_name' => 'Качество по сроку годности',
        'requiered'=> 0
    ],
    /*'storage_id'=>[
        'field_name' => 'id хранилища',
        'requiered'=> 1
    ],*/
    /*'favourite_rate' => [
        'field_name' => 'рейтинг по качеству',
        'requiered'=> 0
    ]*/
    ];