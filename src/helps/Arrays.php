<?php


namespace src\helps;


class Arrays
{
    /**
     * 反转定义的数组，与传入的数组比较，返回交集，用于字段校验
     * @param $arr
     * @param $keys
     * @return array
     */
    public static function arrayFilterKey($arr, $keys)
    {
        return array_intersect_key($arr, array_flip($keys));
    }

    /**
     * 去除数组中的空值，或返回白名单允许的值
     * @param $arr
     * @param array $whiteList
     * @return mixed
     */
    public static function arrayFilterEmpty($arr, $whiteList = array())
    {
        foreach ($arr as $index => $value) {
            if (empty($value) || !in_array($index, $whiteList)) {
                unset($arr[$index]);
            }
        }

        return $arr;
    }

    /**
     * 判断元素是否在数组中
     * @param $search
     * @param $arr
     * @return bool
     */
    public static function in_array($search, $arr)
    {
        $arr = array_flip($arr);

        return isset($arr[$search]);
    }
}