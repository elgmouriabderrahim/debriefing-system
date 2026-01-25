<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../config/env.php";

use App\Core\Router;
session_start();

$router = new Router();

$router->get('/admin/dashboard', "AdminDashboardController@index");

$router->get('/admin/classes', "AdminClassesController@index");
$router->get('/admin/class/create', "AdminClassesController@showCreateForm");
$router->post('/admin/class/create', "AdminClassesController@create");
$router->get('/admin/class/view', "AdminClassesController@view");
$router->post('/admin/class/delete', "AdminClassesController@delete");


$router->get('/admin/sprints', "AdminSprintsController@index");
$router->get('/admin/sprint/create', "AdminSprintsController@create");
$router->post('/admin/sprint/create', "AdminSprintsController@store");
$router->post('/admin/sprint/delete', "AdminSprintsController@delete");

$router->get('/admin/competences', "AdminCompetencesController@index");
$router->get('/admin/competences/create', "AdminCompetencesController@create");
$router->post('/admin/competences/create', "AdminCompetencesController@store");
$router->post('/admin/competences/delete', "AdminCompetencesController@delete");

$router->get('/admin/users', "AdminUsersController@index");
$router->get('/admin/user/add', "AdminUsersController@showAddForm");
$router->post('/admin/user/add', "AdminUsersController@addUser");
$router->get('/admin/user/delete', "AdminUsersController@deleteUser");
$router->get('/admin/instructor/assign', "AdminInstructorsController@showAssignForm");
$router->post('/admin/instructor/assign', "AdminInstructorsController@assignClass");

$router->get('/admin/debriefings', "AdminDebriefingsController@index");

$router->get('/login', "AuthController@showLogIn");
$router->post('/login', "AuthController@logIn");
$router->get('/logout', "AuthController@logOut");

$router->dispatch();