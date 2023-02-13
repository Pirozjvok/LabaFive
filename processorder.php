<?php
header('Content-Type:text/html;charset=UTF-8');
require_once 'boot.php';
if (check_auth()) {
   // Получим данные пользователя по сохранённому идентификатору
   if (!array_key_exists("order_info", $_SESSION)){
      $_SESSION["order_info"] = $_POST;
   }
}
else{
   flash("Для заказа нужно авторизоваться. (Данные о заказе сохранены)");
   header('Location: /login.php');
   $_SESSION["order_info"] = $_POST;
}
?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <title>ЛАДА Автозапчасти – Результаты заказа</title>
</head>
<body>
<h1> ЛАДА Автозапчасти </h1>
<h2> РЕЗУЛЬТАТЫ ЗАКАЗА </h2>
<?
$order =   $_SESSION["order_info"];
$user_id = $_SESSION['user_id'];

$db = dbc();
if (!$db) {
    echo " Ошибка: Не могу соединится с базой данных. Пожалуйста,
   попробуйте еще раз позже.";
    exit;
}
mysql_select_db("automaster");
$query = "select * from customers where customerid = ".$user_id;
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$user_name = $row[1];
$user_address = $row[2];
$user_city = $row[3];

$dist_arr = array(
    "уфа" => 0,
    "стерлитамак" => 128,
    "салават" => 162,
    "ташкиново" => 206,
    "нефтекамск" => 216,
 );

 $city = strtolower($user_city);

 if (array_key_exists($city, $dist_arr) == false)
 {
    echo "<p>Извините, но мы не можем доставить заказ в ваш город";
    die();
 }
 
 $dist = $dist_arr[$city];


 $items = array();
 $items_list = array();

$query = "select * from items";
$result = mysql_query($query);
$num_results = mysql_num_rows($result);
for ($i = 0; $i < $num_results; $i++)
{
    $row = mysql_fetch_array($result);
    $items_info = array(
      "id" => $row[0],
      "name" => $row[1],
      "desc" => $row[2],
      "price" => $row[3]
    );
    $items_list[$i] = $items_info;
}

 foreach ($order as $k => $v) {
   if (substr( $k, 0, 4 ) === "item"){
      if (intval($v) > 0)
         $items[intval(substr( $k, 4))] = intval($v);
   }
 }
 
 
 $mysql_date = date("Y-m-d H:i:s");
 foreach ($items as $k => $v) {
   $query = "insert into orders values (0, $user_id, $amount, $mysql_date, $k, $v)";
   $result = mysql_query($query);
   $row = mysql_fetch_array($result);
 }
 

  
 $tovar1=$_REQUEST["tovar1"];
 $tovar2=$_REQUEST["tovar2"];
 $tovar3=$_REQUEST["tovar3"];
 $tovar4=$_REQUEST["tovar4"];
 $totalqty = 0;
 $totalamount = 0.00;
 define("zena1", 827);
 define("zena2", 413);
 define("zena3", 16000);
 define("zena4", 3100);
 $totalqty = $tovar1 + $tovar2 + $tovar3 + $tovar4;

if( $totalqty == 0 ) {
    echo "Вы ничего не выбрали в заказе!<br>";
    exit;
}

$date=date("H:i, jS F");

echo "<p>Заказ обработан ";
echo $date;
echo "<br>";
echo "<p>Ваш заказ составил:";
echo "<br>";
echo $tovar1."x Ремень ГРМ<br>";
echo $tovar2."x Датчик положения коленвала<br>";
echo $tovar3."x Блок АБС<br>";
echo $tovar4."x ФАРА<br>";

 $totalamount = $tovar1 * zena1 + $tovar2 * zena2 + $tovar3 * zena3 + $tovar4 * zena4;

 //Если сумма больше 1000 до скидка 5%

$address = $_REQUEST["city"] . ", " . $_REQUEST["house"];

 echo "<br>\n";
 echo "Всего заказано: ".$totalqty."<br>\n";
 echo "На сумму: ".number_format($totalamount, 2)."<br>\n";
 echo "<P>Адрес доставки ".$address."<br>\n";
 $taxrate = 0.10; // Налог с продаж 10%
 $totalamount = $totalamount * (1 + $taxrate);
 $skidka = 0;
 if ($totalamount >= 1000){
    $skidka = $totalamount * 0.05;
 }
 echo " С налогом с продаж ".number_format($totalamount, 2)."<br>\n";
 echo "Скидка: ".number_format($skidka, 2)."<br>\n";

 $delivery = floor($dist / 50) * 100;
 $totalamount = $totalamount - $skidka + $delivery;
 echo " Доставка: ".$delivery."<br>\n";
 echo " Итог ".number_format($totalamount, 2)."<br>\n";

switch($_REQUEST["find"]) {
 case "a" :
 echo "<P>Регулярный покупатель.";
 break;
 case "b" :
 echo "<P>Покупатель увидел рекламу о нас в интернете.";
 break;
 case "c" :
 echo "<P> Покупатель нашел нас по телефонному справочнику.";
 break;
 case "d" :
 echo "<P>Покупатель узнал о нас от знакомых.";
 break;
 case "d" :
    echo "<P>Покупатель узнал о нас из обьявления на столбе.";
    break;
 default :
 echo "<P>Мы на знаем как нашел нас покупатель.";
 break; }

 $outputstring = $date."\t".$tovar1."x Ремень ГРМ\t".$tovar2."x Датчик положения " .
 "коленвала\t"
  .$tovar3."x Блок АБС\t".$tovar4 ."x ФАРА\t Итог:" . $totalamount . "\t". $address ."\n";

 @$fp = fopen("orders.txt", "a");
 flock($fp, 2);
 if (!$fp) {
 echo "<p><strong> Заказ не может быть записан сейчас. "
 ."Пожалуйста, попробуйте еще раз
позже.</strong></p></body></html>";
 exit;
 }
 fwrite($fp, $outputstring);
 flock($fp, 3);
 fclose($fp);
?>
</body>
</html>