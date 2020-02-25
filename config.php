<?php
// ваши данные
$db_server='localhost';
$db_database='clients';
$db_user='root';
$db_password='';

//соединение с базой
$connection=mysqli_connect($db_server,
$db_user, $db_password, $db_database);
mysqli_select_db($connection, "clients");
//контроль соединения
if (!$connection){
die ("Не удается подключиться к базе данных");
}

date_default_timezone_set('Europe/Tallinn');
$connection->set_charset('utf8');
?>
