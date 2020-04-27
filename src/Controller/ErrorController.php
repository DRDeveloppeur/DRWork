<?php

namespace App\Controller;

use DRWork\AbstractController;

class ErrorController extends AbstractController
{
    public function notFound()
    {
        return $this->render('404.html.twig');
    }

    public function methodNotFound()
    {
        return $this->render('405.html.twig');
    }
}