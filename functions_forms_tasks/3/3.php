<?php
if ($_POST["n"]) {
    $n = $_POST["n"];
}
else {
    die ("Заповніть будь ласка поле форми!");
}
function deletewords ($number)
{
    $arr = file("exemple.txt"); //робимо з файлу масив
    echo "Це слова в файлі до видалення: <br />";
    $preimpl = implode(' ', $arr); //клеїмо масив в строку через пробіл
    echo "$preimpl <br />";
    $arr = explode(' ', $preimpl); //розбиваємо строку на масив
    foreach ($arr as $key => $item) {
        $count = iconv_strlen($item, "UTF-8"); //рахуємо кількість символів (а не байт) у слові
        if ($count > $number) {
            unset($arr[$key]);
       }
    }
    echo "Це слова в файлі після видалення: <br />";
    $afterimpl = implode(' ', $arr);
    echo $afterimpl;
}
deletewords($n);

