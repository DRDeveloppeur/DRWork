<?php

$r->addRoute('GET', '/', ["\App\Controller\HomeController", "index"]);
$r->addRoute('GET', '/home', "\App\Controller\HomeController::index");
