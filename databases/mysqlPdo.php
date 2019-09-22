<?php

namespace pdo\mysql;

class database implements \databaseContract
{
    private static $_instance = null;

    private function __construct($host, $dbname, $user, $pass)
    {
        try
        {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error)      
        {
            die($error->getMessage());
        }
    }

    public static function get_instance() : object
    {
        if(!isset(self::$_instance)){
            self::$_instance = new database('127.0.0.1', 'newdb1', 'root', '');
            return self::$_instance;
            
        }
    return self::$_instance;
    }
}