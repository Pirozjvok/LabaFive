<html>
 <head>
 <title>Вывод на экран и переменные в PHP</title>
 </head>
 <body>
 <?php
 $a = 2;
 $b = 0;
 $c = -2;
 $d = 0;
 $e = 0;
 if ($a >= 0)
    $d += 1;
    else
    $e += 1;
 if ($b >= 0)
    $d += 1;
    else
    $e += 1;
 if ($c >= 0)
    $d += 1;
    else
    $e += 1;
 echo "<br>".$d;
 echo "<br>".$e;
 ?>
 </body>
</html>