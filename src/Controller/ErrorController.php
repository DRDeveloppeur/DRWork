<?php

namespace App\Controller;

use DRWork\AbstractController;

class ErrorController extends AbstractController
{
    public function notFound()
    {
        return $this->render('404.html.twig');
    }
}