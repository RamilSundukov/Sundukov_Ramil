<!--Определение стиля в зависимости от времени-->
<?
    function style_time()
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        $time = date('H');
        (($time >= 20 && $time < 24) || ($time >= 00 && $time < 8)) ?
            $href = "css/style-night.css" : $href = "css/style.css";
        return $href;
    }
?>
<!--Функция для подсчета гласных на странице-->
<?
    $strings = [];
    $strings[17] = 'Количество гласных букв';
    $strings[18] = 'Количество слов';
    function vowels($strings) {
        $dictionary = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'];
        foreach ($strings as $value1)
            foreach ($dictionary as $value2)
            {
                $number += substr_count($value1, $value2);
                $number += substr_count($value1, mb_strtoupper($value2));
            }
        return $number;
    }
?>
<!--Количество прожитых дней-->
<?
    function number_day()
    {
        $birthday = '20-05-1999';
        $date = date("m-d-Y");
        $count = intval((strtotime($date) - strtotime($birthday)) / (60 * 60 * 24));
        return $count;
    }
?>
<!--Функция вывода информации о себе-->
<?
    function about_me($str)
    {
        $arr_just_text1 = explode(':', $str);
        echo "<font color='red'> $arr_just_text1[0]:</font>";
        for ($i = 1; $i < count($arr_just_text1); $i++)
            echo $arr_just_text1[$i];
}
?>
<!--Функция вывода информации о курсах-->
<?
    function about_course($str)
    {
        $arr_just_text2 = explode(' ', $str);
        $arr_i = 0;
        foreach ($arr_just_text2 as $value)
        {
            if ($arr_i % 2 == 0)
                echo "<font color='#008b8b'> $value </font>";
            else
                echo "<font color='#8b008b'> $value </font>";
            $arr_i++;
        }
    }
?>
<!--Функция для подсчета слов на странице-->
<?
    function words($strings)
    {
        foreach ($strings as $value)
            $words += str_word_count(iconv("UTF-8", "windows-1251", $value));
        return $words;
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework</title>
    <link rel="stylesheet" type="text/css" href=<? echo style_time() ?>>
</head>
<body class="body">

<!--Подключение header-->
<?
    require 'header.php';
?>

    <section class="photo-text">
        <div class="photo"></div>
        <div class="name"><? echo $strings[0] = 'Рамиль Сундуков'; ?></div>
        <div class="about-me">
            <p class="topic"><? echo $strings[1] = 'Информация о себе'; ?></p>
            <p class="just-text">
                <?
                    $strings[2] = 'Место учёбы: МГТУ им. Г.И. Носова, 5 курс';
                    about_me($strings[2]);
                ?>
            </p>
            <p class="just-text"><? echo $strings[3] = 'Специальность: Информационная безопасность автоматизированных систем'; ?></p>
            <p class="just-text"><? echo $strings[4] = 'Увлечения: велосипед, отдых на природе (походы), фотография, горные лыжи'; ?></p>
            <p class="just-text"><? echo $strings[5] = 'Дата рождения: 20.05.1999.'; ?></p>
            <p class="just-text"><? $strings[6] = 'Прожитых дней:'; echo $strings[6] . number_day() . '.' ?></p>
        </div>
        <div class="about-course">
            <p class="topic"><? echo $strings[7] = 'О курсах'; ?></p>
            <p class="just-text">
                <?
                    $strings[8] = 'Курсы идут хорошо, практика довольно полезна. Хочется больше ссылок на полезные дополнительные материалы по изучаемым темам.';
                    about_course($strings[8]);
                ?>
            </p>
        </div>
    </section>
    <section class="flex-block">
        <section class="photo1">
            <div class="photo1-image"></div>
            <div class="photo1-text"><? echo $strings[9] = 'Дорога'; ?></div>
        </section>
        <section class="photo2">
            <div class="photo2-image"></div>
            <div class="photo2-text"><? echo $strings[10] = 'Закат'; ?></div>
        </section>
        <section class="photo3">
            <div class="photo3-image"></div>
            <div class="photo3-text"><? echo $strings[11] = 'Ковыль'; ?></div>
        </section>
        <section class="photo4">
            <div class="photo4-image"></div>
            <div class="photo4-text"><? echo $strings[12] = 'Река'; ?></div>
        </section>
    </section>
    <section class="grid-block">
        <section class="photo5">
            <div class="photo5-image"></div>
            <div class="photo5-text"><? echo $strings[13] = 'Ель'; ?></div>
        </section>
        <section class="photo6">
            <div class="photo6-image"></div>
            <div class="photo6-text"><? echo $strings[14] = 'Рябина'; ?></div>
        </section>
        <section class="photo7">
            <div class="photo7-image"></div>
            <div class="photo7-text"><? echo $strings[15] = 'Свиристель'; ?></div>
        </section>
        <section class="photo8">
            <div class="photo8-image"></div>
            <div class="photo8-text"><? echo $strings[16] = 'Лиственница'; ?></div>
        </section>
    </section>
    <section class="results">
        <div class="vowels"> <? echo "$strings[17] - " . vowels($strings) . '.'; ?> </div>
        <div class="word"> <? echo "$strings[18] - " . words($strings) . '.' ; ?> </div>
    </section>

<!--Подключение footer-->
<?
    require 'footer.php';
?>

</body>
</html>