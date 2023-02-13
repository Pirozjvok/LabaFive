<?php

require_once 'boot.php';

// Проверим, не занято ли имя пользователя


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

if ($num_results > 0) {
    flash("Этот логин уже занят.");
    header('Location: /register.php'); // Возврат на форму регистрации
    die; // Остановка выполнения скрипта
}

if ($_POST["pass"] != $_POST["cpass"]){
    flash("Пароли не совпадают.");
    header('Location: /register.php'); // Возврат на форму регистрации
    die; // Остановка выполнения скрипта
}


$query = "insert into customers VALUES (0, '". $_POST["name"] . "', '".$_POST["address"]."', '".$_POST["city"]."')";
$result = mysql_query($query);

$id = mysql_insert_id($db);

$pass = $_POST['pass'];
$query = "insert into authdata VALUES (".$id.", '". $_POST["login"] . "', '".$pass."')";
$result = mysql_query($query);

if ($result)
{
    header('Location: login.php');
} else{
    echo "Pizdec";
}
