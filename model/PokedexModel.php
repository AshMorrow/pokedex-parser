<?php
/**
 * Created by PhpStorm.
 * User: KoRaG
 * Date: 15.05.2016
 * Time: 20:27
 */

namespace model;
use libs\PokedexData;
use libs\DbConnection;
use PDO;

class PokedexModel
{
    private $dbh;

    public function save(array $data){
        $this->dbh = DbConnection::getInstance()->getPdo();
        if($data['id'] == null){
            $this->insert($data);
        }else{
            $this->update();
        }
    }

    private function update(){

    }

    private function insert($data){
        $sth = $this->dbh->prepare("INSERT INTO pokemon VALUES (:id,:name,:pokemon_id,:descriptionX,:descriptionY,:weaknesses,:type,:evolutions,:hp,
:attack,
:defense,:special_attack,:special_defense,:speed,:height,:weight,:gender,:category,:abilities)");
        $sth->execute($data);
    }

}