<?php
 
namespace DRWork;

use DRWork\Core\Database\DatabaseMysql;

abstract class AbstractRepository
{
    protected $pdo;
 
    public function __construct()
    {
        $connect = new DatabaseMysql();
        $this->pdo = $connect->getPDO();
    }
}
