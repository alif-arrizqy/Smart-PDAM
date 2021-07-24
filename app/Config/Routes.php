<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


// Admin
$routes->get('/Administrator', 'Login::administrator');
$routes->get('/Home', 'Pages::index');
$routes->get('/Profile/', 'Pages::profile');
$routes->get('/Manage-user', 'Pages::manage_user');

// User
$routes->get('/Login', 'Login::index');
$routes->get('/User/direct_login', 'User::direct_login');
$routes->get('/User', 'User::index');
$routes->get('/User/monitoring/(:segment)/(:segment)', 'User::monitoring/$1/$2');
$routes->get('/Token', 'User::token');
$routes->get('/User/save_token/', 'User::save_token');
$routes->get('/User/find_kode/(:segment)', 'User::find_kode/$1');
$routes->get('/User/relay_aktif/(:segment)/(:segment)/(:segment)', 'User::relay_aktif/$1/$2/$3');

$routes->get('/User/save_waterflow/(:segment)/(:segment)/(:segment)', 'User::save_waterflow/$1/$2/$3');


$routes->get('/Laporan', 'User::laporan_pam');

// di alatnya
// get kode token dari alat

// fetch status relay dari web ke alat


// get data waterflow dari alat
// $routes->get('/Token/Save-token/', 'User::isi_ulang_token');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
