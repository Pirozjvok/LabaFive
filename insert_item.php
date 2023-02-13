<?php
header('Content-Type:text/html;charset=UTF-8');
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title> ЛАДА Автозапчасти – Результат добавления товаров </title>
</head><body>
<h1> ЛАДА Автозапчасти – Результат добавления товаров</h1>
<?
$name = $_REQUEST["name"];
$description = $_REQUEST["desc"];
$price = $_REQUEST["price"];

if (!$name || !$description || !$price) {
 echo "Вы внесли не все данные для ввода.<br>"
 ."Пожалуйста, вернитесь и попробуйте снова.";
 exit;
 }
 
 $name = addslashes($name);
 $description = addslashes($description);
 $price = doubleval($price);
 @ $db = mysql_pconnect("localhost", "root", "");
 if (!$db) {
 echo "Ошибка: Не могу соединится с базой данных. Пожалуйста,
попробуйте еще раз позже.";
 exit;
 }
 mysql_set_charset('utf8', $db);
 mysql_select_db("automaster");

 $query = "insert into items values (0, '".$name."', '".$description."',
'".$price."')";
 $result = mysql_query($query);
 if ($result)
 echo mysql_affected_rows()." товаров добавлено в базу.";
?>
</body></html>