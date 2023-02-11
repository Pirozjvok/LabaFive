<html>
<head>
 <title>ЛАДА Автозапчасти – Результаты заказа</title>
</head>
<body>
<h1> ЛАДА Автозапчасти </h1>
<h2> РЕЗУЛЬТАТЫ ЗАКАЗА </h2>
<?
 $tovar1=$_REQUEST["tovar1"];
 $tovar2=$_REQUEST["tovar2"];
 $tovar3=$_REQUEST["tovar3"];
 $tovar4=$_REQUEST["tovar4"];
 echo "<p>Заказ обработан ";
 echo date("H:i, jS F");
 echo "<br>";
 echo "<p>Ваш заказ составил:";
 echo "<br>";
 echo $tovar1."x Ремень ГРМ<br>";
 echo $tovar2."x Датчик положения коленвала<br>";
 echo $tovar3."x Блок АБС<br>";
 echo $tovar4."x ФАРА<br>";
 $totalqty = 0;
 $totalamount = 0.00;
 define("zena1", 827);
 define("zena2", 413);
 define("zena3", 16000);
 define("zena4", 3100);
 $totalqty = $tovar1 + $tovar2 + $tovar3 + $tovar4;
 $totalamount = $tovar1 * zena1 + $tovar2 * zena2 + $tovar3 * zena3 + $tovar4 * zena4;
 $totalamount = number_format($totalamount, 2);
 echo "<br>\n";
 echo "Всего заказано: ".$totalqty."<br>\n";
 echo "На сумму: ".$totalamount."<br>\n";
 $taxrate = 0.10; // Налог с продаж 10%
 $totalamount = $totalamount * (1 + $taxrate);
 $totalamount = number_format($totalamount, 2);
 echo " С налогом с продаж: ".$totalamount."<br>\n";
?>
</body>
</html>