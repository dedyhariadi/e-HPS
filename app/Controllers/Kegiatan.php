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
use App\Models\PangkatModel;
use App\Models\TrxGiatBarangModel;
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
    protected $pangkatModel;
    protected $trxGiatBarangModel;

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
        $this->pangkatModel = new PangkatModel();
        $this->trxGiatBarangModel = new TrxGiatBarangModel();
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

        // cek apakah ada gambar yang diupload
        if ($filePdf->getError() == 4) {
            $namaFile = 'noFile.pdf';
        } else {
            $namaFile = $filePdf->getRandomName();
            $filePdf->move('assets/pdf', $namaFile); //pindahkan file ke folder upload pdf
        }

        // proses simpan ke database
        if ($this->kegiatanModel->save([
            'namaKegiatan' => $this->request->getVar('namaKegiatan'),
            'noSurat' => $this->request->getVar('noSurat'),
            'tglSurat' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tglSurat'))),
            'pejabatId' => $this->request->getVar('pejabatId'),
            'dasarId' => $this->request->getVar('suratId'),
            'filePdf' => $namaFile
        ]) == false) {
            // jika gagal simpan data
            $errors = $this->kegiatanModel->errors();
            $data = [
                'title' => 'Tambah Data Kegiatan',
                'pejabat' => $this->pejabatModel->findAll(),
                'dasar' => $this->dasarModel->findAll(),
                'errors' => $errors,
            ];
            return view('/kegiatan/tambah', $data);
        }

        // kembali ke index kegiatan
        session()->setFlashdata('pesan', 'Data Berhasil ditambah.');
        return redirect()->to('/kegiatan');
    }
    public function detail($idKegiatan = false)
    {
        // $idKegiatan = $this->request->getVar('idKegiatan');

        $kegiatan = $this->kegiatanModel->getKegiatan($idKegiatan);
        $trxGiatBarang = $this->trxGiatBarangModel->findAll();

        $data = [
            'idKegiatan' => $idKegiatan,
            'kegiatan' => $kegiatan,
            'dasar' => $this->dasarModel->find($kegiatan['dasarId']),
            'pangkat' => $this->pangkatModel->find($kegiatan['pangkatId']),
            'trxGiatBarang' => $this->trxGiatBarangModel->where(['kegiatanId' => $idKegiatan])->findAll()
        ];
        d($data);
        return view('kegiatan/detail', $data);
    }
}
