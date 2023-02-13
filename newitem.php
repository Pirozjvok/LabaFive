<?php
header('Content-Type:text/html;charset=UTF-8');
?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title> ЛАДА Автозапчасти – Добавление товаров </title>
    </head>
    <body>
    <h1> ЛАДА Автозапчасти – Добавление товаров </h1>
    <form action="insert_item.php" method="post" accept-charset="utf-8">
    <table border=0>
     <tr><td>Название</td><td><input type=text name=name maxlength=30
    size=30><br> </td> </tr>
     <tr><td>Описание</td><td> <input type=text name=desc maxlength=60
    size=30> <br> </td> </tr>
     <tr><td>Цена</td><td><input type=text name=price maxlength=7
    size=7><br> </td></tr>
     <tr><td colspan=2><input type=submit value="Записать"></td></tr>
     </table>
     </form>
    </body>
</html>