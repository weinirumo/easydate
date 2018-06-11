<?php
/**
 * @author weini
 * @email weinirumo@126.com
 */
namespace weini;

class EasyDate
{
    private static $_instance = null;
    private $from;
    private $to;

    // 防止直接创建对象
    private function __construct()
    {
        // 创建出来对象以后，直接给属性to赋值
        $this->resetTo();
    }

    //防止克隆对象
    private function __clone()
    {

    }

    /**
     * 单例模式获取EasyDate的实例
     * get the instance of EasyDate
     * @return [type] [description]
     */
    public static function create()
    {
        if (is_null(static::$_instance)) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }

    /**
     * 设置开始的时间
     * @param  [int] [string] $since [设置开始的时间，可以是时间戳，也可以是可以转化为时间戳的字符串]
     * @return [type]        [EasyDate的实例]
     */
    public function since($since)
    {
        if (is_numeric($since)) {
            $this->from($since);
        } else {
            $this->from(strtotime($since));
        }

        $this->resetTo();

        return $this;
    }

    /**
     * 设置开始的时间点
     * @param  [int] $value 时间戳
     * @return       EasyDate的实例
     */
    public function from($value)
    {
        if (is_numeric($value)) {
            $this->from = $value;
        } else {
            $this->from = strtotime($value);
        }

        return $this;
    }

    /**
     * 设置结束的时间点
     * @param  [int] $value 时间戳
     * @return       EasyDate的实例
     */
    public function to($value)
    {
        if (is_numeric($value)) {
            $this->to = $value;
        } else {
            $this->to = strtotime($value);
        }

        return $this;
    }

    /**
     * 重置结束时间点
     */
    public function resetTo()
    {
        $this->to = time();
    }

    /**
     * 获取过去的天数
     * @return [int]
     */
    public function getPastDays()
    {
        $from = $this->from;
        $to = $this->to;

        return floor(abs($to - $from) / 86400);
    }

    /**
     * 获取过去的月份
     * @return [int]
     */
    public function getPastMonths()
    {
        $from = $this->from;
        $to = $this->to;
        list($start['y'],$start['m'],$start['d']) = explode('-',date('Y-m-d',$from));
        list($end['y'],$end['m'],$end['d']) = explode('-',date('Y-m-d',$to));
        $months = abs(($end['y'] - $start['y'])*12 + $end['m'] - $start['m']);

        return $months;
    }

    /**
     * 获取过去的整年，满12个月为一年，满24个月为2年。。。
     * @return [int]
     */
    public function getPastFullYears()
    {
        return floor($this->getPastMonths()/12);
    }

    /**
     * 获取过去的年，采用四舍五入的方式
     * @return [int]
     */
    public function getPastYears()
    {
        return round($this->getPastMonths()/12);
    }

    /**
     * 获取给定年份开始和结束的时间戳
     * Get the start and end timestamp of the given year
     * @param int $year
     * @return array
     */
    public static function getYearTime($year)
    {
        return [
            'start' => strtotime($year . '-01-01 00:00:00'),
            'end' => strtotime($year . '-12-31 23:59:59'),
        ];
    }

    /**
     * 获取给定年月开始和结束的时间戳
     * Get the start and end timestamps of the given year and month
     * @param int $year
     * @param int $month
     * @return array
     */
    public static function getMonthTime($year, $month)
    {
        $start = strtotime($year . '-' . $month . '-01 00:00:00');
        if ($month == 12) {
            $end = strtotime(($year + 1) . '-01-01 00:00:00');
        } else {
            $end = strtotime($year . '-'.($month + 1) . '-01 00:00:00') - 1;
        }
        return [
            'start' => $start,
            'end' => $end,
        ];
    }

    /**
     * 获取给定年月日的开始和结束的时间戳
     * get the start and end timestamps of the given day
     * @param int $year
     * @param int $month
     * @param int $day
     * @return array
     */
    public static function getDayTime($year,$month,$day)
    {
        return [
            'start' => strtotime($year . '-'. $month .'-'.$day . ' 00:00:00'),
            'end' => strtotime($year . '-'. $month .'-'.$day . ' 23:59:59'),
        ];
    }


}
