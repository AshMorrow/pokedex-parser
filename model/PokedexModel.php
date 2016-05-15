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

class PokedexModel
{
    private $dbh;

    public function save(){
        $this->dbh = DbConnection::getInstance()->getPdo();
        if(PokedexData::$id != null){
            $this->insert();
        }else{
            $this->update();
        }
    }

    private function update(){

    }

    private function insert(){
        $sth = $this->dbh->prepare(
            'INSERT INTO pokemon VALUES (:name,:pokemon_id,
             :descriptionX,:descriptionY,:weaknesses,
             :type,:evolutions,:hp,:attack,:defense,:special_attack,:special_defense,
             :speed,:height,:weight,:gender,:category,:abilities
             )');
        $sth->execute(PokedexData::get_all());
    }

}