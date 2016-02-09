<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Задача 4</title>
</head>
<body>
<?php
echo "4. Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр
функции.";

function listfiles($dir) {
    $fileslist = scandir($dir);
        foreach ($fileslist as $item) {
        echo "{$item} <br />";
    }
}
$dir = 'examples'; //це мій приклад, сюди можна записати будь-яку директорію
listfiles($dir);
?>
</body>
</html>

