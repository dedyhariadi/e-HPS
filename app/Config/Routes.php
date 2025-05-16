<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// kontroller barang
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/save', 'Barang::simpan');

$routes->get('/barang/(:segment)', 'Barang::detail/$1');


// kontroller kegiatan
$routes->get('/kegiatan', 'Kegiatan::index');
