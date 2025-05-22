<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'idSatuan';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'idSatuan',
        'namaSatuan',
        'created_at',
        'updated_at',
    ];

    protected $validationRules = [
        'namaSatuan' => 'required|is_unique[satuan.namaSatuan,idSatuan,{idSatuan}]',
    ];

    protected $validationMessages = [
        'namaSatuan' => [
            'required' => 'Nama Satuan Harus Diisi',
            'is_unique' => 'Satuan yang anda masukkan sudah ada'
        ],

    ];

    public function search($keyword)
    {
        return $this->like('namaSatuan', $keyword)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
    }
}
