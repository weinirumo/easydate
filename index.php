<?php
require_once __DIR__ . '/vendor/autoload.php';

use weini\EasyDate;

$res = EasyDate::getMonthTime(2017,12);
$res2 = EasyDate::getDayTime(2018,6,8);
$res3 = EasyDate::getYearTime(2018);


$since = '2016-6-8';
$res4 = EasyDate::create()->since($since)->getPastDays();
$since = '2016-6-8';
$to = '2016-8-8';
$res5 = EasyDate::create()->since($since)->to($to)->getPastDays();

$since = '2016-8-8';
$pastMonths = EasyDate::create()->since($since)->getPastMonths();
echo '从'.$since.'到现在过去了'.$pastMonths.'个月';
echo "<br>";

$since = '2016-8-8';
$pastYears = EasyDate::create()->since($since)->getPastYears();
$pastFullYears = EasyDate::create()->since($since)->getPastFullYears();
echo '从'.$since.'到现在大约过去了'.$pastYears.'年<br>';
echo '从'.$since.'到现在过去了'.$pastFullYears.'个整年';
exit;