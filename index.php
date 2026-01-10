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
$router->get('/dashboard/users', 'DashboardController@users');

$router->get('/dashboard/user/create', 'DashboardController@createUser');
$router->post('/dashboard/user/store', 'DashboardController@storeUser');

$router->get('/dashboard/user/edit', 'DashboardController@editUser');
$router->post('/dashboard/user/update', 'DashboardController@updateUser');

$router->get('/dashboard/user/delete', 'DashboardController@deleteUser');


$router->get('/dashboard/pengaturan', 'DashboardController@pengaturan');
$router->get('/dashboard/administrasi', 'DashboardController@administrasi');
$router->get('/dashboard/verifikasibayar', 'DashboardController@verifikasibayar');

$router->get('/dashboard/verifikasiBerkas', 'DashboardController@verifikasiBerkas');
$router->get('/dashboard/validBerkas', 'DashboardController@validBerkas');
$router->get('/dashboard/invalidBerkas', 'DashboardController@invalidBerkas');
$router->get('/dashboard/biografi', 'DashboardController@biografi');



$router->get('/admin/ppdb', 'DashboardController@index');
$router->get('/admin/ppdb/detail', 'DashboardController@detail');
$router->get('/admin/ppdb/edit', 'DashboardController@edit');
$router->post('/admin/ppdb/update', 'DashboardController@update');
$router->get('/admin/ppdb/delete', 'DashboardController@delete');

$router->get('/admin/ppdb/cetak', 'DashboardController@cetakPPDB');
$router->get('/dashboard/pengumuman', 'DashboardController@pengumuman');


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