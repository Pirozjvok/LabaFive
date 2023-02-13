<?php

require_once 'boot.php';


$db = dbc();
if (!$db) {
    echo " Ошибка: Не могу соединится с базой данных. Пожалуйста,
   попробуйте еще раз позже.";
    exit;
}
mysql_select_db("automaster");

$query = "select * from authdata where login = '".$_POST['login']."'";
$result = mysql_query($query);
$num_results = mysql_num_rows($result);
if ($num_results == 0){
    flash('Пользователь с такими данными не зарегистрирован');
    header('Location: /login.php');
    die;
}
$user = mysql_fetch_array($result);

if ($_POST['pass'] == $user[2]) {
    $_SESSION['user_id'] = $user[0];
    if (isset($_SESSION["order_info"])){
        if (isset($_SESSION["order_info"]["from"]) && $_SESSION["order_info"]["from"] == "search")
            header('Location: /buy.php');
        else
            header('Location: /processorder.php');
    } else {
        header('Location: /orderform.php');
    }
    die;
}

flash('Пароль неверен');
header('Location: /login.php');