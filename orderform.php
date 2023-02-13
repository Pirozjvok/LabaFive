<?php
header('Content-Type:text/html;charset=UTF-8');
require_once 'boot.php';
if (array_key_exists("order_info", $_SESSION)){
    unset($_SESSION["order_info"]);
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <title>ЛАДА Автозапчасти</title>
</head>
<body>
<h1> ЛАДА Автозапчасти </h1>
<h2>Форма заказа</h2>
<form action="processorder.php" method=post>
<table style="border: 0px">
<tr bgcolor="#cccccc">
 <td width=150>Название</td>
 <td width=15>Количество</td>
 <td width=7>Цена</td>
 <td >Описание</td>
</tr>
<?php 

$db = dbc();
if (!$db) {
    echo " Ошибка: Не могу соединится с базой данных. Пожалуйста,
   попробуйте еще раз позже.";
    exit;
}
mysql_select_db("automaster");
$query = "select * from items";
$result = mysql_query($query);
$num_results = mysql_num_rows($result);
for ($i = 0; $i < $num_results; $i++)
{
    $row = mysql_fetch_array($result);
    $item_id = $row[0];
    $item_name = $row[1];
    $item_desc = $row[2];
    $item_price = $row[3];
    echo "<tr>
<td>". $item_name ."</td>
<td><input type=\"text\" name=\"item". $item_id ."\" size=3
maxlength=3 value=\"0\"></td>
<td>". $item_price ."</td>
<td>". $item_desc ."</td>
</tr>";
}
?>

<tr>
 <td> Город  </td>
 <td align="center"><input type="text" name="city" size=8
value="Уфа"></td>
</tr>
<tr>
 <td> Улица, дом, подъезд, квартира </td>
 <td align="center"><input type="text" name="house" size=20></td>
</tr>
<tr><td>Как вы нас нашли</td>
 <td><select name="find">
 <option value = "a">Я регулярный покупатель
 <option value = "b">По рекламе из интернета
 <option value = "c">По телефонному справочнику
 <option value = "d">Знакомые рассказали
 <option value = "e">По объявлению на столбе
 </select>
 </td></tr>
<tr>
 <td colspan=2 align="center"><input type=submit value="Отправить
заказ"></td>
</tr>
<tr>
<td colspan=2 align="center">
<input type=reset
 value = Cбpoc >
</td>
</tr>
</table>
<table border = 0 cellpadding = 3>
<tr>
<td bgcolor = "#CCCCCC" align = center>Расстояние</td>
 <td bgcolor = "#CCCCCC" align = center>Стоимость</td>
</tr>
<?
$distance = 50;
while ($distance <= 250 ) {
 echo "<tr>\n <td align = right>$distance</td>\n";
 echo " <td align = right>". ($distance * 2)."</td>\n</tr>\n";
 $distance += 50;
}
?>
</table>
</form>
</body>
</html>