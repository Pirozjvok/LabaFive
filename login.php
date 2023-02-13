<?php
header('Content-Type:text/html;charset=UTF-8');
?>
<?php
require_once 'boot.php';
?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title> ЛАДА Автозапчасти – Вход </title>
    </head>
    <body>
    <h1> ЛАДА Автозапчасти – Вход</h1>
    <?php flash(); ?>
<form action="/do_login.php" method="post">
<table>
<tr>
    <td>
    Логин: 
    </td>
    <td>
    <input type="text" name="login"></input>
    </td>
</tr>

<tr>
    <td>
    Пароль: 
    </td>
    <td>
    <input type="password" name="pass"></input>

    </td>
</tr>

<tr>
    <td colspan=2 align=center>
    <input type="submit" value="Вход" style="width: 100%"></input>
    </td>
</tr>

<tr>
    <td colspan=2 align=center>
    <input type="reset" value="Сброс" style="width: 100%"></input>
    </td>
</tr>

<tr>
    <td colspan=2 align=center>
    <a href="/register.php">Я еще не зарегестрировался</a>
    </td>
</tr>



</table>


</form>
</body>
</html>