<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 //admin
$routes->get('/admin', 'DashboardController::index');
$routes->get('/daftar-lomba', 'DashboardController::daftarLomba');
$routes->get('/daftar-rules', 'DashboardController::daftarRules');
$routes->get('/daftar-sponsor', 'DashboardController::daftarSponsor');
$routes->get('/daftar-juara', 'DashboardController::daftarJuara');
$routes->get('/daftar-peserta', 'DashboardController::daftarPeserta');
$routes->get('/daftar-pembimbing', 'DashboardController::daftarPembimbing');



$routes->get('/daftar-sekolah', 'DashboardController::daftarSekolah');
$routes->post('/daftar-sekolah/insert', 'DashboardController::insertData');
$routes->post('/daftar-sekolah/update/(:num)', 'DashboardController::updateData/$1');
$routes->get('/daftar-sekolah/delete/(:num)', 'DashboardController::deleteData/$1');




// Halaman Lomba
$routes->get('/', 'HomeLombaTRKJ::home');