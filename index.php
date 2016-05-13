<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'simple_html_dom.php';
include 'libs'.DIRECTORY_SEPARATOR.'PokedexData.php';
function getDescription($html){
    $ret = $html->find('.version-descriptions',0);
    PokedexData::$descriptionX = $ret->children(1);
    PokedexData::$descriptionY = $ret->children(2);
}

function getPokeDtm($html,$dtm){
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
    $ret = $html->find('div[class=pokemon-stats-info active] ul.gauge li.meter');
    foreach ($ret as $item) {
       echo $item->getAttribute('data-value');
    }
}

function getPokeAbility($html){
    $l_ret = $html->find('span.attribute-value'); //рост.вес.пол
    foreach ($l_ret as $element){
        echo $element->plaintext;
    }

}



$html = file_get_html('http://www.pokemon.com/ru/pokedex/venusaur');

getDescription($html);
echo getPokeDtm($html,'type');
echo getPokeDtm($html,'weaknesses');
echo getPokeEvolution($html);
getPokeStatus($html);
getPokeAbility($html);
echo PokedexData::$descriptionX;







































//var_dump($text,$indo);
//print_r(PDO::getAvailableDrivers());

/*try {
    include 'libs/DbConnection.php';
    include 'model/AddModel.php';
    $add = new AddModel();
//    $typeArr= ['Жук','Тёмный','Дракон','Электрический','Фея','Сражение','Огонь','Летающий','Призрак','Трава','Земляной',
//    'Ледяной','Обычный','Яд','Экстрасенс','Каменный','Стальной','Вода'];
//    foreach($typeArr as $type){
//        $add->addType($type);
//    }

//    $SHT = $DBH->prepare("CREATE TABLE type(
//    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
//    type VARCHAR(25) NOT NULL
//    )");
//
//    $SHT->execute();

}catch(PDOException $e){
    echo $e->getMessage();
}*/