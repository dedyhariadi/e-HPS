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
        session();
        $data = [
            'title' => 'Tambah Data Barang',
            'satuan' => $this->satuanModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        dd($data);
        return view('barang/create', $data);
    }

    public function simpan()
    {

        // validasi input
        if (!$this->validate([
            'namaBarang' => 'required|is_unique[barang.namaBarang]'
        ])) {
            $validation = \Config\Services::validation();

            return redirect()
                ->to('/barang/create')
                ->withInput()
                ->with('validation_errors');
            // return redirect()->back()->withInput();

        }

        $this->barangModel->save([
            'namaBarang' => $this->request->getVar('namaBarang'),
            'gambar' => $this->request->getVar('gambar'),
            'satuanId' => $this->request->getVar('idSatuan')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambah.');

        return redirect()->to('/barang');
    }
}
