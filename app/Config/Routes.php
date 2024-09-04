<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 //admin
$routes->get('/admin', 'DashboardController::index');
$routes->get('/daftar-lomba', 'DashboardController::daftarLomba');
$routes->get('/daftar-rules', 'DashboardController::daftarRules');


$routes->get('/daftar-peserta', 'DashboardController::daftarPeserta');



// Sekolah
$routes->get('/daftar-sekolah', 'DashboardController::daftarSekolah');
$routes->post('/daftar-sekolah/insert', 'DashboardController::insertDataSekolah');
$routes->post('/daftar-sekolah/update/(:num)', 'DashboardController::updateDataSekolah/$1');
$routes->get('/daftar-sekolah/delete/(:num)', 'DashboardController::deleteDataSekolah/$1');

// Juara
$routes->get('/daftar-juara', 'DashboardController::daftarJuara');
$routes->post('/daftar-juara/insert', 'DashboardController::insertDataJuara');
$routes->post('/daftar-juara/update/(:num)', 'DashboardController::updateDataJuara/$1');
$routes->get('/daftar-juara/delete/(:num)', 'DashboardController::deleteDataJuara/$1');

// Sponsor
$routes->get('/daftar-sponsor', 'DashboardController::daftarSponsor');
$routes->post('/daftar-sponsor/insert', 'DashboardController::insertDataSponsor');
$routes->post('/daftar-sponsor/update/(:num)', 'DashboardController::updateDataSponsor/$1');
$routes->get('/daftar-sponsor/delete/(:num)', 'DashboardController::deleteDataSponsor/$1');


$routes->get('/daftar-pembimbing', 'DashboardController::daftarPembimbing');
$routes->post('/daftar-pembimbing/insert', 'DashboardController::insertDataPembimbing');
$routes->post('/daftar-pembimbing/update/(:num)', 'DashboardController::updateDataPembimbing/$1');

// Halaman Lomba
$routes->get('/', 'HomeLombaTRKJ::home');