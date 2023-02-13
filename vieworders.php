<?php
header('Content-Type:text/html;charset=UTF-8');
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <title>ЛАДА Автозапчасти – Результаты заказа</title>
</head><body>
<h1> ЛАДА Автозапчасти </h1>
<h2> РЕЗУЛЬТАТЫ ЗАКАЗА </h2>
<?
//Чтение файла. Каждая строка становится элементом массива.
$orders= file("orders.txt");
$number_of_orders = count($orders);// подсчет числа строк в массиве
if ($number_of_orders == 0) {
 echo "<p><strong> Заказ не может быть прочитан. "
 ."Пожалуйста, попробуйте еще раз
позже.</strong></p></body></html>";
 exit;
}
 echo "<table border=1>\n";
 echo "<tr><th bgcolor = \"#CCCCFF\">Дата заказа</td>
 <th bgcolor = \"#CCCCFF\">Ремень ГРМ</td>
 <th bgcolor = \"#CCCCFF\">Датчик положения коленвала</td>
 <th bgcolor = \"#CCCCFF\">Блок АБС</td>
 <th bgcolor = \"#CCCCFF\">ФАРА</td>
 <th bgcolor = \"#CCCCFF\">Сумма заказа</td>
 <th bgcolor = \"#CCCCFF\">Адрес</td>
 <tr>";
 for ($i=0; $i<$number_of_orders; $i++) {
 //азбиение каждой строки
 $line = explode( "\t", $orders[$i] );
 // сохраняет только числа из первых трех элементов строки
 $line[1] = intval( $line[1] );
 $line[2] = intval( $line[2] );
 $line[3] = intval( $line[3] );
 $line[4] = intval( $line[4] );
 // выводит каждый заказ
 echo "<tr><td>$line[0]</td>
 <td align = right>$line[1]</td>
 <td align = right>$line[2]</td>
 <td align = right>$line[3]</td>
 <td align = right>$line[4]</td>
 <td align = right>$line[5]</td>
 <td>$line[6]</td>
 </tr>";
 }
 echo "</table>";
?>
</body> </html> 