<?
    date_default_timezone_set('Asia/Yekaterinburg');
    $time=date('H');
    (($time >= 20 && $time < 24) || ($time >= 00 && $time < 8)) ?
        $href="css/style-night.css" : $href="css/style.css";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework</title>
    <link rel="stylesheet" type="text/css" href=<?echo $href; ?>>
</head>
<body class="body">
    <section class="header">
        <a ><div class="header_logo"></div></a>
        <a href="mendeleev_logo.html"><div class="mendeleev_logo"></div></a>
        <div class="time_logo"></div>
    </section>
    <section class="photo-text">
        <div class="photo"></div>
        <div class="name">
            Рамиль Сундуков
        </div>
        <div class="about-me">
            <p class="topic">Информация о себе</p>
            <p class="just-text">Место учёбы: МГТУ им. Г.И. Носова, 5 курс</p>
            <p class="just-text">Специальность: Информационная безопасность автоматизированных систем</p>
            <p class="just-text">Увлечения: велосипед, отдых на природе (походы), фотография, горные лыжи</p>
        </div>
        <div class="about-course">
            <p class="topic">О курсах</p>
            <p class="just-text">Курсы идут хорошо, практика довольно полезна. Хочется больше ссылок на полезные дополнительные материалы по изучаемым темам.</p>
        </div>
    </section>
    <section class="flex-block">
        <section class="photo1">
            <div class="photo1-image"></div>
            <div class="photo1-text">Дорога</div>
        </section>
        <section class="photo2">
            <div class="photo2-image"></div>
            <div class="photo2-text">Закат</div>
        </section>
        <section class="photo3">
            <div class="photo3-image"></div>
            <div class="photo3-text">Ковыль</div>
        </section>
        <section class="photo4">
            <div class="photo4-image"></div>
            <div class="photo4-text">Река</div>
        </section>
    </section>
    <section class="grid-block">
        <section class="photo5">
            <div class="photo5-image"></div>
            <div class="photo5-text">Ель</div>
        </section>
        <section class="photo6">
            <div class="photo6-image"></div>
            <div class="photo6-text">Рябина</div>
        </section>
        <section class="photo7">
            <div class="photo7-image"></div>
            <div class="photo7-text">Свиристель</div>
        </section>
        <section class="photo8">
            <div class="photo8-image"></div>
            <div class="photo8-text">Лиственница</div>
        </section>
    </section>
</body>
</html>