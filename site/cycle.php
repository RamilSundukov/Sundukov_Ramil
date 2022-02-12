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
    <fieldset>
        <legend>
            Урок 7-8, слайд 18, задача 4
        </legend>
        <?
            $str184 = 'html css php';
            echo  str_split($str184,4)[0] ." ". substr($str184, 5, 3)." ". substr($str184, 9, 3);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 18, задача 5
        </legend>
        <?
            $str185 = '1.png';
            $answer = '';
            (substr($str185, -4) == '.png') ? $answer = 'да' : $answer = 'нет';
            echo '1.png - ' . $answer;
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 1
        </legend>
        <?
            $str191 = 'qwertyuiop';
            echo $str191;
            if(strlen($str191) > 5){
                $str191 = substr($str191,5) . '...';
            }
            echo "<br>" . $str191;
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 2
        </legend>
        <?
        $str192 = 'abcstrabcstr';
        echo $str192;
        $str192 = str_replace('a' ,'1', $str192);
        $str192 = str_replace('b' ,'2', $str192);
        $str192 = str_replace('c' ,'3', $str192);
        echo "<br>" . $str192;
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 3
        </legend>
        <?
        $str193 = 'abc abc abc';
        echo $str193;
        echo '<br> Позиция b - ' . strrpos($str193, 'b');
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 4
        </legend>
        <?
        $str194 = 'html css php';
        $arrstr194=[];
        echo $str194;
        $arrstr194 = explode(' ', $str194);
        echo '<br>';
        print_r($arrstr194);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 5
        </legend>
        <?
        $str1951 = '12-02-2021';
        $str1952 = '12-02-2022';
        $count = 0;
        echo 'Первая дата - ' . $str1951 . '<br> Вторая дата - ' . $str1952;
        $count = (strtotime($str1952) - strtotime($str1951)) / (60 * 60 * 24);
        echo '<br> Кол-во дней - ' . $count;
        ?>
    </fieldset>
<!--Подключение footer-->
<?
    require 'footer.php';
?>
</body>
</html>
