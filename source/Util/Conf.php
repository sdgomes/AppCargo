<?php
class Conf
{

    private static $isProducao = false;

    public static function urlBanco()
    {
        if (self::$isProducao)
            return array("mysql:host=108.179.193.15:3306;dbname=xnora386_prod_urakami", "xnora386_devs", "SCP-DEVS2021");
        else
            return array("mysql:host=localhost;dbname=appcargo_medias", "root", "");
    }
}
