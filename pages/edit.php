<?php
session_start();
if (isset($_SESSION['admin']))
 {echo ' <!DOCTYPE html>
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

<div class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="../index.php">Панель администратора</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="../index.php">Просмотр сессий <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="add.php">Добавление сессий</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/?logout=">Выход</a>
    </li>
    </ul>
</div>
</div>';
 echo '<form class="clearfix" name="form_add" method="post" action="edit_result.php">
 <div class="form-group">
 <label for="q1">Вопрос 1 (ответ - число)</label>
 <input  class="form-control" type="text" name="q1" placeholder="Вопрос 1">
 <label for="q2">Вопрос 2 (ответ - положительное число)</label>
 <input  class="form-control" type="text" name="q2" placeholder="Вопрос 2">
 <label for="q3">Вопрос 3 (ответ - строка от 1 до 30 символов)</label>
 <input  class="form-control" type="text" name="q3" placeholder="Вопрос 3">
 <label for="q4">Вопрос 4 (ответ - текст от 1 до 255 символов)</label>
 <input  class="form-control" type="text" name="q4" placeholder="Вопрос 4">
 <label for="q5">Вопрос 5 (ответ - единственный из множества вариантов)</label>
 <input  class="form-control" type="text" name="q5" placeholder="Вопрос 5">
 <label>Варианты ответа для вопроса 5 (в конце правильного поставьте +)</label>
<input  class="form-control" type="text" name="q5res1" placeholder="Вариант ответа">
 <input  class="form-control" type="text" name="q5res2" placeholder="Вариант ответа">
 <label for="ball5true">Балл для правильного варианта ответа (от 0 до 100)</label>
 <input  class="form-control" type="text" name="ball5true" placeholder="Балл для правильного варианта ответа (от 0 до 100)">
 <label for="ball5false">Балл для неправильного варианта ответа (от -100 до 0)</label>
 <input  class="form-control" type="text" name="ball5false" placeholder="Балл для неправильного варианта ответа (от -100 до 0)">
 <label for="q6">Вопрос 6 (ответ - несколько из  множества вариантов)</label>
 <input  class="form-control" type="text" name="q6" placeholder="Вопрос 6">
 <label>Варианты ответа для вопроса 6 (в конце правильных поставьте +)</label>
 <input  class="form-control" type="text"  name="q6res1" placeholder="Вариант ответа">
 <input  class="form-control" type="text"  name="q6res2" placeholder="Вариант ответа">
 <input  class="form-control" type="text"name="q6res3" placeholder="Вариант ответа">
 <label for="ball6true">Балл для правильного варианта ответа (от 0 до 100)</label>
 <input  class="form-control" type="text" name="ball6true" placeholder="Балл для правильного варианта ответа (от 0 до 100)">
 <label for="ball6false">Балл для неправильного варианта ответа (от -100 до 0)</label>
 <input  class="form-control" type="text" name="ball6false" placeholder="Балл для неправильного варианта ответа (от -100 до 0)">
 <input type="hidden" name="id" value="'.$_POST['id'].'">
 </div>
 <input type="submit" name="button" class="btn btn-info float-right" value="Редактировать экспертную сессию">
 </form>
 

</body>
</html>';}
else echo 'Вы не авторизованы!';
?> 