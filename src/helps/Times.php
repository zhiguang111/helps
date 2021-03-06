<?php
namespace src\helps;

class Times
{
    /***
     * 获取某个时间段开始时间结束时间
     * @param $time_type
     * @return array
     */
    public static function getTime($time_type = 'D')
    {
        if ($time_type == 'D') {//当天
            $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        } elseif ($time_type == 'W') {//本周
            $beginToday = strtotime('this week Monday',time());
            $endToday = time();
        } elseif ($time_type == 'w') {//上周
            $nowStart = date('Y-m-d' ,strtotime('this week Monday',time()));
            $beginToday = strtotime("$nowStart - 7 days");
            $endToday = strtotime("$nowStart - 1 days") + 86399;
        } elseif ($time_type == 'Z') {//昨天
            $beginToday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
            $endToday = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
        } elseif ($time_type == 'M') {//当月
            $beginToday = mktime(0, 0, 0, date('m'), 1, date('Y'));
            $endToday = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
        } elseif ($time_type == 'Y') {//本年
            $beginToday = mktime(0, 0, 0, 1, 1, date('Y'));
            $endToday = mktime(23, 59, 59, 12, 31, date('Y'));
        }  else {
            $beginToday = 0;
            $endToday = 1918609559;
        }

        return [$beginToday, $endToday];
    }

    /**
     * 获取某年有多少周
     * @param $year
     * @return Strings
     */
    public static function getWeekNum($year)
    {
        $yearEndTime = strtotime(date('Y', $year) . '-12-31 00:00:00');

        return strftime("%W", $yearEndTime);
    }

    /**
     * 获取今天是今年的第几周
     * @return Strings
     */
    public static function getThisYearWeek()
    {
        return strftime("%W", time());
    }

    /**
     * 获取某一年全部周开始结束时间
     * @param $year
     * @param $month
     * @param $week
     * @return array
     */
    public static function getYearWeekTime($year, $month = 0, $week = 0)
    {
        $year = strtotime(date('Y', $year) . '-01-01 00:00:00');

        return self::getTimeList($year, $month, $week);
    }

    /**
     * 获取当年时间所有周开始结束时间
     * @param $month
     * @param $week
     * @return array
     */
    public static function getThisYearWeekTime($month = 0, $week = 0)
    {
        $year = strtotime(date('Y', time()) . '-01-01 00:00:00');

        return self::getTimeList($year, $month, $week);

    }


    private static function getTimeList($year = 0, $month = 0, $week = 0)
    {
        $timeList = [];
        if ($year < 1970 || empty($year)) {
            return $timeList;
        }
        $allWeek = self::getWeekNum($year);
        if (!empty($month)) {
            $timeStr = $year . '-' . $month;
        }

//        for ($i = 0; $i < $allWeek; $i++) {
//            $s = strtotime(date('Y-m-d H:i:s', strtotime('+' . $i . 'week', $startTime)));
//            $e = strtotime(date('Y-m-d H:i:s', strtotime('+' . ($i + 1) . 'week', $startTime)));
//            $timeList[$i] = [
//                'start_time' => $s,
//                'end_time' => $e
//            ];
//        }
//
        return $timeList;
    }
}