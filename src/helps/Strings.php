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

}