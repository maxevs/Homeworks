<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Задача 5</title>
</head>
<body>
<?php
echo "5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
Директория и искомое слово задаются как параметры функции. <br /> <br />";

function listfiles($dir, $needword) {
    $fileslist = scandir($dir);
        foreach ($fileslist as $item) {
            $item = iconv("windows-1251", "utf-8", $item);
            $pozishn = strpos ($item, $needword);
            if ($pozishn || $pozishn === 0) {  //якщо true або позиція ідентична 0 (тобто 1-ший символ в строці)
                echo "{$item} <br />";
            }
        }
}
$dir = 'examples'; //це мій приклад, сюди можна записати будь-яку директорію
$needword = 'т';
listfiles($dir, $needword);
?>
</body>
</html>

