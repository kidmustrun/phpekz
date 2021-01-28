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
if( isset($_POST['button']) && $_POST['button']== 'Редактировать экспертную сессию')
{
$mysqli = mysqli_connect('std-mysql', 'std_933', 'Apokalipsis', 'std_933');
if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error(); 
$sql_res=mysqli_query($mysqli, 'UPDATE sessions SET q1="'.htmlspecialchars($_POST['q1']).'", q2="'.htmlspecialchars($_POST['q2']).'", q3="'.htmlspecialchars($_POST['q3']).'", q4="'.htmlspecialchars($_POST['q4']).'", q5="'.htmlspecialchars($_POST['q5']).'", q5res1="'.htmlspecialchars($_POST['q5res1']).'", q5res2="'.htmlspecialchars($_POST['q5res2']).'", ball5true='.$_POST['ball5true'].', ball5false = '.$_POST['ball5false'].', q6="'.htmlspecialchars($_POST['q6']).'", q6res1="'.htmlspecialchars($_POST['q6res1']).'", q6res2="'.htmlspecialchars($_POST['q6res2']).'", q6res3="'.htmlspecialchars($_POST['q6res3']).'", ball6true='.$_POST['ball6true'].', ball6false='.$_POST['ball6false'].' where id='.$_POST['id']);
$_POST = array();
// если при выполнении запроса произошла ошибка – выводим сообщение
if( !mysqli_errno($mysqli) ) 
echo '<h1>Сессия отредактирована</h1>
<a href="expert.php?id='.$id.'">Ссылка на тестирование</a>
<a href="result.php?id='.$id.'">Ссылка на результаты сессии</a>
<a href="../index.php">На главную</a>';
else // если все прошло нормально – выводим сообщение
echo '<div>Сессия не отредактирована :(</div>
<a href="../index.php">На главную</a>';
}
?>