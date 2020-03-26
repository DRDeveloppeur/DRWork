<?php

namespace App\Controller;

use DRWork\AbstractController;

class HomeController extends AbstractController
{
    public function index() 
    {
        return $this->render('Home/index.html.twig',
            ["uri" => "/"]);
    }
}