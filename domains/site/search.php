<?php

session_start();
require "libs/db.php";
//http://site
//echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
//alex-kashin-02@mail.ru
//


require_once __DIR__ . '/libs/data.php';
require_once __DIR__ . '/libs/function.php';

$search = load($search);
debug($search);
$_SESSION['search']=$search['search']['value'];
header('Location: catolog.php');