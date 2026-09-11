<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'TaskController::index');

$routes->get('tasks', 'TaskController::index');
$routes->get('tasks/create', 'TaskController::create');
$routes->post('tasks', 'TaskController::store');

$routes->get('tasks/(:num)/edit', 'TaskController::edit/$1');
$routes->post('tasks/(:num)', 'TaskController::update/$1');
$routes->post('tasks/(:num)/delete', 'TaskController::delete/$1');



$routes->group('api', static function ($routes) {
    $routes->get('tasks', 'TaskApiController::index');
    $routes->get('tasks/(:num)', 'TaskApiController::show/$1');
    $routes->post('tasks', 'TaskApiController::create');
    $routes->put('tasks/(:num)', 'TaskApiController::update/$1');
    $routes->delete('tasks/(:num)', 'TaskApiController::delete/$1');
});