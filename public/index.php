<?php
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../config/env.php";
use App\Core\Roduter;
use eftec\bladeone\BladeOne;
session_start();

$views = __DIR__ . '/../app/Views';
$cache = __DIR__ . '/../cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
$router = new Router($blade);

$router->get('/', "HomeController@index");
$router->dispatch();