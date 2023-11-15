<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('dashboard', 'admin\dashboardadmincontroller::index');
$routes->post('upload', 'admin\dashboardadmincontroller::upload');
$routes->post('delete', 'admin\dashboardadmincontroller::delete');
