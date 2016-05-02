<?php

class AddModel{
   public $DBH;
    public function __construct()
    {
        $this->DBH = DbConnection::getInstance()->getPdo();
    }

    public function addType($param){
        $STH = $this->DBH->prepare('INSERT INTO `type`(`type`) VALUES(?) ');
        $STH->bindParam(1,$param);
        $STH->execute();
    }
}