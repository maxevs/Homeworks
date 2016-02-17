4. Создать редактор пунктов меню. Поместить его в файл admin_menu.php. Считывать и записывать
пункты меню в файле menu.dat. Использовать serialize / unserialize.

<?php
require_once "lib.php";
$arr = array('red', 'green', 'blue', 'yellow', 'orange');
$rand_key = array_rand($arr);
$color = $arr[$rand_key];
?>
<br /><br /><br />
<form action="" method="get">
<label for="name">Додайте пункт меню</label>
<input name="name" type="text" id="name" placeholder="Додайте пункт меню" />
<br />
<br />
<label for="link">Введіть назву файлу,на який буде посилатись пункт меню</label>
<input name="link" type="text" id="link" placeholder="Введіть назву файлу,на який буде посилатись пункт меню" />
<br />
<br />
<input type="submit" value="Додати пункт меню разом з посиланням">
</form>
<br /><br />

<br /><br />
<form action="" method="get">
    <label for="name_1">Видаліть пункт меню</label>
    <input name="name_1" type="text" id="name_1" placeholder="Видаліть пункт меню" />
    <br />
    <br />
    <input type="submit" value="Видалити пункт меню">
</form>
<br /><br /><br /><br />

<?php
$file = file_get_contents("menu.dat");
$arr = unserialize($file);
if (isset($_GET['name']) && isset($_GET['link']) && $_GET['name'] && $_GET['link']) {
    $arr[] = array('url' =>"?act={$_GET['link']}", 'title' => $_GET['name']);
}
else {
    echo "Заповніть будь ласка обидва поля форми";
}
$serialize = serialize($arr);
$need_file = fopen("menu.dat", "w+");
fwrite($need_file, $serialize);
fclose($need_file);

if (isset($_GET['name_1']) && $_GET['name_1']) {
    $arr = unserialize($file);
    foreach ($arr as $key => $value) {
        foreach ($value as $key_1 => $value_1) {
            if ($value_1 === $_GET['name_1']) {
                unset($arr[$key]);
            }
        }
    }
}
$serialize = serialize($arr);
$need_file = fopen("menu.dat", "w+");
fwrite($need_file, $serialize);
fclose($need_file);
?>
<h1>Главное меню</h1><br>
<?php
foreach ($arr as $key => $value) {
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