<?php
if ($_POST["textar"])  {
    $string = $_POST["textar"];
    }
else {
    die ("Заповніть будь ласка поле форми!");
}
function gettop3words ($str) {
    $arr = explode(' ', $str);
    for ($i = 1; $i <= 3; $i++) {
        $item_1 = '';
        $key_1 = 0;
        foreach ($arr as $key => $item) {
            $count = strlen($item);
            $count_1 = strlen($item_1);
            if ($count > $count_1) {
                $item_1 = $item;
                $key_1 = $key;
            }
        }
        echo "{$item_1} <br />";
        unset($arr[$key_1]);
    }
}
gettop3words($string);