<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('auth', 'Login::auth');
$routes->get('logout', 'Login::logout');

$routes->get('slip-gaji', 'admin\dashboardadmincontroller::index', ['filter' => 'AdminFilter']);
$routes->post('upload', 'admin\dashboardadmincontroller::upload', ['filter' => 'AdminFilter']);
$routes->post('edit-gaji', 'admin\dashboardadmincontroller::update', ['filter' => 'AdminFilter']);
$routes->get('upload', 'admin\dashboardadmincontroller::upload', ['filter' => 'AdminFilter']);
$routes->post('delete', 'admin\dashboardadmincontroller::delete', ['filter' => 'AdminFilter']);

$routes->get('pustaka', 'PustakaController::index', ['filter' => 'AdminFilter']);
$routes->post('upload-pustaka', 'PustakaController::upload', ['filter' => 'AdminFilter']);
$routes->post('edit-pustaka', 'PustakaController::update', ['filter' => 'AdminFilter']);
$routes->post('delete-pustaka', 'PustakaController::delete', ['filter' => 'AdminFilter']);

$routes->get('kelola-akun', 'admin\KelolaAkunController::index', ['filter' => 'AdminFilter']);
$routes->post('kelola-akun', 'admin\KelolaAkunController::store', ['filter' => 'AdminFilter']);
$routes->post('kelola-karyawan', 'admin\KelolaAkunController::storeKaryawan', ['filter' => 'AdminFilter']);
$routes->post('edit-akun', 'admin\KelolaAkunController::update', ['filter' => 'AdminFilter']);
$routes->post('delete-akun', 'admin\KelolaAkunController::delete', ['filter' => 'AdminFilter']);
$routes->post('delete-karyawan', 'admin\KelolaAkunController::deleteKaryawan', ['filter' => 'AdminFilter']);
$routes->post('edit-karyawan', 'admin\KelolaAkunController::updateKaryawan', ['filter' => 'AdminFilter']);
