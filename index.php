<?php
include __DIR__.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'simple_html_dom.php';
include 'libs'.DIRECTORY_SEPARATOR.'PokedexData.php';
include 'libs'.DIRECTORY_SEPARATOR.'PokemonGetData.php';

$pokedex = new PokemonGetData();

$html = file_get_html('http://www.pokemon.com/ru/pokedex/blastoise');

//$pokedex->getDescription($html);
$pokedex->getAllData($html);

echo PokedexData::$name.'<br>';
echo PokedexData::$pokemon_id.'<br>';
echo PokedexData::$descriptionX.'<br>';
echo PokedexData::$descriptionY.'<br>';
echo PokedexData::$height.'<br>';
echo PokedexData::$weight.'<br>';
echo PokedexData::$gender.'<br>';
echo PokedexData::$category.'<br>';
echo PokedexData::$abilities.'<br>';
echo PokedexData::$type.'<br>';
echo PokedexData::$weaknesses.'<br>';
echo PokedexData::$evolutions.'<br>';
echo PokedexData::$hp.'<br>';
echo PokedexData::$attack.'<br>';
echo PokedexData::$defense.'<br>';
echo PokedexData::$special_attack.'<br>';
echo PokedexData::$special_defense.'<br>';
echo PokedexData::$speed.'<br>';




































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