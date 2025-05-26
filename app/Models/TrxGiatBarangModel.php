<?php

namespace App\Models;

use CodeIgniter\Model;

class TrxGiatBarangModel extends Model
{
    protected $table            = 'trxgiatbarang';
    protected $primaryKey       = 'idTrxGiatBarang';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [
        'idTrxGiatBarang',
        'kegiatanId',
        'barangId',
        'kebutuhan',
        'jenis',
    ];


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
