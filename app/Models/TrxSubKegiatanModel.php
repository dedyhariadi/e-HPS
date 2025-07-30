<?php

namespace App\Models;

use CodeIgniter\Model;

class TrxSubKegiatanModel extends Model
{
    protected $table            = 'trxsubkegiatan';
    protected $primaryKey       = 'idTrxSubKegiatan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'idTrxSubKegiatan',
        'subKegiatanId',
        'trxGiatBarangId',
    ];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
