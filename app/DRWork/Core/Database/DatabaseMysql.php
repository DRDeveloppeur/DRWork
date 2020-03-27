<?php

namespace DRWork\Core\Database;

use DRWork\GenericSingleton;
use PDO;

class DatabaseMysql extends GenericSingleton
{
    private $pdo;

    public function __construct()
    {
        $config = include dirname(__DIR__, 3).'/config.php';
        $this->pdo = new PDO ($config['mysql']['dsn'], 
            $config['mysql']['username'], 
            $config['mysql']['password'], 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    }
    
    public function getPDO()
    {
        return $this->pdo;
    }
}