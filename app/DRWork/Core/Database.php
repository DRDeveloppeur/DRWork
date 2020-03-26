<?php

namespace DRWork\Core;
use PDO;

class Database
{
    public static $database;
    
    public static function db()
    {
        try
        {
            self::$database = new PDO ('mysql:host=127.0.0.1:3306;dbname=DRWork;charser=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return self::$database;
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }
}