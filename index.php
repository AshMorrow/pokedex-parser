<?php
require_once 'libs/simple_html_dom.php';

$html = file_get_html('http://www.pokemon.com/ru/pokedex/blastoise');
$rez = $html->find('.pokedex-pokemon-details ul');
$indo = $html->find('.pokemon-ability-info ul');
$text = $html->find('text');
foreach($indo as $element){
    echo $element->next_sibling();
//    $get_abil = $indk
}
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