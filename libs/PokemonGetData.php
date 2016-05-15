<?php
namespace libs;

class PokemonGetData extends Libs
{
    public function getPokeId($html){
        $ret = $html->find('.pokedex-pokemon-pagination-title',0);
        $text = (string)$ret->outertext;
        $text = explode('№', self::clear_line($text));
        PokedexData::set('name',self::clear_line($text[0]));
        PokedexData::set('pokemon_id',self::clear_line($text[1]));
    }

    public function getDescription($html){
        $ret = $html->find('.version-descriptions',0);
        PokedexData::set('descriptionX', self::clear_line($ret->children(0)));
        PokedexData::set('descriptionY', self::clear_line($ret->children(1)));
    }

    public function getPokeDtm($html){
        /**
         *  получаем type и weknesses
         */

        $data_arr = [
            'weaknesses',
            'type'
        ];
        for($c=0;$c<count($data_arr);$c++){

            $ret = $html->find(".dtm-{$data_arr[$c]} ul",0);
            $i=0;
            $poke_type = '';
            while($ret->children($i)){
                $poke_type .= self::clear_line($ret->children($i)->plaintext).'/';
                $i++;
            }
            PokedexData::set($data_arr[$c], substr($poke_type,0,-1));
        }

    }

    public function getPokeEvolution($html){
        $ret = $html->find('ul.match-height-tablet span.pokemon-number');
        $evolution_id = '';
        foreach($ret as $element){
            $evolution_id .= str_ireplace('#','',self::clear_line($element->plaintext)).'/';
        }

        PokedexData::set('evolutions', substr($evolution_id,0,-1));

    }

    public function getPokeStatus($html){
        $status = [];
        $ret = $html->find('div[class=pokemon-stats-info active] ul.gauge li.meter');
        foreach ($ret as $item) {
            $status[] =  self::clear_line($item->getAttribute('data-value'));
        }
        // В общем было лень загонять в цикл
        PokedexData::set('hp', $status[0]);
        PokedexData::set('attack', $status[1]);
        PokedexData::set('defense', $status[2]);
        PokedexData::set('special_attack', $status[3]);
        PokedexData::set('special_defense', $status[4]);
        PokedexData::set('speed', $status[5]);
    }

    public function getPokeAbility($html){
        $abil_name = [
            'Рост'=>'',
            'Вес'=>'',
            'Вид'=>'',
            'Пол'=>'',
            'Таланты'=>''
        ];
        $l_ret = $html->find('div[class=info match-height-tablet] div.active li');
        $m_icon = $html->find('div[class=info match-height-tablet] div.active i[class=icon icon_male_symbol]');
        $f_icon = $html->find('div[class=info match-height-tablet] div.active i[class=icon icon_female_symbol]');
        foreach ($l_ret as $element){
            if(trim($element->plaintext) == 'Неизвестно' || trim($element->plaintext) == '' ) {
                echo '1';
               continue;
            }
            foreach($abil_name as $k => $v){
                if(mb_strstr($element->plaintext,$k)){
                    $abil_name[$k]=trim(str_ireplace($k,'',$element->plaintext));
                }
            }

        }
        foreach ($f_icon as $element){
            if((bool)$element->getAttribute('class')){
                $abil_name['Пол'] .= 'female,';
            }
        }
        foreach ($m_icon as $element){
            if((bool)$element->getAttribute('class')){
                $abil_name['Пол'] .= 'male';
            }
        }
        if($abil_name['Пол']=='Неизвестно'){
            $abil_name['Пол'] = 'unknown';
        }
        PokedexData::set('height', self::clear_line($abil_name['Рост']));
        PokedexData::set('weight', self::clear_line($abil_name['Вес']));
        PokedexData::set('gender', self::clear_line($abil_name['Пол']));
        PokedexData::set('category', self::clear_line($abil_name['Вид']));
        PokedexData::set('abilities', self::clear_line($abil_name['Таланты']));
    }

    public static function getNextPage($html){
        foreach($html->find('a.next') as $element){
            return $element->href;
        }
    }
    /**
     * @param $html
     * вызывает все методы;
     */
    public function getAllData($html){
       self::getPokeId($html);
       self::getDescription($html);
       self::getPokeDtm($html);
       self::getPokeEvolution($html);
       self::getPokeStatus($html);
       self::getPokeAbility($html);
    }

}