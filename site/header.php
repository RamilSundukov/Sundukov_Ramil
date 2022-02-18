<?
    function style_img_time()
    {
        (time_d_n() == false) ? $scr = "images/logo/moon_logo.svg" : $scr = "images/logo/sunny_logo.svg";
        return $scr;
    }
?>
<link rel="stylesheet" type="text/css" href=css/header.css>
<header class="header">
    <a href="index.php"><div class="header_logo"></div></a>
    <a href="mendeleev.php"><div class="mendeleev_logo"></div></a>
    <a href="cycle.php"><div class="cycle_logo"></div></a>
    <a href="get_post.php"><div class="get_post_logo"></div></a>
    <a href="autorisation.php"><div class="autorisation_logo"></div></a>
    <a><div class="time_logo"><img src="<? echo style_img_time() ?>"></div></a>
</header>
