
<?php
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_COOKIE['count'])) {
    $count = (int)$_COOKIE['count'];
}
else {$count = 0;}
$count++;
setcookie('count', $count, time() + 60);
if ($count > 3) {
    exit ("Ви не можете відправити форму більше 3-х разів за хвилину!
    Будь ласка зачекайте хвилину, а потім знову можете заповнювати поля форми!");
}
header("Location: /Git_folder/include_require_cookies_ob_start_tasks/1/1.html");


