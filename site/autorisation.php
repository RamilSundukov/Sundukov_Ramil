<?
    //Логины и пароли для входа
    //admin qwerty
    //user1 qwerty1
    //user2 qwerty2
    //user3 qwerty3
    require_once 'Connection.php';
    $connect = new Connection('localhost', 'Sundukov','qwerty','autorisation');
    session_start();
    $connect->site();
    $connect->color();
    //Удаление сессии
    if ($_POST['session'] == 1){
        session_destroy();
        $_POST['session'] = 0;
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autorisation</title>
    <link rel="stylesheet" type="text/css" href="css/autorisation.css">
</head>
<body bgcolor="<? echo $connect->bg_color() ?>">

    <!--Подключение header-->
    <?
        require 'time.php';
        require 'header.php';
    ?>

    <form method="post">
        <label for="color">Выбери цвет фона</label>
        <select name="color">
            <option value="red">Красный</option>
            <option value="yellow">Желтый</option>
            <option value="green">Зелёный</option>
            <option value="black">Чёрный</option>
            <option value="white">Белый</option>
        </select>
        <button name="button_color" value=1>Выбрать</button>
    </form>

    <fieldset>
        <legend>
            Авторизация
        </legend>
        <div>
            <form method="post">
                <p>
                    <label >Введите логин и пароль</label>
                </p>
                <p>
                    <label for="login">Логин</label>
                    <input type="text" id="login" name="login">
                </p>
                <p>
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password">
                </p>
                <p>
                    <button type="submit" name="aut_reg" value=1>Войти</button>
                    <button type="submit" name="aut_reg" value=2>Зарегистрироваться</button>
                    <button type="submit" name="aut_reg" value=3>Выйти</button>
                </p>
            </form>
            <form action="autorisation.php" method="post">
                <p>
                    <button type="submit" name="site" value=1>Факт</button>
                    <button type="submit" name="site" value=2>Битрикс</button>
                </p>
            </form>
            <form action="autorisation.php" method="post">
                <p>
                    <button type="submit" name="session" value=1>Почистить сессию</button>
                </p>
            </form>
        </div>
        <div><? echo $connect->input() . '<br>' . $connect->aut_reg() ?><p id="answer"></p></div>
    </fieldset>

    <?
        require 'footer.php';
    ?>
</body>
</html>