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
        'filePdf',
    ];

    // Validation


    protected $validationRules = [
        'namaKegiatan' => 'required|min_length[3]|max_length[100]|is_unique[kegiatan.namaKegiatan,idKegiatan,{idKegiatan}]',
    ];

    protected $validationMessages = [
        'namaKegiatan' => [
            'required' => 'Nama kegiatan Harus Diisi',
            'min_length' => 'Minimal 3 Karakter',
            'max_length' => 'Maksimal 100 Karakter',
            'is_unique' => 'Barang yang anda masukkan sudah ada sebelumnya'
        ]
    ];

    public function getKegiatan($id = false)
    {
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
