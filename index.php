<?php
session_start(); // подключаем механизм сессий
////////////////////////////////////////////////////////////////////
// обрабатываем выход
////////////////////////////////////////////////////////////////////
if( isset($_GET['logout']) ) // если был переход по ссылке Выход
{
unset( $_SESSION['admin'] ); // удаляем информацию о пользователе
header('Location: /'); // переадресация на главную страницу
exit(); // дальнейшая работа скрипта излишняя
}
////////////////////////////////////////////////////////////////////
// если аутентификации нет, но переданы данные для ее проведения

if(isset($_POST['password']) && $_POST['password']==='12345')
{
$_SESSION['admin'] = ['admin','12345'];
 // редирект на главную
// дальнейшая работа скрипта излишняя
}
if(isset($_POST['password']) && $_POST['password']!='12345')
{
echo '<div>Неверный пароль!</div>';
 // редирект на главную
// дальнейшая работа скрипта излишняя
}



 // закрываем файл

////////////////////////////////////////////////////////////////////
// если аутентификации все еще нет
////////////////////////////////////////////////////////////////////
if( !isset($_SESSION['admin']) )
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Введите пароль для доступа к редактированию экспертных сессий</h1>
     <form method="post" action="">
         <p><strong>Пароль:</strong>
             <input type="password" maxlength="25" size="40" name="password"></p>
         <p><input name="submit" type="submit"></p>
     </form>
     </body>
</html>';
     else include 'pages/admin.php'; 
 
?>
</body>
</html>