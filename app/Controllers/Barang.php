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


        $data = [
            'title' => 'Data Barang',
            'barang' => $this->barangModel->getBarang()
            // 'barang' => $barang,
        ];

        // Load the view for the index page
        return view('barang/index', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->barangModel->getBarang($id),
            'barangRef' => $this->barangModel->join('referensi', 'referensi.barangId=barang.idBarang')->where(['idBarang' => $id])->findAll()
        ];

        // jika data barang tidak ada di tabel
        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Barang tidak ditemukan');
        }

        return view('barang/detail', $data);
    }

    public function create($errors = false)
    {
        // ambil data satuan
        $satuan = $this->satuanModel->findAll();
        $data = [
            'title' => 'Tambah Data Barang',
            'satuan' => $satuan,
            'errors' => $errors,
        ];
        return view('barang/create', $data);
    }

    public function simpan($errors = false)
    { {

            // proses simpan data
            if ($this->barangModel->save([
                'namaBarang' => $this->request->getVar('namaBarang'),
                'satuanId' => $this->request->getVar('idSatuan'),
                'gambar' => $this->request->getFile('gambar')->getName()
            ]) == false) {
                // jika gagal simpan data
                $satuan = $this->satuanModel->findAll();
                $errors = $this->barangModel->errors();
                $data = [
                    'title' => 'Tambah Data Barang',
                    'satuan' => $satuan,
                    'errors' => $errors,
                ];

                return view('/barang/create', $data);
            } else {

                // jika berhasil simpan data

                $gambar = $this->request->getFile('gambar');  // ambil gambar
                if ($gambar->isValid()) {
                    $gambar->move('assets/images');  // pindahkan gambar ke folder images
                }

                session()->setFlashdata('pesan', 'Data Berhasil ditambah.');
                return redirect()->to('/barang');
            }
        }
    }
}
