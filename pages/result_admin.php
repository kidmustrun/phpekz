<?php
session_start();
if (isset($_SESSION['admin']))
 { echo '<!DOCTYPE html>
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
<body>';
echo '<div class="navbar navbar-expand-lg navbar-light bg-light">
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
    echo '<h1>Результаты тестирования</h1>';
    $mysqli = mysqli_connect('std-mysql', 'std_933', 'Apokalipsis', 'std_933');
    $sql_res=mysqli_query($mysqli, 'SELECT * FROM answers where id='.$_GET['id'].'');
    $ret= '<table class="table table-striped"><tr><th>1 вопрос</th><th>2 вопрос</th><th>3 вопрос</th><th>4 вопрос</th><th>5 вопрос</th><th>6 вопрос</th><th>Сумма всех баллов</th><th>IP-адрес эксперта</th><th>Дата и время ответа</th></tr>';
    while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
    {
       $ret.='<tr><td>'.$row['q1'].'</td>
        <td>'.$row['q2'].'</td>
        <td>'.$row['q3'].'</td>
        <td>'.$row['q4'].'</td>
        <td>'.str_replace('+', '', $row['q5']).'</td>
        <td>'.str_replace('+', '', $row['q6res1']).' '.str_replace('+', '', $row['q6res2']).' '.str_replace('+', '', $row['q6res3']).'</td>
        <td>'.$row['balls'].'</td>
        <td>'.$row['ip'].'</td>
        <td>'.$row['datetime'].'</td></tr>'
       ;
    }
    $ret.='</table>';
    echo $ret;
    $balls =  mysqli_query($mysqli, 'SELECT avg(balls) from answers where id='.$_GET['id'].'');
    while( $row=mysqli_fetch_assoc($balls) ){
   echo '<h2>Средний балл экспертной сессии в целом: '.$row['avg(balls)'].'</h2>';
   
    }
   $notes =mysqli_query($mysqli, 'SELECT sum(good1),sum(good2),count(good1) from answers where id='.$_GET['id'].'');
   while( $row=mysqli_fetch_assoc($notes) ){
       $good1 = $row['sum(good1)'];
       $good2 = $row['sum(good2)'];
       $all = $row['count(good1)'];
   }
    $arr = array (
     'Правильно ответивших на 5 вопрос:'=>$good1,
     'Неправильно ответивших на 5 вопрос:'=>$all-$good1,
    );
    require_once('../moduls/SimplePlot.php'); 
    $plot = new SimplePlot($arr); 
    $plot->show(); 
    $arr2 = array (
      'Правильно ответивших на 6 вопрос:'=>$good2,
     'Неправильно ответивших на 6 вопрос:'=>$all-$good2,
     );
     require_once('../moduls/SimplePlot.php'); 
     $plot = new SimplePlot($arr2); 
     $plot->show(); }
     else echo 'Вы не авторизованы!'
   
       ?>
       </body>
</html>