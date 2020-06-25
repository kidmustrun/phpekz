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
    
    <?php 
    echo '<h1>Результаты тестирования</h1>';
    if (!is_numeric($_POST['q1']))
    exit("Введенный ответ в 1 вопросе не является числом!");
    if(!($_POST['q2']>=0))
    exit("Введенный ответ в 2 вопросе не является положительным числом!");
    $q3len = mb_strlen($_POST['q3'], 'utf-8');
    if(!($q3len>=1) or !($q3len<=30))
    exit("Введенный ответ в 3 вопросе не заполнен или имеет больше 30 символов в длину!");
    $q4len = mb_strlen($_POST['q4'], 'utf-8');
    if(!($q4len>=1) or !($q4len<=255))
    exit("Введенный ответ в 4 вопросе не заполнен или имеет больше 255 символов в длину!");
    

    $mysqli = mysqli_connect('std-mysql', 'std_933', 'Apokalipsis', 'std_933');
    $balls = 0;
    $default = mysqli_query($mysqli, 'SELECT ball5true, ball5false, ball6true, ball6false, q6res1, q6res2, q6res3 from sessions where id='.$_POST['id'].'');
    while( $row=mysqli_fetch_assoc($default) ){
        $ball5true = $row['ball5true'];
        $ball5false = $row['ball5false'];
        $ball6true = $row['ball6true'];
        $ball6false = $row['ball6false'];
        if (strpos($row['q6res1'], '+') !== false) 
        $right1 = $row['q6res1'];
        else $right1 = '';
        if (strpos($row['q6res2'], '+') !== false) 
        $right2 = $row['q6res2'];
        else $right2 = '';
        if (strpos($row['q6res3'], '+') !== false) 
        $right3 = $row['q6res3'];
        else $right3 = '';
    }
    if (strpos($_POST['q5'], '+') !== false) {
        $balls += $ball5true; 
        $good1 = 1;
    }

else {$balls += $ball5false; 
    $good1 = 0;}

if (!strcmp($_POST['q6res1'],$right1) and !strcmp($_POST['q6res2'],$right2)  and !strcmp($_POST['q6res3'],$right3) ) {
$good2 = 1;
    $balls += $ball6true;
}

else {
    $balls += $ball6false;
    $good2 = 0;
}

 $sql_res=mysqli_query($mysqli, 'INSERT INTO answers VALUES ('.
 $_POST['id'].',"'.htmlspecialchars($_POST['q1']).'","'.htmlspecialchars($_POST['q2']).'","'.htmlspecialchars($_POST['q3']).'","'.htmlspecialchars($_POST['q4']).'","'.htmlspecialchars($_POST['q5']).'","'.htmlspecialchars($_POST['q6res1']).'","'.htmlspecialchars($_POST['q6res2']).'","'.htmlspecialchars($_POST['q6res3']).'","'.htmlspecialchars($balls).'","'.htmlspecialchars($_POST['ip']).'","'.htmlspecialchars($_POST['datetime']).'","'.htmlspecialchars($good1).'","'.htmlspecialchars($good2).'")');

 
 $sql_res=mysqli_query($mysqli, 'SELECT * FROM answers where id='.$_POST['id'].'');
 $ret= '<table class="table table-striped"><tr><th>1 вопрос</th><th>2 вопрос</th><th>3 вопрос</th><th>4 вопрос</th><th>5 вопрос</th><th>6 вопрос</th><th>Сумма всех баллов</th><th>IP-адрес эксперта</th><th>Дата и время ответа</th></tr>';
 while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
 {
    $ret.='
     <tr><td>'.$row['q1'].'</td>
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
 $balls =  mysqli_query($mysqli, 'SELECT avg(balls) from answers where id='.$_POST['id'].'');
 while( $row=mysqli_fetch_assoc($balls) ){
echo '<h2>Средний балл экспертной сессии в целом: '.$row['avg(balls)'].'</h2>';

 }
$notes =mysqli_query($mysqli, 'SELECT sum(good1),sum(good2) from answers where id='.$_POST['id'].'');
while( $row=mysqli_fetch_assoc($notes) ){
    $good1 = $row['sum(good1)'];
    $good2 = $row['sum(good2)'];
}
 $arr = array (
  'Правильно ответивших на 5 вопрос:'=>$good1,
  'Правильно ответивших на 6 вопрос:'=>$good2
 ); //Массив с парами данных "подпись"=>"значение"
 require_once('../moduls/SimplePlot.php'); //Подключить скрипт
 $plot = new SimplePlot($arr); //Создать диаграмму
 $plot->show(); //И показать её
 echo ' <a href="expert.php?id='.$_POST['id'].'">Пройти тестирование еще раз</a>';

    ?>
</body>
</html>