<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferensiModel extends Model
{
    protected $table            = 'referensi';
    protected $primaryKey       = 'idReferensi';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [
        'sumberId',
        'link',
        'harga',
        'barangId'
    ];


    // Validation
    protected $validationRules      = [
        'sumberId' => 'required',
        'link'   => 'required',
        'harga'  => 'required|is_natural',
    ];

    protected $validationMessages   = [
        'sumberId' => [
            'required' => 'Sumber Harus Diisi'
        ],
        'link' => [
            'required' => 'Link Harus Diisi'
        ],
        'harga' => [
            'required' => 'Harga Harus Diisi',
            'is_natural' => 'Harga Harus Angka'
        ],
    ];


    public function getReferensi($idBarang = false)
    {
        if ($idBarang == false) {
            return $this->findAll();
        }
        return $this->where(['barangId' => $idBarang])->findAll();
    }
}
