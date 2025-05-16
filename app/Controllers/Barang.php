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
            'barang' => $this->barangModel->getBarang()
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

    public function create()
    {
        // ambil data satuan
        $satuan = $this->satuanModel->findAll();
        d($satuan);
        $data = [
            'title' => 'Tambah Data Barang',
            'satuan' => $satuan,
        ];
        d($data);
        return view('barang/create', $data);
    }

    public function simpan()
    { {
            $satuan = $this->satuanModel->findAll();
            if ($this->barangModel->save([
                'namaBarang' => $this->request->getVar('namaBarang'),
                'gambar' => $this->request->getVar('gambar'),
                'satuanId' => $this->request->getVar('idSatuan')
            ]) === false) {
                $errors = $this->barangModel->errors();
                $data = [
                    'title' => 'Tambah Data Barang',
                    'satuan' => $satuan,
                    'errors' => $errors,
                ];
                return view('/barang/create', $data);
            } else {
                session()->setFlashdata('pesan', 'Data Berhasil ditambah.');
                return redirect()->to('/barang');
            }
        }
    }
}
