<html>
 <head>
 <title>����� �� ����� � ���������� � PHP</title>
 </head>
 <body>
 <?php
 $a = -2;
 $b = 10;
 $c = 5;
 $m = $a;
 if ($b >= $m)
 {
    $m = $b;
 }
    
 if ($c >= $m){
    $m = $c;
 }
    
 echo "<br>".$m;
 ?>
 </body>
</html>