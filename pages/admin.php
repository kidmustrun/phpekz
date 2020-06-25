<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 // если были переданы данные для добавления в БД
 if( isset($_POST['password']) && $_POST['password']== '12345')
 echo 'Молодец вот тебе печенька';
?> 
</body>
</html>