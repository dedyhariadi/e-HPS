<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// kontroller barang
$routes->match(['GET', 'POST'], '/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');  // route ke create
$routes->get('/barang/edit/(:segment)', 'Barang::form_update/$1');  // route dari detail ke form_update
$routes->post('/barang/proses_update/(:num)', 'Barang::proses_update/$1');  // route dari detail ke form_update

$routes->post('/barang/save', 'Barang::simpan'); //route ke save
$routes->delete('/barang/(:num)', 'Barang::hapus/$1'); // route ke hapus

$routes->get('/barang/(:any)', 'Barang::detail/$1'); //route ke detail


// kontroller referensi
$routes->get('/referensi/create/(:num)', 'Referensi::create/$1'); // route ke create
$routes->post('/referensi/save', 'Referensi::save'); // route ke save

$routes->get('/referensi/edit/(:num)', 'Referensi::edit/$1'); // route ke edit
$routes->post('/referensi/proses_edit', 'Referensi::proses_edit'); // route ke proses edit

$routes->delete('/referensi/(:num)', 'Referensi::hapus/$1');  // route ke hapus


//pejabat
$routes->get('/pejabat', 'Pejabat::index');

// satuan
$routes->get('/satuan','Satuan::index');

// kontroller kegiatan
$routes->get('/kegiatan', 'Kegiatan::index');
