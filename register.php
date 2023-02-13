<?php
header('Content-Type:text/html;charset=UTF-8');
?>
<?php
require_once 'boot.php';
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> ЛАДА Автозапчасти – Регистрация </title>
</head>

<body>
    <?php echo phpversion();?>
    <h1> ЛАДА Автозапчасти – Регистрация</h1>
    <?php flash(); ?>
    <form action="/do_register.php" method="post">
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
                <td>
                    Потверждение пароля:
                </td>
                <td>
                    <input type="password" name="cpass"></input>

                </td>
            </tr>

            <tr>
                <td>
                    Ваше имя:
                </td>
                <td>
                    <input type="text" name="name"></input>
                </td>
            </tr>

            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <input type="text" name="address"></input>
                </td>
            </tr>

            <tr>
                <td>
                    Город:
                </td>
                <td>
                    <input type="text" name="city"></input>
                </td>
            </tr>


            <tr>
                <td colspan=2 align=center>
                    <input type="submit" value="Зарегестрироваться" style="width: 100%"></input>
                </td>
            </tr>

            <tr>
                <td colspan=2 align=center>
                    <input type="reset" value="Сброс" style="width: 100%"></input>
                </td>
            </tr>

        </table>


    </form>
</body>

</html>