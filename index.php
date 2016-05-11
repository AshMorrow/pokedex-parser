<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'simple_html_dom.php';
use PokedexData;

function getDescription($html){
    $ret = $html->find('.version-descriptions',0);
    PokedexData::$descriptionX = $ret->children(1);
    PokedexData::$descriptionY = $ret->children(2);
}


$html = file_get_html('http://www.pokemon.com/ru/pokedex/blastoise');

getDescription($html);

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