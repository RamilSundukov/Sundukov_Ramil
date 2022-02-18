<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get_Post</title>
    <link rel="stylesheet" type="text/css" href="css/get_post.css">
</head>
<body>
<!--Подключение header-->
<?
    require 'time.php';
    require 'header.php';
?>
<fieldset>
    <legend>
        12 слайд 1 задание
    </legend>
    <div>
        <form>
            <p>
                <label >Опрос</label>
            </p>
            <p>
                <label for="name">Имя</label>
                <input type="text" id="name" name="name">
            </p>
            <p>
                <label for="text">О себе</label>
                <textarea name="text"></textarea>
            </p>
            <p>
                <label >Любимый цвет</label>
            </p>
            <p>
                <label for="color1">Красный</label>
                <input type="radio" id="color1" name="color" value="Красный">
            </p>
            <p>
                <label for="color2">Синий</label>
                <input type="radio" id="color2" name="color" value="Синий">
            </p>
            <p>
                <label for="color3">Зелёный</label>
                <input type="radio" id="color3" name="color" value="Зелёный">
            </p>
            <p>
                <label >Выбери любимых животных</label>
            </p>
            <p>
                <label for="checkbox1">Кошки</label>
                <input type="checkbox" id="checkbox1" name="checkbox[]" value="Кошки">
            </p>
            <p>
                <label for="checkbox2">Собаки</label>
                <input type="checkbox" id="checkbox2" name="checkbox[]" value="Собаки">
            </p>
            <p>
                <label for="checkbox3">Хомяки</label>
                <input type="checkbox" id="checkbox3" name="checkbox[]" value="Хомяки">
            </p>
            <p>
                <button type="submit">OK</button>
            </p>
        </form>
    </div>
    <div>
        <?
            echo "<br>"  . 'Имя: ' . $_GET['name'];
            echo "<br>"  . 'О себе';
            echo "<br>"   . $_GET['text'];
            echo "<br>"  . 'Любимый цвет: ' . $_GET['color'];
            echo "<br>"  . 'Любимые животные: ';
            if ($_GET['checkbox'] != '')
                foreach ($_GET['checkbox'] as $checkbox)
                {
                    echo "<br>"  . $checkbox;
                }
        ?>
    </div>
</fieldset>
<fieldset>
    <legend>
        12 слайд 2 задание
    </legend>
    <div>
        <form method="post">
            <p>
                <label >Ввод логина и пароля</label>
            </p>
            <p>
                <label for="login1">Логин</label>
                <input type="text" id="login1" name="login1">
            </p>
            <p>
                <label for="password1">Пароль</label>
                <input type="password" id="password1" name="password1">
            </p>
            <p>
                <button type="submit">Ввести</button>
            </p>
        </form>
    </div>
    <div>
        <?
            $_POST['password1'] = md5($_POST['password1']);
            echo "<br>"  . 'Логин ' . $_POST['login1'];
            echo "<br>"  . 'Пароль ' . $_POST['password1'];
        ?>
    </div>
</fieldset>
<fieldset>
    <legend>
        12 слайд 3 задание
    </legend>
    <div>
        <form method="post">
            <p>
                <label >Ввод логина и пароля</label>
            </p>
            <p>
                <label for="login2">Логин</label>
                    <select type="text" id="login2" name="login2">
                        <?
                            $log_pas=[['user1','qwerty1','6dbd0fe19c9a301c4708287780df41a2'], ['user2','qwerty2','4cc2321ca77b832bd20b66f86f85bef6'],['user3','qwerty3','a6fc8c37c5a4ee63f21c8cddedc44e4b']];
                            foreach ($log_pas as $pair)
                                echo "<option>$pair[0]</option>";
                        ?>
                    </select>
            </p>
            <p>
                <label for="password2">Пароль</label>
                <input type="password" id="password2" name="password2">
            </p>
            <p>
                <button type="submit">Ввести</button>
            </p>
        </form>
    </div>
    <div>
        <?
            $_POST['password2'] = md5($_POST['password2']);
            $flag = false;
            echo 'Логины / пароли / хеш-суммы';
            foreach ($log_pas as $pair)
            {
                echo '<br>' . $pair[0] . ' ' . $pair[1] . ' ' . $pair[2] ;
                if (($pair[0] == $_POST['login2']) && ($pair[2] == $_POST['password2']))
                    $flag = true;
            }
            if($flag == true)
                echo '<br>' . 'Доступ к секретным страницам открыт!';
            else
                echo '<br>' . 'В доступе к секретным страницам отказано!';
        ?>
    </div>
</fieldset>
<fieldset>
    <legend>
        12 слайд 4 задание
    </legend>
    <div>
        <form>
            <p>
                <label >Выберите лабораторную</label>
            </p>
            <p>
                <label for="lab1">Лаб1</label>
                <input type="radio" id="lab1" name="l" value="1">
            </p>
            <p>
                <label for="lab2">Лаб2</label>
                <input type="radio" id="lab2" name="l" value="2">
            </p>
            <p>
                <label for="lab3">Лаб3</label>
                <input type="radio" id="lab3" name="l" value="3">
            </p>
            <p>
                <label for="lab4">Лаб4</label>
                <input type="radio" id="lab4" name="l" value="4">
            </p>
            <p>
                <button type="submit">Выбрать</button>
            </p>
        </form>
    </div>
    <div>
        <?
            echo "<br>"  . 'Выбранная лабораторная: ' . $_GET['l'];
        ?>
    </div>
</fieldset>
<fieldset>
    <legend>
        13 слайд 1 задание
    </legend>
    <div>
        <form method="post">
            <p>
                <label >Введите логин и комментарий</label>
            </p>
            <p>
                <label for="login3">Логин</label>
                <input type="text" id="login3" name="login3">
            </p>
            <p>
                <label for="comment">Комментарий</label>
                <textarea name="comment"></textarea>
            </p>
            <p>
                <button type="submit">Отправить</button>
            </p>
        </form>
    </div>
    <div>
        <?
            $message = "Логин: \r\n" . $_POST['login3'] . "\r\nКомментарий: \r\n" . $_POST['comment'];
            $message = wordwrap($message, 70, "\r\n");
            mail('syndykov.com@gmail.com', 'Comment', $message);
            echo "<br>"  . 'Логин: ' . $_POST['login3'];
            echo "<br>"  . 'Комментарий:';
            echo "<br>"   . $_POST['comment'];
            echo "<br>"  . 'Комментарий отправлен!';
        ?>
    </div>
</fieldset>
<fieldset>
    <legend>
        13 слайд 2 задание
    </legend>
    <div>
        <form>
            <p>
                <label >Заполните анкету</label>
            </p>
            <p>
                <label for="name1">Введите имя</label>
                <input type="text" id="name1" name="name1">
            </p>
            <p>Вопрос 1</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[0]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[0]" value="Нет">
            </p>
            <p>Вопрос 2</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[1]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[1]" value="Нет">
            </p>
            <p>Вопрос 3</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[2]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[2]" value="Нет">
            </p>
            <p>Вопрос 4</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[3]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[3]" value="Нет">
            </p>
            <p>Вопрос 5</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[4]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[4]" value="Нет">
            </p>
            <p>Вопрос 6</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[5]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[5]" value="Нет">
            </p>
            <p>Вопрос 7</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[6]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[6]" value="Нет">
            </p>
            <p>Вопрос 8</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[7]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[7]" value="Нет">
            </p>
            <p>Вопрос 9</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[8]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[8]" value="Нет">
            </p>
            <p>Вопрос 10</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[9]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[9]" value="Нет">
            </p>
            <p>Вопрос 11</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[10]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[10]" value="Нет">
            </p>
            <p>Вопрос 12</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[11]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[11]" value="Нет">
            </p>
            <p>Вопрос 13</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[12]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[12]" value="Нет">
            </p>
            <p>Вопрос 14</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[13]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[13]" value="Нет">
            </p>
            <p>Вопрос 15</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[14]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[14]" value="Нет">
            </p>
            <p>Вопрос 16</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[15]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[15]" value="Нет">
            </p>
            <p>Вопрос 17</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[16]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[16]" value="Нет">
            </p>
            <p>Вопрос 18</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[17]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[17]" value="Нет">
            </p>
            <p>Вопрос 19</p>
            <p>
                <label for="answer1">Да</label>
                <input type="radio" id="answer1" name="answer[18]" value="Да" checked>
                <label for="answer2">Нет</label>
                <input type="radio" id="answer2" name="answer[18]" value="Нет">
            </p>
            <p>
                <button type="submit">Посчитать сумму баллов</button>
            </p>
        </form>
    </div>
    <div>
        <p>Результат анкетирования</p>
        <?
        echo "<br>"  . 'Имя: ' . $_GET['name1'];
        $i = 0;
        $points = 0;
        foreach ($_GET['answer'] as $value) {
            $i++;
            if ($i == 3 || $i == 9 || $i == 10 || $i == 13 || $i == 14 || $i == 19) {
                if ($value == "Да")
                    $points++;
            }
            else {
                if ($value == "Нет")
                    $points++;
            }
        }
        echo "<br>"  . 'Кол-во быллов: ' . $points;
        if ($points > 15)
            echo "<br>"  . 'У вас покладистый характер';
        elseif($points < 8)
            echo "<br>"  . 'Вашим друзьям можно посочувствовать';
        else
            echo "<br>"  . 'Вы не лишены недостатков, но с вами можно ладить';

        ?>
    </div>
</fieldset>


<!--Подключение footer-->
<?
    require 'footer.php';
?>
</body>
</html>