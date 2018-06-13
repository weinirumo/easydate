# easydate
方便快捷的获取指定年月日的开始和结束时间戳

### 通过composer安装：
```
composer require weinirumo/easydate
```

### 引入项目
```
use weini\EasyDate;
```


### 使用步骤：
1. 直接调用EasyDate的实例方法；或者使用EasyDate::create()获取EasyDate的实例。
2. 使用since()方法设置开始时间点，并重置结束时间点；或者使用from()方法设置开始时间点，from方法不会重置结束时间点。
3. 然后调用to()方法设置结束时间点。
4. 使用其他各种get方法获取需要的值。

### 使用示例如下：

```
// 获取2018年的开始和结束的时间戳
$year = EasyDate::getYearTime(2018);

/*
Array
(
    [start] => 1514764800
    [end] => 1546300799
)
*/
```

```
// 获取2017年12月的开始和结束的时间戳
$month = EasyDate::getMonthTime(2017,12);

/*
Array
(
    [start] => 1512086400
    [end] => 1514764800
)
 */
```

```
// 获取2018年6月8日的开始和结束的时间戳
$day = EasyDate::getDayTime(2018,6,8);

/*
Array
(
    [start] => 1528416000
    [end] => 1528502399
)
*/
```


```
// 获取从2016-6-8到现在过去了多少天
$since = '2016-6-8';
$pastDays = EasyDate::create()->since($since)->getPastDays();
echo '从'.$since.'到现在已经过去了'.$pastDays.'天'; // 从2016-6-8到现在已经过去了733天

// 获取从2016-6-8到2016-8-8过去了多少天
$since = '2016-6-8';
$to = '2016-8-8';
$pastDays = EasyDate::create()->since($since)->to($to)->getPastDays();
echo '从' . $since . '到' . $to . '过去了' . $pastDays . '天'; // 从2016-6-8到2016-8-8过去了61天

注意：since()方法会自动重置EasyDate的to属性，而from()方法不会
例如：
EasyDate::create()->since('2016-6-8')->to('2016-8-8')->getPastDays(); // 这里设置了to属性
EasyDate::create()->from('2016-6-8')->getPastDays(); // 61  from方法没有重置to属性
EasyDate::create()->since('2016-6-8')->getPastDays(); // 733 since方法会自动重置to属性

```


```
// 获取从2016-6-8到现在过去了多少个月
$since = '2016-8-8';
$pastMonths = EasyDate::create()->since($since)->getPastMonths();
echo '从'.$since.'到现在过去了'.$pastMonths.'个月'; // 从2016-8-8到现在过去了22个月

```

```
// 获取从2016-8-8到现在过去了几年
$since = '2016-8-8';
$pastYears = EasyDate::create()->since($since)->getPastYears();
$pastFullYears = EasyDate::create()->since($since)->getPastFullYears();
echo '从'.$since.'到现在大约过去了'.$pastYears.'年<br>';
echo '从'.$since.'到现在过去了'.$pastFullYears.'个整年';

// 从2016-8-8到现在大约过去了2年
// 从2016-8-8到现在过去了1整年
```

### 最后
关于功能有什么意见，或者有什么需求，请发送邮件到weinirumo@126.com

