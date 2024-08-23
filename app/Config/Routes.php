<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');
$routes->get('/daftar_lomba', 'DashboardController::daftarLomba');
$routes->get('/daftar_rules', 'DashboardController::daftarRules');
$routes->get('/daftar_sponsor', 'DashboardController::daftarSponsor');












// Halaman Lomba
$routes->get('/home', 'HomeLombaTRKJ::home');
