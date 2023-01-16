<?php
session_start();
function debug($data){
    echo '
    <nav style="margin-right:auto;">
        <label style="color:red;">Ошибки:</label>
        <nav style="  width:300px; border: solid 1px red;">
            <div><pre style="color:red;">' . print_r($data, true) . '</pre></div>
        </nav>
    </nav>'
    ;
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
    if(R::findOne('product','name = ?',[$data['name']['value']])){
        $errors .= "<p style='width:100%; text-align: center' >Этот товар уже существует </p>" ;
    }
    return $errors;
}

function main_errors($data){
    $errors = '';
    foreach ($data as $k => $v){
        if ($data[$k]['requiered'] && empty($data[$k]['value'])){
            $errors .= "<p style='width:100%; text-align: center'>Вы не заполнили поле {$data[$k]['field_name']}</p>";
        }
    }
    return $errors;
}

function to_pocket($a, $v){
    if($_SESSION['pocket'] == ""){
        $_SESSION['pocket'] = $v;
    }
    $c= R::getAll('SELECT * FROM pocket WHERE order_id="'.$_SESSION['pocket'].'" AND product_id="'.$a['id_tov']['value'].'"' );
    $id = $c['0']['id'];
    //debug($c);
    if(!empty($c) ){
        $pocket = R::load('pocket', $id);
        $pocket->ones = $c[0]['ones']+1;
        R::store($pocket);
        
    }
    else{
        $pocket = R::dispense('pocket');
        $pocket -> user_id = $_SESSION['id'];
        $pocket -> order_id = $_SESSION['pocket'];
        $pocket -> product_id = $a['id_tov']['value'];
        $pocket -> ones = 1;
        R::store($pocket);
    }

    /*echo $_SESSION['pocket'].'  ';
    
    echo $_SESSION['id'].'  ';
    echo $a['id_tov']['value'];*/
}

function outo_pocket($a){
    $b = $a['id_tov']['value'];

    R::hunt('pocket','id=?',[$b]);
}

function order_create(){
    $order = R::dispense('order');
    $order -> user_id = $_SESSION['id'];
    $order->stat = 'Не готов';
    //$order -> date = $date;
    //$order -> payment_type = $payment_type;
    //$order -> telephone = $telephone;
    //$order -> adress = $adress;
    $order = R::store($order);
    $c= R::getAll('SELECT * FROM dbsite.order WHERE user_id="'.$_SESSION['id'].'" AND stat="Не готов"' );
    $_SESSION['pocket'] = $c['0']['id'];
    $user = R::load('user', $_SESSION['id']);
    $user -> order_id = $_SESSION['pocket'];
    R::store($user);
}

function order($data){
    $order = R::load('order', $_SESSION['pocket']);
    $order -> date = date('jS F Y');
    $order -> telephone = $data['telephone']['value'];
    $order -> address_cit = $data['address_cit']['value'];
    $order -> address_pod = $data['address_pod']['value'];
    $order -> address_str = $data['address_str']['value'];
    $order -> address_flo = $data['address_flo']['value'];
    $order -> address_hou = $data['address_hou']['value'];
    $order -> address_fla = $data['address_fla']['value'];
    $order -> comment = $data['comment']['value'];
    $order -> payment = $data['payment']['value'];
    $order -> cost = $_SESSION['cost'];
    $order->stat = 'Заказан';
    //debug($order);
    R::store($order);
    order_create();
}