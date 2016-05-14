<?php
class PokemonGetData extends simple_html_dom
{
    public function getPokeId($html){
//        $ret = $html->find('span[id=pokemonID]',0)->prev_sibling(1);
        $ret = $html->find('.pokedex-pokemon-pagination-title',0);
        //echo $ret->prev_sibling()->outertext;
        PokedexData::$pokemon_id = preg_replace('(/[^=]*$/)','',$ret->outertext);
    }

    public function getDescription($html){
        $ret = $html->find('.version-descriptions',0);
        PokedexData::$descriptionX = $ret->children(0);
        PokedexData::$descriptionY = $ret->children(1);
    }

    public function getPokeDtm($html,$dtm){
        /**
         *  получаем type или weknesses
         *  в $dtm передается  часть названия класса
         */
        $ret = $html->find(".dtm-{$dtm} ul",0);
        $i=0;
        $poke_type = '';
        while($ret->children($i)){
            $poke_type .= $ret->children($i)->plaintext.'/';
            $i++;
        }
        return $poke_type;
    }

    function getPokeEvolution($html){
        $ret = $html->find('ul.match-height-tablet span.pokemon-number');
        $evolution_id = '';
        foreach($ret as $element){
            $evolution_id .= str_ireplace('#','',$element->plaintext).'/';
        }

        return $evolution_id;

    }

    function getPokeStatus($html){
        $status = [];
        $ret = $html->find('div[class=pokemon-stats-info active] ul.gauge li.meter');
        foreach ($ret as $item) {
            $status[] =  $item->getAttribute('data-value');
        }
        PokedexData::$hp = $status[0];
        PokedexData::$attack = $status[1];
        PokedexData::$defense = $status[2];
        PokedexData::$special_attack = $status[3];
        PokedexData::$special_defense = $status[4];
        PokedexData::$speed = $status[5];
    }

    function getPokeAbility($html){
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
        PokedexData::$height = $abil_name['Рост'];
        PokedexData::$weight = $abil_name['Вес'];
        PokedexData::$gender = $abil_name['Пол'];
        PokedexData::$category = $abil_name['Вид'];
        PokedexData::$abilities = $abil_name['Таланты'];
    }

    public function getAllData($html){
       self::getPokeId($html);
       self::getDescription($html);
       self::getPokeDtm($html,'type');
       self::getPokeDtm($html,'weaknesses');
       self::getPokeEvolution($html);
       self::getPokeStatus($html);
       self::getPokeAbility($html);
    }

}