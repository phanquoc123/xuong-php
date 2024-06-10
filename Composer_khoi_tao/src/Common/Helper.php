<?php


namespace Quocpa44\ComposerKhoiTao\Common;

class Helper
{
    public static function debug($data)
    {
        echo '<Pre>';
        print_r($data);
        die;
    }
}
