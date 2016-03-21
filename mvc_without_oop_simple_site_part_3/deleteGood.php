<?php
require_once "db_connect.php";


if ( $_POST ) {
    $name = mysqli_escape_string($link, $_POST['name']);
    $price = (float)$_POST['price'];
    $photo = mysqli_escape_string($link, $_POST['photo']);

    if (isset($_POST['id'])) {
        $id = (int)$_POST['id'];
        $sql = "
        delete from goods
        where id = {$_POST['id']}
        ";
        mysqli_query($link, $sql);
    }
}

//Вибір всіх товарів
$sql = "select * from goods";
$result = mysqli_query($link, $sql);

$goods_list = array();
while($row = mysqli_fetch_assoc($result)) {
    $goods_list[] = $row;
}

// and user_id = $_SESSION['user_id'] - умова щоб перевіряти чи юзер міняє САМЕ СВОЇ дані

if (empty($goods_list)) {
    die('Nothing to do');
}

foreach($goods_list as $good) {
    ?>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?=$good['id']?>" /><br>
        <input type="text" name="name" value="<?=$good['name']?>" /><br>
        <input type="text" name="price" value="<?=$good['price']?>" /><br>
        <input type="text" name="photo" value="<?=$good['photo']?>" /><br>
        <input type="submit" value="Видалити товар" />
    </form>
    <br><br>
    <?php
}
?>

