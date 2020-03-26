<?php
namespace DRWork;

use phpDocumentor\Reflection\DocBlock\Tags\Param;

class AbstractController
{
    private $loader;
    private $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(dirname(dirname(__DIR__)).'/templates');
        $this->twig = new \Twig\Environment($this->loader);
    }

    public function render($view, $contents = [])
    {
        echo $this->twig->render($view, $contents);
    }
}