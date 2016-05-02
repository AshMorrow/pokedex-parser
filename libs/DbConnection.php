<?php

class DbConnection
{
    /**
     * @var null
     */
    private static $instance = null;


    /**
     * @var PDO
     */
    private $pdo;

    /**
     * DbConnection constructor.
     */
    private function __construct()
    {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=pokedex",'root','1111');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('SET NAMES utf8');
    }

    private function __clone(){}

    private function __wakeup(){}

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    public function getPdo(){
        return $this->pdo;
    }
}