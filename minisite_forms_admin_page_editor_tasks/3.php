3. Сохранить массив пунктов меню в сериализованном виде в файле menu.dat. Создать функцию
getMenu для получения массива пунктов меню из текстового файла menu.dat. Переделать пункт 2,
чтобы массив получался из текстового файла. Использовать serialize / unserialize.

<?php
require_once "lib.php";
$arr = array('red', 'green', 'blue', 'yellow', 'orange');
$rand_key = array_rand($arr);
$color = $arr[$rand_key];
$arr = array(
    'item' => array('url' => '?act=main', 'title' => 'Главная'),
    'item_1' => array('url' => '?act=about', 'title' => 'О компании'),
    'item_2' => array('url' => '?act=products', 'title' => 'Товары'),
    'item_3' => array('url' => '?act=contact', 'title' => 'Контакты'),
);
$serialize = serialize($arr);
$need_file = fopen("menu.dat", "w+");
fwrite($need_file, $serialize);
fclose($need_file);
function getMenu($argumet) {
    $arr_1 = unserialize($argumet);
    return $arr_1;
}
$arr_2 = getMenu($serialize);
?>
<h1>Главное меню</h1><br>
<?php
foreach ($arr_2 as $key => $value) {
    foreach ($value as $key_1 => $value_1) {
        if ($key_1 === 'url') {?>
            <a href="<?=$value_1 ;?>"> <?php }; ?>
        <?php if ($key_1 === 'title') {?>
            <?=$value_1; ?></a> <?php }; ?>
    <?php }; ?>
<?php }; ?>

<br>

<?php
$filename = 'main.php';
if ( isset($_GET['act']) ){
    $filename = $_GET['act'].'.php';
}

$filename = 'pages' . DIRECTORY_SEPARATOR . $filename;

//include_once($filename);
//include_once $filename;
require $filename;
?>

<br>
<h1>Подвал сайта</h1>