<?php

namespace pdo\oci;

class database implements \databaseContract
{
    private static $_instance = null;
    

    private function __construct($host, $user, $pass, $service, $sid, $port)
    {
        try {
            $dbtns = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service) (SID = $sid)))";
            $this->pdo = new \PDO("oci:dbname=" . $dbtns . ";charset=utf8", $user, $pass);
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
            self::$_instance = new database("test.host", "test.user", "test.pass", "test.service", "ORCL", 1521);
            return self::$_instance;
            
        }
        return self::$_instance;
    }

}