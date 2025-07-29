<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKegiatanModel extends Model
{
    protected $table            = 'subkegiatan';
    protected $primaryKey       = 'idSubKegiatan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'idSubKegiatan',
        'nama',
        'kegiatanId',
        'created_at',
        'updated_at',
    ];

    protected $validationRules = [
        'nama' => 'required|is_unique[subkegiatan.nama,idSubKegiatan,{idSubKegiatan}]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama Sub Kegiatan Harus Diisi',
            'is_unique' => 'Sub Kegiatan yang anda masukkan sudah ada'
        ],

    ];
    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;
}
