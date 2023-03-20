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

$products = [
    'name'=>[
        'field_name' => 'Название',
        'requiered'=> 1
    ],
    'description' => [
        'field_name' => 'Описание',
        'requiered'=>1
    ],
    'expiration_date' => [
        'field_name' => 'Срок годности',
        'requiered'=> 0
    ],
    'type_of_product'=>[
        'field_name' => 'Тип продукта',
        'requiered'=> 1
    ],
    'number_of_order' => [
        'field_name' => 'Номер заказа',
        'requiered'=> 0
    ],
    /*'size'=>[
        'field_name' => 'Размер продукта',
        'requiered'=> 1
    ],*/
    'cost' => [
        'field_name' => 'Цена',
        'requiered'=> 1
    ],
    'ones'=>[
        'field_name' => 'Количество',
        'requiered'=> 1
    ],
    'quality_by_expiration_date' => [
        'field_name' => 'Качество по сроку годности',
        'requiered'=> 0
    ],
    'picture' =>[
        'field_name' => 'Фото продукта',
        'required'=> 1
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

$add_to_pocket = [
    'id_tov' =>[
        'field_name'=>'',
    ]
];

$search = [
    'search' => [
        'field_name' => '',
    ]
];

$ones1 = [
    'ones2' => [
        'field_name' => '',
    ]
];
$code = [
    'one' => [
        'field_name' => '',
    ]
];

$order = [
    'orderer_name' => [
        'field_name' => 'имя',
        'requiered' => 0
    ],
    'telephone' => [
        'field_name' => 'номер телефона',
        'requiered' => 0
    ],
    'address_cit' => [
        'field_name' => 'город',
        'requiered' => 1
    ],
    'address_pod' => [
        'field_name' => 'подъезд',
        'requiered' => 0
    ],
    'address_str' => [
        'field_name' => 'улица',
        'requiered' => 1
    ],
    'address_flo' => [
        'field_name' => 'этаж',
        'requiered' => 1
    ],
    'address_hou' => [
        'field_name' => 'дом',
        'requiered' => 1
    ],
    'address_fla' => [
        'field_name' => 'этаж',
        'requiered' => 1
    ],
    'comment' => [
        'field_name' => 'комментарий',
        'requiered' => 0
    ],
    'payment' => [
        'field_name' => 'способ оплаты',
        'requiered' => 1
    ],
];