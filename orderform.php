<html>
<head>
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
</tr>
<tr>
 <td> Ремень ГРМ</td>
 <td align="center"><input type="text" name="tovar1" size=3
maxlength=3 value="0"></td>
</tr>
<tr>
 <td> Датчик положения коленвала</td>
 <td align="center"><input type="text" name="tovar2" size=3
maxlength=3 value="0"></td>
</tr>
<tr>
 <td> Блок АБС  </td>
 <td align="center"><input type="text" name="tovar3" size=3
maxlength=3 value="0"></td>
</tr>
<tr>
<tr>
 <td> ФАРА  </td>
 <td align="center"><input type="text" name="tovar4" size=3
maxlength=3 value="0"></td>
</tr>
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
