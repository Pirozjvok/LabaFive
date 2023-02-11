<html>
 <head>
 <title>Вывод на экран и переменные в PHP</title>
 </head>
 <body>
 <?php
 $a = 0;
 if ($a > 0){
    $a += 1;
 } 
 if ($a < 0){
    $a -= 2;
 }
 if ($a == 0){
    $a = 10;
 }
 echo "<br>".$a;
 ?>
 </body>
</html>