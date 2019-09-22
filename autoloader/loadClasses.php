<?php


class contractsLoader
{
    public static function dbContractLoader()
    {
        require_once "contracts\dbcontract.php";
    }
}

class databaseLoader
{

    public static function ociPdoLoader()
    {
        require_once "databases\ociPdo.php";
       
    }

    public static function mysqlPdoLoader()
    {
        require_once 'databases\mysqlPdo.php';
    }

}

class SQLBuilderLoader
{
    public static function buildLoader()
    {
        require_once 'sqlBuilder\build.php';
    }

    public static function crudLoader()
    {
        require_once 'sqlBuilder\crud.php';
    }

    public static function executorLoader()
    {
        require_once 'sqlBuilder\executor.php';
    }
}