<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../config/env.php";

use App\Core\Router;
session_start();

$router = new Router();

$router->get('/admin/dashboard', "AdminDashboardController@index");

$router->get('/admin/classes', "AdminClassesController@index");

$router->get('/admin/sprints', "AdminSprintsController@index");

$router->get('/admin/competences', "AdminCompetencesController@index");

$router->get('/admin/users', "AdminUsersController@index");
$router->get('/admin/user/add', "AdminUsersController@addUser");
$router->post('/admin/user/add', "AdminUsersController@addUser");

$router->get('/admin/debriefings', "AdminDebriefingsController@index");
$router->dispatch();