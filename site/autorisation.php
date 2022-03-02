<!--Логины и пароли для входа-->
<!--admin qwerty
user1 qwerty1
user2 qwerty2
user3 qwerty3-->
<?
    //Функция подключения к базе
    function db_con()
    {
        $hostname = 'localhost';
        $username = 'Sundukov';
        $password = 'qwerty';
        $dbname = 'autorisation';
        return mysqli_connect($hostname, $username, $password, $dbname);
    }

    $select=mysqli_query(db_con(), "SELECT * FROM `autorisation`");
    session_start();
    $_SESSION['log_pas']=mysqli_fetch_all($select, MYSQLI_ASSOC);
    $log_pas = $_SESSION['log_pas'];

    //Функция авторизации
    function autorisation($log_pas)
    {
        $_POST['password'] = md5($_POST['password']);
        $flag = false;
        foreach ($log_pas as $pair)
        {
            if (($pair['login'] == $_POST['login']) && ($pair['password'] == $_POST['password']) ){
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
        $_POST['password'] = md5($_POST['password']);
        $flag = false;
        foreach ($log_pas as $pair)
        {
            if ($pair['login'] == $_POST['login'])
                $flag = true;
        }
        if ($_POST['login'] != '' && $_POST['password'] != '') {
            if ($flag == true)
                echo '<br>' . 'Такой логин уже занят!';
            else {
                $l = $_POST['login'];
                $p = $_POST['password'];
                mysqli_query(db_con(), "INSERT INTO `autorisation`(`login`, `password`, `site`, `color`) VALUES ('$l','$p','site','white')");
                echo '<br>' . 'Успешная регистрация';
            }
        }
    }
    //Функция объединяет регистрацию и авторизацию
    function aut_reg()
    {
        if($_POST['aut_reg'] == 1){
            autorisation($_SESSION['log_pas']);
            echo "<meta http-equiv='refresh' content='0'>";
        }elseif($_POST['aut_reg'] == 2){
            registration($_SESSION['log_pas']);;
            echo "<meta http-equiv='refresh' content='0'>";
        }elseif($_POST['aut_reg'] == 3){
            echo '<br>' . ' ';
            $_SESSION['user']='';
            echo "<meta http-equiv='refresh' content='0'>";
        }
        $_POST['aut_reg'] = 0;
    }
    //Функция определения номера пользователя
    function user($log_pas)
    {
        foreach ($log_pas as $pair) {
            $i++;
            if ($pair['login'] == $_SESSION['user'])
                return $i - 1;
        }
    }
    //Функция для вывода
    function input($log_pas)
    {   if ($_SESSION['user']!='')
            echo '<br>' . $_SESSION['user'] . ' последний раз посетил: ' . $_SESSION['log_pas'][user($log_pas)]['site'];
    }
    //Определение перехода по ссылке
    $login = $_SESSION['user'];
    if ($_POST['site'] == 1) {
        mysqli_query(db_con(), "UPDATE `autorisation` SET `site`='Факт' WHERE `login`='$login'");
        $_POST['site'] = 0;
        header("Location: fact.php");
    }elseif ($_POST['site'] == 2){
        mysqli_query(db_con(), "UPDATE `autorisation` SET `site`='Битрикс' WHERE `login`='$login'");
        $_POST['site'] = 0;
        header("Location: bitrix.php");
    }
    //Удаление сессии
    if ($_POST['session'] == 1){
        session_destroy();
        $_POST['session'] = 0;
        echo "<meta http-equiv='refresh' content='0'>";
    }
    //Определение цвета
    if($_POST['button_color'] == 1){
        $c=$_POST['color'];
        mysqli_query(db_con(), "UPDATE `autorisation` SET `color`='$c' WHERE `login`='$login'");
        $_POST['button_color'] = 0;
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
<body bgcolor="<? echo $_SESSION['log_pas'][user($log_pas)]['color'] ?>">

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
        <div><? echo input($log_pas) . '<br>' . aut_reg() ?><p id="answer"></p></div>
    </fieldset>

    <?
        require 'footer.php';
    ?>
</body>
</html>