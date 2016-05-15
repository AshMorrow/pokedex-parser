<?php
/**
 * Created by PhpStorm.
 * User: KoRaG
 * Date: 15.05.2016
 * Time: 23:06
 */

namespace libs;
use libs\PokedexData;
use libs\PokemonGetData;
use model\PokedexModel;

abstract class ParseStart
{
    public static function start(){
        $html = file_get_html('http://www.pokemon.com/ru/pokedex/bulbasaur');
        $pokedex = new PokemonGetData();
        $save_data = new PokedexModel();
        $count = 0;
        do{
            $next = PokemonGetData::getNextPage($html);
            echo $next;
            $pokedex->getAllData($html);
            $html = file_get_html('http://www.pokemon.com'.$next);
            $save_data->save(PokedexData::get_all());
            echo $count++;

        }while($next != '/ru/pokedex/bulbasaur');
    }
}