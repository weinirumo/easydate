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

    public static function create()
    {
        if (is_null(static::$_instance)) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }

    public function since($since)
    {
        if (is_numeric($since)) {
            $this->from = $since;
        } else {
            $this->from = strtotime($since);
        }

        return $this;
    }

    public function getPastDays()
    {
        $from = $this->from;
        return floor((time() - $from) / 86400);
    }

    public function getPastMonths()
    {
        $from = $this->from;
        list($start['y'],$start['m']) = explode('-',date('Y-m',$from));
        list($end['y'],$end['m']) = explode('-',date('Y-m'));
        return ($end['y'] - $start['y'])*12 + $end['m'] - $start['m'];
    }

    public function getPastYears()
    {
        
    }

    /**
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
     * Get the start and end timestamps of the given year and month
     * @param int $year
     * @param int $month int
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

    public function from($value)
    {
        $this->from = $value;
        return $this;
    }

    public function to($value)
    {
        $this->to = $value;
        return $this;
    }

    public function getStart()
    {
        $year = $this->year;
    }

}
