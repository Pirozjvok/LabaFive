<html>
 <head>
 <title>Вывод на экран и переменные в PHP</title>
 </head>
 <body>
 <?php
 $a = 2;
 $b = 3;
 $c = -5;
 $d = 0;
 if ($a >= 0)
    $d += 1;
 if ($b >= 0)
    $d += 1;
 if ($c >= 0)
    $d += 1;
 echo "<br>".$d;
 ?>
 </body>
</html>