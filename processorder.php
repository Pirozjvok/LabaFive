<html>
<head>
 <title>���� ������������ � ���������� ������</title>
</head>
<body>
<h1> ���� ������������ </h1>
<h2> ���������� ������ </h2>
<?


$dist_arr = array(
    "���" => 0,
    "�����������" => 128,
    "�������" => 162,
    "���������" => 206,
    "����������" => 216,
 );

 $city = strtolower($_REQUEST["city"]);

 if (array_key_exists($city, $dist_arr) == false)
 {
    echo "<p>��������, �� �� �� ����� ��������� ����� � ��� �����";
    die();
 }
 
 $dist = $dist_arr[$city];

 
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
    echo "�� ������ �� ������� � ������!<br>";
    exit;
}

$date=date("H:i, jS F");

echo "<p>����� ��������� ";
echo $date;
echo "<br>";
echo "<p>��� ����� ��������:";
echo "<br>";
echo $tovar1."x ������ ���<br>";
echo $tovar2."x ������ ��������� ���������<br>";
echo $tovar3."x ���� ���<br>";
echo $tovar4."x ����<br>";

 $totalamount = $tovar1 * zena1 + $tovar2 * zena2 + $tovar3 * zena3 + $tovar4 * zena4;

 //���� ����� ������ 1000 �� ������ 5%

$address = $_REQUEST["city"] . ", " . $_REQUEST["house"];

 echo "<br>\n";
 echo "����� ��������: ".$totalqty."<br>\n";
 echo "�� �����: ".number_format($totalamount, 2)."<br>\n";
 echo "<P>����� �������� ".$address."<br>\n";
 $taxrate = 0.10; // ����� � ������ 10%
 $totalamount = $totalamount * (1 + $taxrate);
 $skidka = 0;
 if ($totalamount >= 1000){
    $skidka = $totalamount * 0.05;
 }
 echo " � ������� � ������ ".number_format($totalamount, 2)."<br>\n";
 echo "������: ".number_format($skidka, 2)."<br>\n";

 $delivery = floor($dist / 50) * 100;
 $totalamount = $totalamount - $skidka + $delivery;
 echo " ��������: ".$delivery."<br>\n";
 echo " ���� ".number_format($totalamount, 2)."<br>\n";

switch($_REQUEST["find"]) {
 case "a" :
 echo "<P>���������� ����������.";
 break;
 case "b" :
 echo "<P>���������� ������ ������� � ��� � ���������.";
 break;
 case "c" :
 echo "<P> ���������� ����� ��� �� ����������� �����������.";
 break;
 case "d" :
 echo "<P>���������� ����� � ��� �� ��������.";
 break;
 case "d" :
    echo "<P>���������� ����� � ��� �� ���������� �� ������.";
    break;
 default :
 echo "<P>�� �� ����� ��� ����� ��� ����������.";
 break; }

 $outputstring = $date."\t".$tovar1."x ������ ���\t".$tovar2."x ������ ��������� " .
 "���������\t"
  .$tovar3."x ���� ���\t".$tovar4 ."x ����\t ����:" . $totalamount . "\t". $address ."\n";

 @$fp = fopen("orders.txt", "a");
 flock($fp, 2);
 if (!$fp) {
 echo "<p><strong> ����� �� ����� ���� ������� ������. "
 ."����������, ���������� ��� ���
�����.</strong></p></body></html>";
 exit;
 }
 fwrite($fp, $outputstring);
 flock($fp, 3);
 fclose($fp);
?>
</body>
</html>