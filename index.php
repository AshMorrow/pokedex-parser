<?php
use libs\PokedexData;
use libs\PokemonGetData;
use libs\ParseStart;

include __DIR__.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'simple_html_dom.php';

function __autoload($name){
    $cn = str_ireplace('\\','/',$name);
    include $cn.'.php';
}
include 'view'.DIRECTORY_SEPARATOR.'default_layout.phtml';
if(isset($_POST['submit_data'])){
    ParseStart::start();
}elseif(isset($_POST['submit_s_img'])){
    PokemonGetData::getImage('detail');
}elseif(isset($_POST['submit_b_img'])){
    PokemonGetData::getImage('full');
}


//$pokedex = new PokemonGetData();
//$pokedex->getAllData($html);

//var_dump(PokedexData::get_all());





































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