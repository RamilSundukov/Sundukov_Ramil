<!--Логины и пароли-->
<?
    $log_pas = [['user1','qwerty1','6dbd0fe19c9a301c4708287780df41a2'], ['user2','qwerty2','4cc2321ca77b832bd20b66f86f85bef6'],['user3','qwerty3','a6fc8c37c5a4ee63f21c8cddedc44e4b']];
    function autorisation($log_pas)
    {
        $_POST['password2'] = md5($_POST['password2']);
        $flag = false;
        foreach ($log_pas as $pair)
        {
            if (($pair[0] == $_POST['login2']) && ($pair[2] == $_POST['password2']))
                $flag = true;
        }
        if ($_POST['login2'] != '' && $_POST['password2'] != '') {
            if ($flag == true)
                return 'Успешная авторизация!';
            else
                return 'Вы ввели неверный логин или пароль!';
        }
    }
    function input($log_pas)
    {
        echo '<br>' . 'Логины / пароли / хеш-суммы';
        foreach ($log_pas as $pair) {
            echo '<br>' . $pair[0] . ' ' . $pair[1] . ' ' . $pair[2];
        }
    }
    //$message = autorisation($log_pas);
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
<body>
<!--Подключение header-->
<?
    require 'time.php';
    require 'header.php';
?>
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
                <label for="login2">Логин</label>
                <input type="text" id="login2" name="login2">
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
    <div><? echo input($log_pas) . '<br>' . autorisation($log_pas) ?></div>
</fieldset>
<!--<script>
    var Message = '<?php /*echo $message;*/?>';
    document.addEventListener('submit', (e) => {
        alert(Message);
    });
</script>-->
<!--Подключение footer-->
<?
    require 'footer.php';
?>
</body>
</html>