<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\SatuanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    protected $barangModel;
    protected $satuanModel;

    public function __construct()
    {
        // Load the model
        $this->barangModel = new BarangModel();
        $this->satuanModel = new SatuanModel();
    }

    public function index()
    {
        //ambil semua data pada tabel barang yg join dengan tabel satuan
        $barang = $this->barangModel->join('satuan', 'satuan.idSatuan = barang.satuanId')
            ->findAll();


        $data = [
            'title' => 'Data Barang',
            'barang' => $barang,
        ];

        // Load the view for the index page
        return view('barang/index', $data);
    }
}
