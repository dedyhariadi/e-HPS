<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table            = 'kegiatan';
    protected $primaryKey       = 'idKegiatan';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'idKegiatan',
        'namaKegiatan',
        'noSurat',
        'tglSurat',
        'pejabatId',
        'dasarId',
    ];

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];

    protected $validationRules = [
        'namaKegiatan' => 'required|min_length[3]|max_length[50]|is_unique[barang.namaBarang,idBarang,{idBarang}]',
    ];

    protected $validationMessages = [
        'namaKegiatan' => [
            'required' => 'Nama barang Harus Diisi',
            'min_length' => 'Minimal 3 Karakter',
            'max_length' => 'Maksimal 50 Karakter',
            'is_unique' => 'Barang yang anda masukkan sudah ada sebelumnya'
        ]
    ];




    public function getKegiatan($id = false)
    {
        // $this->kegiatanModel->->findAll()
        if ($id == false) {
            return $this->join('pejabat', 'pejabat.idPejabat=kegiatan.pejabatId')->orderBy('kegiatan.updated_at', 'DESC')->findAll();
        }

        return $this->join('pejabat', 'pejabat.idPejabat=kegiatan.pejabatId')->where(['idKegiatan' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->join('pejabat', 'pejabat.idPejabat=kegiatan.pejabatId')->like('namaKegiatan', $keyword)->orLike('noSurat', $keyword)->orLike('tglSurat', $keyword)->orLike('namaPejabat', $keyword)->findAll();
    }
}
