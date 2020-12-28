<?php


namespace src\helps;


class Sign
{
    /**
     * 密码加密
     * @param $password
     * @return Strings
     */
    public static function encryptPassword($password)
    {
        return md5(md5(trim($password)));
    }


}