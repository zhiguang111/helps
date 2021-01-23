<?php


namespace src\helps;


class Strings
{
    /**
     * 获取随机字符串.
     * @param integer $length Length.
     * @return Strings
     */
    public static function genRandomString($length)
    {
        $charset = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $repeatTime = $length / strlen($charset);
        $charset = str_repeat($charset, $repeatTime + 1);
        $charset = str_shuffle($charset);

        return substr($charset, 0, $length);
    }

    /**
     * 检测字符串是否以某个字符开头
     * @param $haystack
     * @param $needles
     * @return bool
     */
    public static function str_starts_with($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && substr($haystack, 0, strlen($needle)) === (string)$needle) {
                return true;
            }
        }

        return false;
    }

    /**
     * 检测字符串是否以某个字符结尾
     * @param $haystack
     * @param $needles
     * @return bool
     */
    public static function str_ends_with($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if (substr($haystack, -strlen($needle)) === (string)$needle) {
                return true;
            }
        }

        return false;
    }


    /**
     * 高精度数字计算封装
     * @param int $left
     * @param string $symbol
     * @param int $right
     * @param int $default
     * @return string|null
     */
    public static function math($left = 0, $symbol = '+', $right = 0, $default = 2)
    {
        bcscale($default);

        switch ($symbol) {
            case '+':
                $res = bcadd((float)$left, (float)$right);
                break;
            case '-':
                $res = bcsub((float)$left, (float)$right);
                break;
            case '*':
                $res = bcmul((float)$left, (float)$right);
                break;
            case '/':
                $res = bcdiv((float)$left, (float)$right);
                break;
            case '%':
                $res = bcmod((float)$left, (float)$right);
                break;
        }

        return $res;
    }
}