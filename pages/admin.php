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
 // если были переданы данные для добавления в БД
 if( isset($_POST['password']) && $_POST['password']== '12345')
 {
   echo '<form class="form-styles bg-success clearfix" name="form_add" method="post" action="moduls/add.php">
   <div class="form-group">
   <label for="q1">Вопрос 1 (ответ - число)</label>
   <input  class="form-control" type="text" name="q1" placeholder="Вопрос 1">
   <label for="q2">Вопрос 2 (ответ - положительное число)</label>
   <input  class="form-control" name="q2" placeholder="Вопрос 2">
   <label for="q3">Вопрос 3 (ответ - строка от 1 до 30 символов)</label>
   <input  class="form-control" name="q3" placeholder="Вопрос 3">
   <label for="q4">Вопрос 4 (ответ - текст от 1 до 255 символов)</label>
   <textarea  class="form-control" name="q2" placeholder="Вопрос 4"></textarea>
   <label for="q5">Вопрос 5 (ответ - единственный из множества вариантов)</label>
   <input  class="form-control" name="q5" placeholder="Вопрос 5">
   <label for="q5res">Варианты ответа для вопроса 5 (в конце правильного поставьте +)</label>
   <input type="button" value="Добавить еще один вариант ответа" id ="add5" onClick="addElement(\'q5res\',\'q5\');"> 
   <div id="q5">
   <input  class="form-control" name="q5res" placeholder="Вариант ответа">
   <input  class="form-control" name="q5res" placeholder="Вариант ответа">
   </div>
   <label for="q6">Вопрос 6 (ответ - несколько из  множества вариантов)</label>
   <input  class="form-control" name="q6" placeholder="Вопрос 6">
   <label for="q6res">Варианты ответа для вопроса 6 (в конце правильных поставьте +)</label>
   <input type="button" value="Добавить еще один вариант ответа" id="add6" onClick="addElement(\'q6res\',\'q6\');"> 
   <div id="q6">
   <input  class="form-control" name="q6res" placeholder="Вариант ответа">
   <input  class="form-control" name="q6res" placeholder="Вариант ответа">
   <input  class="form-control" name="q6res" placeholder="Вариант ответа">
   </div>
   </div>
   <input type="submit" name="button" class="btn btn-outline-light float-right" value="Сохранить экспертную сессию">
   </form>';
 }
 else 
     echo 'Неправильный пароль!'
 
?> <script>
     function addElement(question_res, n_add) {
         var n_add = document.getElementById(n_add);
       
                var input = '<input  class="form-control" name="'+question_res+'"  placeholder="Вариант ответа">'; 
                
                n_add.innerHTML += input; 
                console.log(n_add);
               
            };
</script>
</body>
</html>