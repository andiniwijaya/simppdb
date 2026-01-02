<?php

session_start();

require_once __DIR__ . "/core/Config.php";
require_once __DIR__ . "/core/helpers.php";
require_once __DIR__ . "/core/Router.php";

$router = new Router();

$router->get('/', 'AuthController@homepage');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@processLogin');

$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@processRegister');


//halaman dashboard
$router->get('/dashboard', 'DashboardController@index');
$router->get('/dashboard/kelembagaan', 'DashboardController@kelembagaan');
$router->get('/dashboard/data_ppdb', 'DashboardController@dataPPDB');
$router->get('/dashboard/pengaturan', 'DashboardController@pengaturan');
$router->get('/dashboard/administrasi', 'DashboardController@administrasi');
$router->get('/admin/ppdb', 'AdminPPDBController@index');
$router->get('/admin/ppdb/detail/(:num)', 'DashboardController@detailPPDB');
$router->get('/admin/ppdb/edit/(:num)', 'DashboardController@editPPDB');
$router->post('/admin/ppdb/update/(:num)', 'DashboardController@updatePPDB');
$router->get('/admin/ppdb/delete/(:num)', 'DashboardController@deletePPDB');


$router->get('/admin/ppdb/cetak', 'DashboardController@cetakPPDB');




$router->get('/siswa/formulir', 'FormulirController@index');
$router->post('/siswa/formulir/simpan', 'FormulirController@simpan');
$router->get('/siswa/formulir/cetak', 'FormulirController@cetak');


$router->get("/siswa/berkas_pendaftar", "BerkasController@index");
$router->post("/siswa/berkas/upload", "BerkasController@upload");

$router->get('/siswa/pembayaran', 'PembayaranController@index');
$router->post('/siswa/pembayaran/upload', 'PembayaranController@upload');

$router->get("/siswa/pengumuman", "PengumumanController@index");

$router->get('/forgot', 'AuthController@forgot');
$router->post('/forgot', 'AuthController@processForgot');

$router->get('/reset', 'AuthController@resetForm');
$router->post('/reset', 'AuthController@processReset');


$router->get('/logout', 'LogoutController@index');

$router->run();
