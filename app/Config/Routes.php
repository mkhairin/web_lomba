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
$routes->get('/daftar-peserta', 'DashboardController::daftarPeserta');


// sekolah
// $routes->get('/daftar-sekolah', 'SekolahController::index');
$routes->get('/daftar-sekolah', 'DashboardController::daftarSekolah');
$routes->post('/daftar-sekolah/insert', 'DashboardController::insertSekolah');
$routes->post('/daftar-sekolah/update/(:num)', 'DashboardController::updateSekolah/$1');
$routes->get('/daftar-sekolah/delete/(:num)', 'DashboardController::deleteSekolah/$1');

// juara
$routes->get('/daftar-juara', 'DashboardController::daftarJuara');
$routes->post('/daftar-juara/insert', 'DashboardController::insertJuara');
$routes->post('/daftar-juara/update/(:num)', 'DashboardController::updateJuara/$1');
$routes->get('/daftar-juara/delete/(:num)', 'DashboardController::deleteJuara/$1');




// Halaman Lomba
$routes->get('/', 'HomeLombaTRKJ::home');