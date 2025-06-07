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
$routes->match(['GET', 'POST'], '/pejabat', 'Pejabat::index'); //route ke index utk list semua daftar pejabat
$routes->get('/pejabat/tambah', 'Pejabat::tambah'); //route ke tambah
$routes->post('/pejabat/simpan', 'Pejabat::simpan'); //proses penyimpanan tambah

// edit
$routes->get('pejabat/edit/(:num)', 'Pejabat::edit/$1'); //route ke form edit
$routes->post('pejabat/proses_edit', 'Pejabat::proses_edit'); // route ke proses edit

// hapus
$routes->delete('pejabat/(:num)', 'Pejabat::hapus/$1');



// satuan
$routes->match(['GET', 'POST'], '/satuan', 'Satuan::index'); //route ke index utk list semua . hasil pecarian
//tambah
$routes->get('satuan/tambah', 'Satuan::tambah');
$routes->post('satuan/simpan', 'Satuan::simpan');
//edit
$routes->get('/satuan/edit/(:num)', 'Satuan::edit/$1');
$routes->post('/satuan/prosesedit', 'Satuan::prosesedit');
//hapus
$routes->delete('satuan/(:num)', 'Satuan::hapus/$1');


// dasar surat
$routes->match(['GET', 'POST'], 'dasarsurat', 'dasarsurat::index');  //index

// tambah dasar surat
$routes->get('dasarsurat/create', 'dasarsurat::tambah');
$routes->post('dasarsurat/simpan', 'dasarsurat::simpan');

// hapus
$routes->delete('dasarsurat/(:num)', 'dasarsurat::hapus/$1');
// edit
$routes->get('/dasarsurat/edit/(:num)', 'Dasarsurat::edit/$1');
$routes->post('/dasarsurat/prosesedit/(:num)', 'Dasarsurat::prosesedit/$1');


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
