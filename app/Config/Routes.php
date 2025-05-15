<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// kontroller barang
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');


// kontroller kegiatan
$routes->get('/kegiatan', 'Kegiatan::index');
