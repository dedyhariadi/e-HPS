<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// kontroller barang
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->get('/barang/edit/(:segment)', 'Barang::ubah/$1');
$routes->post('/barang/save', 'Barang::simpan');
$routes->delete('/barang/(:num)', 'Barang::hapus/$1');

$routes->get('/barang/(:any)', 'Barang::detail/$1');


// kontroller kegiatan
$routes->get('/kegiatan', 'Kegiatan::index');
