<?php
/**
 * Created by PhpStorm.
 * User: KoRaG
 * Date: 15.05.2016
 * Time: 21:30
 */

namespace libs;


abstract class Libs
{
    public function clear_line($srt){
        return trim(strip_tags($srt));
    }
    public function checkDir($d_name){
        return is_dir($d_name);
    }
}