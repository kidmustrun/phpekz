<?php


$mysqli = mysqli_connect('std-mysql', 'std_933', 'Apokalipsis', 'std_933');
if( mysqli_connect_errno() ) // если при подключении к серверу произошла ошибка
{
// выводим сообщение и принудительно останавливаем РНР-программу
echo 'Ошибка подключения к базе данных: '.mysqli_connect_error();
exit();
}

// если были переданы данные для изменения записи в таблице
if( isset($_POST['button-open']))
{
// формируем и выполняем SQL-запрос на изменение записи с указанным id
$sql_res=mysqli_query($mysqli, 
'UPDATE sessions SET closed = NULL WHERE id = '.$_POST['id']); 
if( mysqli_errno($mysqli) )
echo ' 
<h1>Сессия не открыта :(</h1><h3>Произошла ошибка</h3><a class="btn btn-info" href="../index.php" role="button">На главную</a>';
else // если все прошло нормально – выводим сообщение
echo '
<h1>Сессия открыта</h1><a class="btn btn-info" href="../index.php" role="button">На главную</a>';
}// и выводим сообщение об изменении данных


?>