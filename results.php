<?php
require_once 'boot.php';
header('Content-Type:text/html;charset=UTF-8');
if (isset($_SESSION["order_info"])){
    unset($_SESSION["order_info"]);
 }
?>
<html><head>
 <title> ЛАДА Автозапчасти – Результат поиска </title>
</head>
<body>
<h1> ЛАДА Автозапчасти – Результат поиска </h1>
<?
 $searchterm = $_REQUEST['searchterm'];
 if (!$searchterm) {
 echo "Вы не ввели условия поиска. Пожалуйста. Попробуйте снова.";
 exit;
 }
 $searchterm = addslashes($searchterm);
 @ $db = mysql_pconnect("localhost", "root", "");
 if (!$db) {
 echo " Ошибка: Не могу соединится с базой данных. Пожалуйста,
попробуйте еще раз позже.";
 exit;
 }
 mysql_set_charset('utf8', $db);
 mysql_select_db("automaster");
 $query = "select * from items where name like '%".$searchterm."%'";
 $result = mysql_query($query);
 $num_results = mysql_num_rows($result);
 echo "<p>Число найденных товаров: ".$num_results."</p>";
 for ($i=0; $i <$num_results; $i++) {
 $row = mysql_fetch_array($result);
 echo "<p><strong>".($i+1).". Название: ";
 echo stripslashes($row[1]);
 echo "</strong><br>Описание: ";
 echo stripslashes($row[2]);
 echo "<br>Цена: ";
 echo stripslashes($row[3]);
 echo "<br><form action=\"/buy.php\" method=\"post\">
 <input type=\"text\" name=\"count\" value=\"0\">
 <input type=\"hidden\" name=\"item\" value=\"". $row[0] ."\">
 <input type=\"hidden\" name=\"from\" value=\"search\">
 <input type=\"submit\" value=\"Заказать\">
 </form>";
 echo "</p>";
 }
?>
</body></html>