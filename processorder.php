<html>
<head>
 <title>���� ������������ � ���������� ������</title>
</head>
<body>
<h1> ���� ������������ </h1>
<h2> ���������� ������ </h2>
<?
 $tovar1=$_REQUEST["tovar1"];
 $tovar2=$_REQUEST["tovar2"];
 $tovar3=$_REQUEST["tovar3"];
 $tovar4=$_REQUEST["tovar4"];
 echo "<p>����� ��������� ";
 echo date("H:i, jS F");
 echo "<br>";
 echo "<p>��� ����� ��������:";
 echo "<br>";
 echo $tovar1."x ������ ���<br>";
 echo $tovar2."x ������ ��������� ���������<br>";
 echo $tovar3."x ���� ���<br>";
 echo $tovar4."x ����<br>";
 $totalqty = 0;
 $totalamount = 0.00;
 define("zena1", 827);
 define("zena2", 413);
 define("zena3", 16000);
 define("zena4", 3100);
 $totalqty = $tovar1 + $tovar2 + $tovar3 + $tovar4;
 $totalamount = $tovar1 * zena1 + $tovar2 * zena2 + $tovar3 * zena3 + $tovar4 * zena4;

 //���� ����� ������ 1000 �� ������ 5%



 echo "<br>\n";
 echo "����� ��������: ".$totalqty."<br>\n";
 echo "�� �����: ".number_format($totalamount, 2)."<br>\n";
 $taxrate = 0.10; // ����� � ������ 10%
 $totalamount = $totalamount * (1 + $taxrate);
 $skidka = 0;
 if ($totalamount >= 1000){
    $skidka = $totalamount * 0.05;
 }
 echo " � ������� � ������ ".number_format($totalamount, 2)."<br>\n";
 echo "������: ".number_format($skidka, 2)."<br>\n";
 $totalamount = $totalamount - $skidka;
 echo " ���� ".number_format($totalamount, 2)."<br>\n";
?>
</body>
</html>