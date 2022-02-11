<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cycle</title>
    <link rel="stylesheet" type="text/css" href=css/cycle.css>
</head>
<body>
<!--Подключение header-->
<?
    require 'header.php';
?>
    <fieldset>
        <legend>
            1 задание
        </legend>
            <?
                for ($i = 5; $i <= 13; $i++){
                    echo '<br>'. $i;
                }
            ?>
    </fieldset>
    <fieldset>
        <legend>
            2 задание c wile
        </legend>
            <?
                $num = 1000;
                $count = 0;
                while ($num >= 50){
                    $num = $num / 2;
                    $count++;
                }
                echo 'Получится число:'. $num .'<br>Количество итераций:'. $count;
            ?>
    </fieldset>
    <fieldset>
        <legend>
            2 задание c for
        </legend>
            <?
                $num = 0;
                $count = 0;
                for ($i = 1000; $i >= 50; $i = $i / 2){
                    $num = $i / 2;
                    $count++;
                }
                echo 'Получится число:'. $num .'<br>Количество итераций:'. $count;
            ?>
    </fieldset>
    <fieldset>
        <legend>
            3 задание
        </legend>
            <?
                for ($Si = 0; $Si <= 10; $Si++){
                    echo '<br>'. "Si = $Si, то ";
                    for ($j = 0; $j <= 10 - $Si; $j++){
                        echo "$j ";
                    }
                }
            ?>
    </fieldset>

<!--Подключение footer-->
<?
    require 'footer.php';
?>
</body>
</html>
