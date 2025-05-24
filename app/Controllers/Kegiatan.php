<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use App\Models\BarangModel;
use App\Models\SatuanModel;
use App\Models\ReferensiModel;
use App\Models\SumberModel;
use CodeIgniter\HTTP\ResponseInterface;

class Kegiatan extends BaseController
{
    protected $barangModel;
    protected $satuanModel;
    protected $referensiModel;
    protected $sumberModel;
    protected $kegiatanModel;
    public function __construct()
    {
        // Load the model
        $this->barangModel = new BarangModel();
        $this->satuanModel = new SatuanModel();
        $this->referensiModel = new ReferensiModel();
        $this->sumberModel = new SumberModel();
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $this->kegiatanModel->join('pejabat', 'pejabat.idPejabat=kegiatan.pejabatId')->findAll(),
        ];
        return view('kegiatan/index', $data);
    }
}
