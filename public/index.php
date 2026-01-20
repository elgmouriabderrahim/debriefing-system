<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../config/env.php";
use App\Core\Router;
use eftec\bladeone\BladeOne;
session_start();

$views = __DIR__ . '/../app/Views';
$cache = __DIR__ . '/../cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
$router = new Router($blade);

$router->get('/admin/dashboard', "AdminDashboardController@index");

$router->get('/classes', "AdminClassesController@index");

$router->get('/sprints', "AdminSprintsController@index");

$router->get('/competences', "AdminCompetencesController@index");

$router->get('/users', "AdminUsersController@index");

$router->get('/debriefings', "AdminDebriefingsController@index");
$router->dispatch();