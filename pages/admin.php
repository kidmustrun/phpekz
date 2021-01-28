<?php
session_start();
if (isset($_SESSION['admin']))
 {echo ' 
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
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
          <a class="nav-link" href="pages/add.php">Добавление сессий</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/?logout=">Выход</a>
        </li>
        </ul>
    </div>
  </div>';

  echo $_SESSION['admin'][1];
  $mysqli = mysqli_connect('std-mysql', 'std_933', 'Apokalipsis', 'std_933');
  $sql_res=mysqli_query($mysqli, 'SELECT * FROM sessions');
 $ret= '<table class="table"><tr><th>ID</th><th>1 вопрос</th><th>2 вопрос</th><th>3 вопрос</th><th>4 вопрос</th><th>5 вопрос</th><th>Баллы за 5 вопрос</th><th>6 вопрос</th><th>Баллы за 6 вопрос</th></tr>';
 while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
 {
    $ret.='
     <tr><td>'.$row['id'].'</td>
     <td>'.$row['q1'].'</td>
     <td>'.$row['q2'].'</td>
     <td>'.$row['q3'].'</td>
     <td>'.$row['q4'].'</td>
     <td>'.$row['q5'].'</td>
     <td>'.$row['ball5true'].', '.$row['ball5false'].'</td>
     <td>'.$row['q6'].'</td>
     <td>'.$row['ball6true'].', '.$row['ball6false'].'</td>
     <td><a href="pages/expert.php?id='.$row['id'].'">Ссылка на тестирование</a></td>
     <td><a href="pages/result_admin.php?id='.$row['id'].'">Ссылка на результаты сессии</a></td>
     <td><form name="form_edit" method="post" action="pages/edit.php"><input type="hidden" name="id" value="'.$row['id'].'"> <input type="submit" name="button-edit" class="btn btn-info float-right" value="Редактировать"></form></td>
     <td><form name="form_delete" method="post" action="pages/delete.php"><input type="hidden" name="id" value="'.$row['id'].'"> <input type="submit" name="button-delete" class="btn btn-info float-right" value="Удалить"></form></td></tr>'
    ;
 }
 $ret.='</table>';
 echo $ret;}
 else{ echo '<div>Вы не авторизованы!</div>';}
  ?>