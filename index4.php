<html>
 <head>
 <title>����� �� ����� � ���������� � PHP</title>
 </head>
 <body>
 <?php
 $A = -2;
 $B = 10;
foreach (range($A, $B) as $i){ 
    if ($i % 2 == 0)
    {
        echo "<br>".$i;
    }
}
 ?>
 </body>
</html>