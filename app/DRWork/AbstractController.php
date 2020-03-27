<?php
namespace DRWork;

use DRWork\Flash;

class AbstractController
{
    private $loader;
    private $twig;
    private $flash;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(dirname(dirname(__DIR__)).'/templates');
        $this->twig = new \Twig\Environment($this->loader);
        $this->flash = new Flash();
    }

    protected function render($view, $contents = [])
    {
        echo $this->twig->render($view, $contents);
    }

    protected function redirectToRoute($uri)
    {
        header("Location: $uri");
        exit();
    }

    public function flash()
    {
        return $this->flash;
    }
}