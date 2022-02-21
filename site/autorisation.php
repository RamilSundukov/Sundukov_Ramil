<!--Логины и пароли-->
<?
    session_start();
    if($_SESSION['log_pas'][0][0] == '' && $_SESSION['log_pas'][0][1] == ''){
        $_SESSION['log_pas'][0][0] = 'admin';
        $_SESSION['log_pas'][0][1] = md5('qwerty');
        $_SESSION['log_pas'][0][2] = 'qwerty';
        $_SESSION['log_pas'][0][4] = 'red';

    }
    $log_pas = $_SESSION['log_pas'];
    //Функция авторизации
    function autorisation($log_pas)
    {
        $_POST['password'] = md5($_POST['password']);
        $flag = false;
        foreach ($log_pas as $pair)
        {
            if (($pair[0] == $_POST['login']) && ($pair[1] == $_POST['password']) ){
                $_SESSION['user'] = $_POST['login'];
                $flag = true;
            }
        }
        if ($_POST['login'] != '' && $_POST['password'] != '') {
            if ($flag == true)
                echo '<br>' . 'Успешная авторизация!';
            else
                echo '<br>' . 'Вы ввели неверный логин или пароль!';
        }
    }
    //Функция регистрации
    function registration($log_pas)
    {
        $_SESSION['log_pas'][][2] = $_POST['password'];
        $_POST['password'] = md5($_POST['password']);
        $flag = false;
        foreach ($log_pas as $pair)
        {
            if ($pair[0] == $_POST['login'])
                $flag = true;
        }
        if ($_POST['login'] != '' && $_POST['password'] != '') {
            if ($flag == true)
                echo '<br>' . 'Такой логин уже занят!';
            else {
                $_SESSION['log_pas'][][0] = $_POST['login'];
                $_SESSION['log_pas'][count($_SESSION['log_pas'])-1][1] = $_POST['password'];
                echo '<br>' . 'Успешная регистрация';
            }
        }
    }
    //Функция объединяет регистрацию и авторизацию
    function aut_reg()
    {
        if($_POST['aut_reg'] == 1){
            autorisation($_SESSION['log_pas']);
        }elseif($_POST['aut_reg'] == 2){
            registration($_SESSION['log_pas']);
        }
        $_POST['aut_reg'] = 0;
    }
    //Функция определения номера пользователя
    function user($log_pas)
    {
        foreach ($log_pas as $pair) {
            $i++;
            if ($pair[0] == $_SESSION['user'])
                return $i - 1;
        }
    }
    //Функция для вывода
    function input($log_pas)
    {;
        echo '<br>' . 'Логины  / хеш-суммы / пароли';
        foreach ($log_pas as $pair) {
            echo '<br>' . $pair[0] . ' ' . $pair[1] . ' ' . $pair[2];
        }
        echo '<br>' . $_SESSION['user'] . ' последний раз посетил: ' . $_SESSION['log_pas'][user($log_pas)][3];
        echo $_SESSION['log_pas'][user($log_pas)][4];
    }
    //Определение перехода по ссылке
    if ($_POST['site'] == 1) {
        $_SESSION['log_pas'][user($log_pas)][3] = "Факт";
        $_POST['site'] = 0;
        header("Location: fact.php");
    }elseif ($_POST['site'] == 2){
        $_SESSION['log_pas'][user($log_pas)][3] = "Битрикс";
        $_POST['site'] = 0;
        header("Location: bitrix.php");
    }
    //Удаление сессии
    if ($_POST['session'] == 1){
        session_destroy();
        $_POST['session'] = 0;
    }
    //Определение цвета
    if($_POST['button_color'] == 1){
        $_SESSION['log_pas'][user($log_pas)][4] = $_POST['color'];
        $_POST['button_color'] = 0;
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
<body bgcolor="<? echo $_SESSION['log_pas'][user($log_pas)][4] ?>">

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
        <div><? echo input($log_pas) . '<br>' . aut_reg() ?></div>
    </fieldset>

    <?
        require 'footer.php';
    ?>
</body>
</html>