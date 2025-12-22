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
$router->get('/dashboard/formulir', 'DashboardController@formulir');
$router->get('/dashboard/kelembagaan', 'DashboardController@kelembagaan');
$router->get('/dashboard/data_ppdb', 'DashboardController@dataPPDB');
$router->get('/dashboard/pengaturan', 'DashboardController@pengaturan');
$router->get('/dashboard/administrasi', 'DashboardController@administrasi');

$router->get("/formulir", "FormulirController@index");
$router->post("/formulir/simpan", "FormulirController@simpan");

$router->get("/pembayaran", "PembayaranController@index");
$router->post("/pembayaran/upload", "PembayaranController@upload");


$router->get('/forgot', 'AuthController@forgot');
$router->post('/forgot', 'AuthController@processForgot');

$router->get('/reset', 'AuthController@resetForm');
$router->post('/reset', 'AuthController@processReset');


$router->get('/logout', 'LogoutController@index');

$router->run();
