<?php
$db_host = 'localhost';
$db_user = 'internet_shop';
$db_pass = 'internet_shop';
$db_name = 'internet_shop';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_query($link, "SET NAMES UTF8");
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}