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
    <h1>Предлагаем ответить на несколько вопросов:</h1>
    <?php
    $mysqli = mysqli_connect('std-mysql', 'std_933', 'Apokalipsis', 'std_933');
    if( mysqli_connect_errno() ) // проверяем корректность подключения
    echo 'Ошибка подключения к БД: '.mysqli_connect_error(); 
    $id = $_GET["id"];
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM sessions where id='.$id.'');
    while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
{
 echo '<form class="form-styles bg-success clearfix" name="form_expert" method="post" action="result.php">
    <div class="form-group">
    <label for="q1">'.$row['q1'].'</label>
    <input  class="form-control" type="text" name="q1" placeholder="Ответ 1">
    <label for="q2">'.$row['q2'].'</label>
    <input  class="form-control" type="text" name="q2" placeholder="Ответ 2">
    <label for="q3">'.$row['q3'].'</label>
    <input  class="form-control" type="text" name="q3" placeholder="Ответ 3">
    <label for="q4">'.$row['q4'].'</label>
    <textarea class="form-control" type="text" name="q4" placeholder="Ответ 4"></textarea>
    <p>'.$row['q5'].'</p>
    <p><input name="q5res" type="radio" value="q5res1">'.str_replace('+', '', $row['q5res1']).'</p>
    <p><input name="q5res" type="radio" value="q5res2">'.str_replace('+', '', $row['q5res2']).'</p>
    <p>'.$row['q6'].'</p>
    <label><input type="checkbox" value="q6res1">'.str_replace('+', '', $row['q6res1']).'</label>
    <label><input type="checkbox" value="q6res2">'.str_replace('+', '', $row['q6res2']).'</label>
    <label><input type="checkbox" value="q6res3">'.str_replace('+', '', $row['q6res3']).'</label>
    <input type="submit" name="button" class="btn btn-outline-light float-right" value="Сохранить ответы">
    </form>
    ';
    
    
}

    
    ?>
</body>
</html>