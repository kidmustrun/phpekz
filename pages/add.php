<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<?php
 // если были переданы данные для добавления в БД
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
 <a href="../index.html">На главную</a>';
 else // если все прошло нормально – выводим сообщение
 echo '<div>Сессия не добавлена :(</div>
 <a href="../index.html">На главную</a>';
 }
?> 
</body>
</html>