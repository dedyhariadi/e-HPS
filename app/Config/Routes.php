<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// kontroller barang
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');  // route ke create

$routes->get('/barang/edit/(:segment)', 'Barang::form_update/$1');  // route dari detail ke form_update
$routes->post('/barang/proses_update/(:num)', 'Barang::proses_update/$1');  // route dari detail ke form_update

$routes->post('/barang/save', 'Barang::simpan');
$routes->delete('/barang/(:num)', 'Barang::hapus/$1');

$routes->get('/barang/(:any)', 'Barang::detail/$1');



// kontroller kegiatan
$routes->get('/kegiatan', 'Kegiatan::index');
