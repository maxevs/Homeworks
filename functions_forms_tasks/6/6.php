<?php
define('DS', DIRECTORY_SEPARATOR);
$dir = __DIR__.DS.'gallery';
if (! is_dir($dir)) {
    mkdir($dir);
}
if ($_FILES && isset($_FILES['photo'])) {
    foreach ($_FILES["photo"]["error"] as $key => $error) {
        if ($error == 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"][$key];
            $scandir = scandir($dir);
            $count = count($scandir) - 1;
            $name = $_FILES["photo"]["name"][$key];
            $strpos = strpos($name, '.');
            $substr = substr($name, $strpos);
            move_uploaded_file($tmp_name, "$dir/$count$substr");
        }
    }
}
$arr = scandir($dir);
?>

<table width="80%" border="2" bordercolor="black">
    <tr>
        <?php foreach ($arr as $key => $item) {
        if ($key > 1) { //так як scandir($dir видає ще 2 додаткові елементи масиву - поточний і родинний корінь
        ?>
            <td><img src="<?="gallery/{$arr{$key}}"; ?>" />
        <?php $key -=1; // це щоб можна було ділити на 3
        if ($key % 3 === 0) { // виводимо по 3 елементи в строкі таблиці
        ?>
    </tr>
        <?php } ?>
        <?php } ?>
        <?php } ?>
            </td>
</table>







