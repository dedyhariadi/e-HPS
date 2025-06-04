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
$routes->match(['GET', 'POST'], '/pejabat', 'Pejabat::index');
$routes->get('/pejabat/tambah', 'Pejabat::tambah');
$routes->post('/pejabat/simpan', 'Pejabat::simpan');



// satuan
$routes->match(['GET', 'POST'], '/satuan', 'Satuan::index'); //route ke index utk list semua . hasil pecarian
//tambah
$routes->get('satuan/tambah', 'Satuan::tambah');
$routes->post('satuan/simpan', 'Satuan::simpan');
//edit
$routes->get('/satuan/edit/(:num)', 'Satuan::edit/$1');
$routes->post('/satuan/prosesedit', 'Satuan::prosesedit');


// dasar surat
$routes->get('dasarsurat', 'dasarsurat::index');


// kontroller kegiatan
//cetak pdf
$routes->get('/kegiatan/cetakPdf/(:num)', 'Kegiatan::cetakPdf/$1'); // route ke cetak pdf

$routes->match(['GET', 'POST'], '/kegiatan', 'Kegiatan::index');
//tambah
$routes->get('kegiatan/tambah', 'Kegiatan::tambah');
$routes->post('kegiatan/simpan', 'Kegiatan::simpan');

// detail
$routes->match(['GET', 'POST'], '/kegiatan/(:num)', 'Kegiatan::detail/$1'); //route ke detail

//hapus
$routes->delete('/kegiatan/(:num)', 'Kegiatan::hapus/$1');  // route ke hapus
