<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use App\Models\BarangModel;
use App\Models\SatuanModel;
use App\Models\ReferensiModel;
use App\Models\SumberModel;
use App\Models\PejabatModel;
use App\Models\DasarSuratModel;
use CodeIgniter\HTTP\ResponseInterface;

class Kegiatan extends BaseController
{
    protected $barangModel;
    protected $satuanModel;
    protected $referensiModel;
    protected $sumberModel;
    protected $kegiatanModel;
    protected $pejabatModel;
    protected $dasarModel;

    public function __construct()
    {
        // Load the model
        $this->barangModel = new BarangModel();
        $this->satuanModel = new SatuanModel();
        $this->referensiModel = new ReferensiModel();
        $this->sumberModel = new SumberModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->pejabatModel = new PejabatModel();
        $this->dasarModel = new DasarSuratModel();
    }

    public function index($keyword = false)
    {
        // proses pencarian
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $kegiatan = $this->kegiatanModel->search($keyword);
        } else {

            $kegiatan = $this->kegiatanModel->getKegiatan();
        }

        $data = [
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $kegiatan
        ];

        return view('kegiatan/index', $data);
    }

    public function tambah($errors = false)
    {
        $data = [
            'title' => 'Tambah Kegiatan',
            'kegiatan' => $this->kegiatanModel->getKegiatan(),
            'pejabat' => $this->pejabatModel->findAll(),
            'dasar' => $this->dasarModel->findAll(),
            'errors' => $errors,
        ];

        return view('kegiatan/tambah', $data);
    }

    public function simpan($filePdf = false)
    {

        $filePdf = $this->request->getFile('filePdf');  // ambil filePdf

        //menyimpan data dengan tanpa upload filePdf
        d($this->request->getVar());

        if ($filePdf->getError() == 4) {
            if ($this->kegiatanModel->save([
                'namaKegiatan' => $this->request->getVar('namaKegiatan'),
                'noSurat' => $this->request->getVar('noSurat'),
                'tglSurat' => $this->request->getVar('tglSurat'),
                'pejabatId' => $this->request->getVar('pejabatId'),
                'dasarId' => $this->request->getVar('suratId'),
                'filePdf' => 'default.pdf'
            ]) == false) {
                // jika gagal simpan data
                $errors = $this->kegiatanModel->errors();
                $data = [
                    'title' => 'Tambah Data Kegiatan',
                    'errors' => $errors,
                ];
                d($errors);
                return view('/kegiatan/tambah', $data);
            }
        }


        // $namafilePdf = 'default.jpg'; // jika tidak ada filePdf yang diupload, maka gunakan filePdf default        

        // proses simpan data
        // if ($this->kegiatanModel->save([
        //     'namaBarang' => $this->request->getVar('namaBarang'),
        //     'satuanId' => $this->request->getVar('idSatuan'),
        //     'filePdf' => $filePdf->getRandomName()
        // ])  == false && $filePdf->getError() <> 4) {
        //     // jika gagal simpan data
        //     $satuan = $this->satuanModel->findAll();
        //     $errors = $this->kegiatanModel->errors();
        //     $data = [
        //         'title' => 'Tambah Data Barang',
        //         'satuan' => $satuan,
        //         'errors' => $errors,
        //     ];

        //     d($errors);
        //     return view('/kegiatan', $data);
        // }


        // if ($filePdf->getError() <> 4) {
        //     // // jika berhasil simpan data
        //     $id = $this->kegiatanModel->insertID(); // ambil id barang yang baru saja disimpan
        //     $barang = $this->kegiatanModel->find($id); // ambil data barang yang baru saja disimpan

        //     $filePdf->move('assets/pdf', $kegiatan['filePdf']);  // pindahkan gambar ke folder images

        // }
        session()->setFlashdata('pesan', 'Data Berhasil ditambah.');
        return redirect()->to('/kegiatan');
    }
}
