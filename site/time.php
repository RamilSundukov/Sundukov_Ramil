<!--Определение времени-->
<?
function time_d_n()
{
    date_default_timezone_set('Asia/Yekaterinburg');
    $time = date('H');
    if(($time >= 20 && $time < 24) || ($time >= 00 && $time < 8))
        return false;
    else
        return true;
}
?>