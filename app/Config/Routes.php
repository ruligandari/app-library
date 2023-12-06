<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('auth', 'Login::auth');
$routes->get('logout', 'Login::logout');

$routes->get('dashboard', 'admin\dashboardadmincontroller::index', ['filter' => 'AdminFilter']);
$routes->post('upload', 'admin\dashboardadmincontroller::upload', ['filter' => 'AdminFilter']);
$routes->get('upload', 'admin\dashboardadmincontroller::upload', ['filter' => 'AdminFilter']);
$routes->post('delete', 'admin\dashboardadmincontroller::delete', ['filter' => 'AdminFilter']);

$routes->get('pustaka', 'PustakaController::index', ['filter' => 'AdminFilter']);
$routes->post('upload-pustaka', 'PustakaController::upload', ['filter' => 'AdminFilter']);
$routes->post('delete-pustaka', 'PustakaController::delete', ['filter' => 'AdminFilter']);
