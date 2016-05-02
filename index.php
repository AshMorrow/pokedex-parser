<?php
/*require_once 'libs/simple_html_dom.php';

$html = file_get_html('http://www.pokemon.com/ru/pokedex/blastoise');
$rez = $html->find('.pokedex-pokemon-details');
$indo = $html->find('.pokemon-ability-info');

// Find all images
/*foreach($html->find('img') as $element)
    echo "<img src=".$element->src . '><br>';
*/
//foreach($rez as $element)
//    foreach($element->find('.attribute-title') as $title){
//        echo $title;
//    }

//foreach($indo as $element)
//{
//    foreach($element->find('ul') as $ul) {
//        foreach ($ul->find('li') as $li) {
//            echo $li->innertext."<br>";
//        }
//    }
//
//}*/

print_r(PDO::getAvailableDrivers());

try {

//    $SHT = $DBH->prepare("CREATE TABLE type(
//    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
//    type VARCHAR(25) NOT NULL
//    )");
//
//    $SHT->execute();

}catch(PDOException $e){
    echo $e->getMessage();
}