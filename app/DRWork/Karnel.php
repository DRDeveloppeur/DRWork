<?php

namespace DRWork;

use DRWork\Core\Database;
use DRWork\Router;


class Karnel
{
    private $router;
    private $db;
    
    public function __construct()
    {
        // charger le chemin des routes
        $this->router = new Router();
        $this->router->load();

        // connection a la Database
        $this->db = new Database();
        $this->db->db();
    }
}
