<?php

// Инициализируем сессию
session_start();

// Простой способ сделать глобально доступным подключение в БД
function dbc()
{
        @ $db = mysql_pconnect("localhost", "root", "");
        @ mysql_set_charset('utf8', $db);
        return $db;
}

function flash($message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
          <div class="alert alert-danger mb-3">
          <p style="color:red;"><?=$_SESSION['flash']?></p>
          </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

function check_auth()
{
    if ($_SESSION['user_id'])
        return true;
    else
        return false;
}