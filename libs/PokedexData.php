<?php
namespace libs;
/**
 * Created by PhpStorm.
 * User: koragg
 * Date: 11.05.16
 * Time: 16:11
 */
abstract class PokedexData
{
    private static $pokemon_data=['id'=>null];

    public static function set($key,$value){
        self::$pokemon_data[$key] = $value;
    }

    public static function get($key){
        if(isset(self::$pokemon_data[$key])){
            return self::$pokemon_data[$key];
        }
    }

    public static function get_all(){
        return self::$pokemon_data;
    }

}