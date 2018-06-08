<?php
require_once __DIR__ . '/vendor/autoload.php';

use weini\EasyDate;

/* $res = EasyDate::getMonthTime(2017,12);
$res2 = EasyDate::getDayTime(2018,6,8);
$res3 = EasyDate::getYearTime(2018);

echo "<pre>";
print_r($res);
print_r($res2);
print_r($res3);
exit; */

$since = '2016-6-8';

$res4 = EasyDate::create()->since($since)->getPastDays();
$res5 = EasyDate::create()->since($since)->getPastMonths();
echo "<pre>";
print_r($res4);
print_r($res5);
exit;