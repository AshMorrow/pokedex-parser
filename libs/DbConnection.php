<?php
namespace libs;

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
        $this->pdo = new PDO("mysql:host=stellash.mysql.ukraine.com.ua;dbname=stellash_pokedex",'stellash_pokedex','wkj63qwc');
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