1. Добавить в проект с прошлого урока текстовое поле для ввода названия файла и кнопку
"Добавить страницу". Добавить это в файл admin.php вверху страницы. Когда пользователь кликает
"Добавить страницу", в папке pages должен создаться файл с названием, которое было указано в
текстовом поле. Таким образом, надо реализовать добавление новых текстовых страниц на сайт.
<br />
<br />
<form action="" method="get">
<label for="name">Введіть назву файлу з розширенням, який Ви хочете додати до свого проекту:</label>
<input name="name" type="text" id="name" />
    <input type="submit" value="Додати сторінку">
</form>
<br /><br /><br />


<?php
if (isset($_GET['name']) && $_GET['name']) {
    $need_file = 'pages' . DIRECTORY_SEPARATOR.$_GET['name'];
    $new_file = fopen($need_file, 'a+');
    fclose($new_file);
}
function getTextPages(){
    // Папка с текстовыми страницами
    $dir = 'pages' . DIRECTORY_SEPARATOR;
    foreach (glob("{$dir}*.php") as $filename) {
        $arr[] = $filename;
    }
    return $arr;
}
// Список файлов
$files_list = getTextPages();
// Имя файла
$filename = null;
/*
	1. Гет параметр файла задан?
		1.1. Да, задан: проверить, что он существует
		1.1.1. Файл задан в гет параметра и он существует
		1.1.2. Файл задан в гет параметра и он НЕ существует
		1.2. Нет, не задан
*/
if ( isset($_GET['filename']) ){
    if ( in_array($_GET['filename'], $files_list) ){ // Если файл правильный и существует в списке
        $filename = $_GET['filename'];
    } else { // Файл передали в ГЕТ параметрах, но он не существует в списке
        die('Неправильный файл');
    }
} // После этой строчки мы всегда доверяем $filename
if ( isset($_POST['text']) ){
    file_put_contents($filename, $_POST['text']);
}
$show_textarea = 0;
if ( $filename ){
    $show_textarea = 1;
    $text = file_get_contents($filename);
}
/*
<?php if($filename==$fn){ ?>selected="selected"<?php }?>
*/
?>

    Какую страницу вы хотите отредактировать? <br>
    <form method="get" action="">
        <select name="filename">
            <?php  foreach($files_list as $fn){ ?>

                <?php
                /*$selected = '';
                if( $filename == $fn ){
                    $selected = 'selected="selected"';
                } */
                ?>

                <?php $selected = ($filename == $fn) ? 'selected="selected"' : ''; ?>

                <option value="<?=$fn?>" <?=$selected?>><?=$fn?></option>
            <?php } ?>
        </select> <br>
        <input type="submit" value="Редактировать эту страницу" />
    </form>

<?php if ( $show_textarea ){ ?>
    <form method="post" action="">
        <input type="submit" value="Сохранить" />
        <textarea name="text" style="width:100%; height:400px;"><?=$text?></textarea>
        <input type="submit" value="Сохранить" />
    </form>
<?php } ?>