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
                function f1()
                {
                    for ($i = 5; $i <= 13; $i++)
                        echo '<br>' . $i;
                }
                f1();
            ?>
    </fieldset>
    <fieldset>
        <legend>
            2 задание c wile
        </legend>
            <?
                $num = 1000;
                function f2w($num)
                {
                    $count = 0;
                    while ($num >= 50) {
                        $num = $num / 2;
                        $count++;
                    }
                    echo 'Получится число:' . $num . '<br>Количество итераций:' . $count;
                }
                f2w($num);
            ?>
    </fieldset>
    <fieldset>
        <legend>
            2 задание c for
        </legend>
            <?
                $num = 0;
                function f2f($num)
                {
                    $count = 0;
                    for ($i = 1000; $i >= 50; $i = $i / 2) {
                        $num = $i / 2;
                        $count++;
                    }
                    echo 'Получится число:' . $num . '<br>Количество итераций:' . $count;
                }
                f2f($num);
            ?>
    </fieldset>
    <fieldset>
        <legend>
            3 задание
        </legend>
            <?
                function f3()
                {
                    for ($Si = 0; $Si <= 10; $Si++)
                    {
                        echo '<br>' . "Si = $Si, то ";
                        for ($j = 0; $j <= 10 - $Si; $j++)
                            echo "$j ";
                    }
                }
                f3();
            ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 18, задача 4
        </legend>
        <?
            $str184 = 'html css php';
            function f184($str)
            {
                echo str_split($str, 4)[0] . " " . substr($str, 5, 3) . " " . substr($str, 9, 3);
            }
            f184($str184);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 18, задача 5
        </legend>
        <?
            $str185 = '1.png';
            function f185($str)
            {
                $answer = '';
                (substr($str, -4) == '.png') ? $answer = 'да' : $answer = 'нет';
                echo '1.png - ' . $answer;
            }
            f185($str185);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 1
        </legend>
        <?
            $str191 = 'qwertyuiop';
            function f191($str)
            {
                echo $str;
                if (strlen($str) > 5)
                    $str191 = substr($str, 5) . '...';
                echo "<br>" . $str;
            }
            f191($str191);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 2
        </legend>
        <?
            $str192 = 'abcstrabcstr';
            function f192($str)
            {
                echo $str;
                $str192 = str_replace('a', '1', $str);
                $str192 = str_replace('b', '2', $str);
                $str192 = str_replace('c', '3', $str);
                echo "<br>" . $str;
            }
            f192($str192);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 3
        </legend>
        <?
            $str193 = 'abc abc abc';
            function f193($str)
            {
                echo $str;
                echo '<br> Позиция b - ' . strrpos($str, 'b');
            }
            f193($str193);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 4
        </legend>
        <?
            $str194 = 'html css php';
            function f194($str)
            {
                $arrstr = [];
                echo $str;
                $arrstr = explode(' ', $str);
                echo '<br>';
                print_r($arrstr);
            }
            f194($str194);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 7-8, слайд 19, задача 5
        </legend>
        <?
            $str1951 = '12-02-2021';
            $str1952 = '12-02-2022';
            function f195($str1, $str2)
            {
                $count = 0;
                echo 'Первая дата - ' . $str1 . '<br> Вторая дата - ' . $str2;
                $count = (strtotime($str2) - strtotime($str1)) / (60 * 60 * 24);
                echo '<br> Кол-во дней - ' . $count;
            }
            f195($str1951, $str1952);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 9-10, слайд 13, задача 7
        </legend>
        <?
            function f7($x)
            {
                if ($x == 0)
                    return 0;
                if ($x == 1)
                    return 1;
                else
                    return f7($x - 1) + f7($x - 2);
            }
            for ($i = 0; $i < 2; $i++)
                echo f7($i) . ' ';
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 9-10, слайд 14, задача 1
        </legend>
        <?
        function f141($arr)
        {
            for ($i = 0;$i < count($arr); $i++)
            {
                $arr[$i] = rand(0,100);
            }
            return $arr;
        }
        $array = ['3','5','6'];
        print_r(f141($array));
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 9-10, слайд 14, задача 2
        </legend>
        <?
            function f142($str)
            {
                return str_word_count(iconv("UTF-8", "windows-1251", $str));
            }
            $str142 = 'HTML, CSS, PHP, BITRIX';
            echo f142($str142);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 9-10, слайд 14, задача 3
        </legend>
        <?
        function f143($str)
        {
            $newstr = "";
            for ($i = strlen($str); $i >= 0; $i--)
            {
                $newstr .= substr($str, $i,1);
            }
            return $newstr;
        }
        $str143 = 'HTML, CSS, PHP, BITRIX';
        echo f143($str143);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 9-10, слайд 14, задача 4
        </legend>
        <?
        function f144($str)
        {
            return strlen($str);
        }
        $str144 = 'HTML, CSS, PHP, BITRIX';
        echo f144($str144);
        ?>
    </fieldset>
    <fieldset>
        <legend>
            Урок 9-10, слайд 14, задача 5
        </legend>
        <?
        function f145($str)
        {
            $str = preg_replace("|[^\d\w][\s]+|i","",$str);
            for ($i = 0; $i < strlen($str); $i++)
                    echo '<br>' . $str[$i];
        }
        $str145 = 'HTML, CSS, PHP, BITRIX';
        f145($str145);
        ?>
    </fieldset>
<!--Подключение footer-->
<?
    require 'footer.php';
?>
</body>
</html>
