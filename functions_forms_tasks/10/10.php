<?php
if ($_POST["textar"]) {
    $a = $_POST["textar"];
}
else {
    die("Заповніть будь ласка поле форми !");
}

function myfunction($a) {
    $needarr = array(); //створюємо пустий масив, куди будемо записувати введені слова

    $expl = explode(' ', $a); //розбиваємо введену строку на масив (в якості розділювача - пробіл)

    foreach ($expl as $item) {
       $needarr[] = $item;
        }

    $rezult = array_unique($needarr); //перевіряємо унікальність введених слів
    $count = count($rezult);
    return $count;
}


echo myfunction($a);





