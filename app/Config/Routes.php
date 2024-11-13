<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk halaman login dan otentikasi
$routes->get('/login', 'LoginController::login');
$routes->post('/login/auth', 'LoginController::loginAuth');
$routes->get('/logout', 'LoginController::logout');


$routes->get('/admin_panel', 'AdminLoginController::loginAdmin');
$routes->post('/admin_login/auth', 'AdminLoginController::loginAuth');
$routes->get('/admin/logout', 'AdminLoginController::logout');

$routes->get('/juri_panel', 'JuriLoginController::loginJuri');
$routes->post('/juri_login/auth', 'JuriLoginController::loginAuth');

// Halaman Lomba (Public Route)
$routes->get('/landing-page', 'HomeLombaTRKJ::home');

// Admin dashboard
$routes->get('/admin', 'DashboardController::index');

// Sekolah
$routes->get('/daftar-sekolah', 'SekolahController::sekolahView');
$routes->post('/daftar-sekolah/insert', 'SekolahController::insert');
$routes->post('/daftar-sekolah/update/(:num)', 'SekolahController::update/$1');
$routes->get('/daftar-sekolah/delete/(:num)', 'SekolahController::delete/$1');

// Juara
$routes->get('/daftar-juara', 'JuaraController::juaraView');
$routes->post('/daftar-juara/insert', 'JuaraController::insert');
$routes->post('/daftar-juara/update/(:num)', 'JuaraController::update/$1');
$routes->get('/daftar-juara/delete/(:num)', 'JuaraController::delete/$1');

// Sponsor
$routes->get('/daftar-sponsor', 'SponsorController::sponsorView');
$routes->post('/daftar-sponsor/insert', 'SponsorController::insert');
$routes->post('/daftar-sponsor/update/(:num)', 'SponsorController::update/$1');
$routes->get('/daftar-sponsor/delete/(:num)', 'SponsorController::delete/$1');

// Pembimbing
$routes->get('/daftar-pembimbing', 'PembimbingController::pembimbingView');
$routes->post('/daftar-pembimbing/insert', 'PembimbingController::insert');
$routes->post('/daftar-pembimbing/update/(:num)', 'PembimbingController::update/$1');
$routes->get('/daftar-pembimbing/delete/(:num)', 'PembimbingController::delete/$1');

// Lomba
$routes->get('/daftar-lomba', 'LombaController::lombaView');
$routes->post('/daftar-lomba/insert', 'LombaController::insert');
$routes->post('/daftar-lomba/update/(:num)', 'LombaController::update/$1');
$routes->get('/daftar-lomba/delete/(:num)', 'LombaController::delete/$1');

// Peserta
$routes->get('/daftar-peserta', 'PesertaController::daftarPeserta');
$routes->post('/daftar-peserta/insert', 'PesertaController::insert');
$routes->post('/daftar-peserta/update/(:num)', 'PesertaController::update/$1');
$routes->get('/daftar-peserta/delete/(:num)', 'PesertaController::delete/$1');

// Tim Lomba
$routes->get('/tim-lomba', 'TimLombaController::daftarTimLomba');
$routes->post('/tim-lomba/insert', 'TimLombaController::insert');
$routes->post('/tim-lomba/update/(:num)', 'TimLombaController::update/$1');
$routes->get('/tim-lomba/delete/(:num)', 'TimLombaController::delete/$1');

// Tim Lolos
$routes->get('/tim-lolos', 'TimLolosController::daftarTimLolos');
$routes->post('/tim-lolos/insert', 'TimLolosController::insert');
$routes->post('/tim-lolos/update/(:num)', 'TimLolosController::update/$1');
$routes->get('/tim-lolos/delete/(:num)', 'TimLolosController::delete/$1');

$routes->get('/daftar-soal', 'SoalController::index');
$routes->post('/daftar-soal/insert', 'SoalController::insert');
$routes->post('/daftar-soal/update/(:num)', 'SoalController::update/$1');
$routes->get('/daftar-soal/delete/(:num)', 'SoalController::delete/$1');

$routes->get('/daftar-pengumpulan', 'PengumpulanController::index');
$routes->post('/daftar-pengumpulan/insert', 'PengumpulanController::insert');

// Submit Pengumpulan
$routes->post('/user-dashboarduser/insert', 'SubmitTugasController::insert');

// User management
$routes->get('/user', 'UsersController::daftarUser');
$routes->post('/user/insert', 'UsersController::insert');
$routes->post('/user/update/(:num)', 'UsersController::update/$1');

// Admin management
$routes->get('/daftar-admin', 'UserAdminController::daftarAdmin');
$routes->post('/admin/insert', 'UserAdminController::insert');
$routes->post('/admin/update/(:num)', 'UserAdminController::update/$1');
$routes->get('/admin/delete/(:num)', 'UserAdminController::delete/$1');

// Admin management
$routes->get('/daftar-juri', 'UserJuriController::daftarJuri');
$routes->post('/juri/insert', 'UserJuriController::insert');
$routes->post('/juri/update/(:num)', 'UserJuriController::update/$1');
$routes->get('/juri/delete/(:num)', 'UserJuriController::delete/$1');

// User Dashboard
// $routes->get('/user-dashboard', 'UserDashboardController::index');
// $routes->get('/user-dashboard-lomba', 'UserDashboardController::dashboardLomba');
$routes->get('/user-dashboard', 'UserDashboardController::dashboarduser');
$routes->get('/informasi-lainnya', 'UserDashboardController::informasiView');


// Juri Dashboard
$routes->get('/juri-dashboard', 'JuriController::dashboardJuri');
$routes->post('/juri-dashboard/update/(:num)', 'JuriController::update/$1');

$routes->get('/juri-dashboard/daftar-dinilai', 'JuriController::daftarDinilai');
$routes->get('/juri-dashboard/tim-lolos', 'JuriController::dashboardTimLolos');
$routes->post('/juri-dashboard/tim-lolos/insert', 'TimLolosJuriController::insert');
