<?php

namespace App\Controller;

use DRWork\AbstractController;

class HomeController extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
        $this->flashbag = $this->flash()->get(); 
    }

    public function index() 
    {
        
        return $this->render('Home/index.html.twig',
            ["uri" => $_SERVER["REQUEST_URI"]]);
    }

}