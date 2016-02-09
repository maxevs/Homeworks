<?php
if ($_POST["textar"] && $_POST["textar_1"]) {
    $a = $_POST["textar"];
    $b = $_POST["textar_1"];
}
else {
    die("Заповніть будь ласка поля форми !");
}

function getCommonWords($a, $b) {
    $common = array(); //створюємо пустий масив, куди будемо записувати слова, що повторюються

    $expl_1 = explode(' ', $a); //розбиваємо першу введену строку на масив (в якості розділювача - пробіл)
    $expl_2 = explode(' ', $b); //розбиваємо другу введену строку на масив (в якості розділювача - пробіл)

    foreach ($expl_1 as $item_1) {
        foreach ($expl_2 as $item_2) {
            if ($item_2 === $item_1) {
                $common[] = $item_2;
            }
        }
    }
    $rezult = array_unique($common); //щоб не повторювались слова в результаті
    echo "<pre>";
    print_r($rezult);
    echo "</pre>";

}
getCommonWords($a, $b);





