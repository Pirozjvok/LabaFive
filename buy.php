<?php
header('Content-Type:text/html;charset=UTF-8');
require_once 'boot.php';
$data = null;
if (check_auth()) {
   // Получим данные пользователя по сохранённому идентификатору
   if (!isset($_SESSION["order_info"])){
    $data = $_POST;
   }
   else{
    $data = $_SESSION["order_info"];
   }
}
else{
    $_SESSION["order_info"] = $_POST;
    flash("Для заказа нужно авторизоваться. (Данные о заказе сохранены)");
    header('Location: /login.php');
}
?>


<?php 

$db = dbc();
if (!$db) {
    echo " Ошибка: Не могу соединится с базой данных. Пожалуйста,
   попробуйте еще раз позже.";
    exit;
}
mysql_select_db("automaster");
$query = "select * from items where itemid=".intval($data["item"]);
$result = mysql_query($query);
$num_results = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$price = $row[3];
$itemn = $row[1];
$item_id = intval($data["item"]);
$cnt = $data["count"];

$user_id = $_SESSION['user_id'];
$mysql_date = date("Y-m-d H:i:s");
$query = "insert into orders values (0, ".$user_id.", ".$price.", '".$mysql_date. "', " .$item_id. ", " .$cnt. ")";
$result = mysql_query($query);

if ($result){
    echo "<h1>Успешно</h1>";
    echo "<h2>".$itemn." x" . $cnt. "</h2>";
} else{
    echo "<h1>Ошибка</h1>";
}
?>