<?php

$r->addRoute('GET', '/', ["\App\Controller\HomeController", "index"]);
$r->addRoute('GET', '/home', "\App\Controller\HomeController::index");
$r->addRoute('POST', '/', "\App\Controller\HomeController::create");

$r->addRoute('GET', '/DB', "\App\Controller\DbController::index");
$r->addRoute('POST', '/DB', "\App\Controller\DbController::newTable");
$r->addRoute('GET', '/DB/delete/table/{table_name}', "\App\Controller\DbController::delTable");
$r->addRoute('GET', '/DB/{table_name}', "\App\Controller\DbController::showColumns");
$r->addRoute('POST', '/DB/{table_name}', "\App\Controller\DbController::newColumn");
$r->addRoute('GET', '/DB/delete/{table_name}', "\App\Controller\DbController::delColumn");

$r->addRoute('GET', '/contact', ["\App\Controller\ContactController", "index"]);
$r->addRoute('POST', '/contact', ["\App\Controller\ContactController", "message"]);

$r->addRoute('GET', '/blog', ["\App\Controller\BlogController", "index"]);
$r->addRoute('POST', '/blog', ["\App\Controller\BlogController", "create"]);
$r->addRoute('POST', '/blog/edit/{id}', ["\App\Controller\BlogController", "update"]);
$r->addRoute(['GET', 'POST'], '/blog/delete/{id}', ["\App\Controller\BlogController", "delete"]);
