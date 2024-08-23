<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');
$routes->get('/daftar_lomba', 'DashboardController::daftarLomba');












// Halaman Lomba
$routes->get('/home', 'HomeLombaTRKJ::home');
