<?php
if ($_POST["string"]) {
    $a = $_POST["string"];
}
else {
    die("Заповніть будь ласка поле форми !");
}

function returnstring($a) {
    $count = strlen($a); //рахуємо кількість символів в строці
    $b = ''; //$b присвоюємо пусту строку
    for ($i = $count - 1; $i >= 0; $i--) { //перевертаємо ключі символів у зворотній порядок
        $b .= $a[$i]; //за допомогою конкатенації клеїмо символи у зворотному порядку

    }
    return $b; //вуаля - перевернута строка!!!
//Хоча простіше було б зробити ось так:
    //$rez = strrev($a);
    //return $rez;
}



echo returnstring($a);





