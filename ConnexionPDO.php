<?php

class ConnexionPDO
{   private static  $cnxPDO=null;
    private const HOST='localhost';
    private const NAME='test_pdo';
    private const LOGIN='root';
    private const MDP='';
    private function __construct()
    {
        try
        {
            self::$cnxPDO=new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::LOGIN,self::MDP);

        }

        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }


    public static function getInstance()
    {
        if(!self::$cnxPDO)
            {
                new ConnexionPdo();


            }
        else
        {
        }

        return self::$cnxPDO;}



}