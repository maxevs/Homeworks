<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'bookes';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_select_db($link, "bookes");
mysqli_query($link, "SET NAMES UTF8");
if (!$link) {
  die('Ошибка подключения (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
}
function generateString($length){
  $chars = 'QWERTYUIOPLKJHGFDSAZXCVBNM';
  $numChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
}

for ($k = 1; $k <= 10000; $k++) {           //У мене буде 50 категорій, 10 000 авторів та 300 000 одиниць товару
  $authors_title = generateString(15);
  $authors_bio = generateString(50);
  $sql = "
        insert into authors
            set title = '{$authors_title}',
                bio = '{$authors_bio}'
        ";
  mysqli_query($link, $sql);
}

for ($j = 1; $j <= 300000; $j++) {
  $books_title = generateString(20);
  $books_price = rand(20, 1000);
  $books_category_id = rand(1, 50);
  $sql1 = "
        insert into books
            set title = '{$books_title}',
                price = '{$books_price}',
                category_id = '{$books_category_id}'
        ";
  mysqli_query($link, $sql1);

  $books_authors_book_id = rand(1, 300000);
  $books_authors_author_id = rand(1, 10000);
  $sql2 = "
        insert into books_authors
            set book_id = '{$books_authors_book_id}',
                author_id = '{$books_authors_author_id}'
        ";
  mysqli_query($link, $sql2);
}


for ($n = 1; $n <=50; $n++) {
  $categories_parent_id = rand(1, 50);
  $categories_title = generateString(10);
  $sql3 = "
        insert into categories
            set parent_id = '{$categories_parent_id}',
                title = '{$categories_title}'
        ";
  mysqli_query($link, $sql3);
}


