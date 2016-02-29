1) Добавить таблицу books_in_the_store в которой будет храниться информация информация о книгах, которые продаются.
Там например должна быть колонка "количество книг на складе".

2) В php-скрипте вывести что хранится на складе на странице в браузере.
<br />
<br />

<?php
$con = mysqli_connect("localhost", "root", "", "books");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM books_in_the_store ORDER BY store_emaunt";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    echo "Номер: ".$row['id']."<br />";
    echo "Назва книги: ".$row['book_name']."<br />";
    echo "Кількість на складі: ".$row['store_emaunt']."<br /><hr />";
}
mysqli_free_result($result);
mysqli_close($con);
