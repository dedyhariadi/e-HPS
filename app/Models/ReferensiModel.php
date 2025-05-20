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
        'sumber',
        'link',
        'harga',
        'barangId'
    ];


    // Validation
    protected $validationRules      = [
        'sumber' => 'required',
        'link'   => 'required',
        'harga'  => 'required|is_natural',
    ];

    protected $validationMessages   = [
        'sumber' => [
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
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getReferensi($idBarang = false)
    {
        if ($idBarang == false) {
            return $this->findAll();
        }
        return $this->where(['barangId' => $idBarang])->findAll();
    }
}
