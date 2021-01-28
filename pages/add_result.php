<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php 
if( isset($_POST['button']) && $_POST['button']== 'Сохранить экспертную сессию')
{
$mysqli = mysqli_connect('std-mysql', 'std_933', 'Apokalipsis', 'std_933');
if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error(); 
$pre_id=mysqli_query($mysqli, 'SELECT * FROM sessions');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli, 'INSERT INTO sessions VALUES ('.
$id.',"'.htmlspecialchars($_POST['q1']).'","'.htmlspecialchars($_POST['q2']).'","'.htmlspecialchars($_POST['q3']).'","'.htmlspecialchars($_POST['q4']).'","'.htmlspecialchars($_POST['q5']).'","'.htmlspecialchars($_POST['q5res1']).'","'.htmlspecialchars($_POST['q5res2']).'",'.$_POST['ball5true'].','.$_POST['ball5false'].',"'.htmlspecialchars($_POST['q6']).'","'.htmlspecialchars($_POST['q6res1']).'","'.htmlspecialchars($_POST['q6res2']).'","'.htmlspecialchars($_POST['q6res3']).'",'.$_POST['ball6true'].','.$_POST['ball6false'].')');
$_POST = array();
// если при выполнении запроса произошла ошибка – выводим сообщение
if( !mysqli_errno($mysqli) ) 
echo '<h1>Сессия добавлена</h1>
<a href="expert.php?id='.$id.'">Ссылка на сессию</a>
<a href="result.php?id='.$id.'">Ссылка на результаты сессии</a>
<a href="../index.php">На главную</a>';
else // если все прошло нормально – выводим сообщение
echo '<div>Сессия не добавлена :(</div>
<a href="../index.php">На главную</a>';
}
?>