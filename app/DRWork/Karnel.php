<?php

namespace DRWork;

use DRWork\Core\Database;
use DRWork\Core\Database\DatabaseMysql;
use DRWork\Router;


class Karnel
{
    private $router;
    private $db;
    
    public function __construct()
    {
        // charger le chemin des routes
        $this->router = new Router();
    }
    
    public function run()
    {
        $this->router->load();
    }
}
