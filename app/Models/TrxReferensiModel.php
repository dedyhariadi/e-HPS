<?php

namespace App\Models;

use CodeIgniter\Model;

class TrxReferensiModel extends Model
{
    protected $table            = 'trxreferensi';
    protected $primaryKey       = 'idTrxReferensi';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'trxGiatBarangId',
        'referensiId',
        'indeks'
    ];

    protected $validationRules      = [];
    protected $validationMessages   = [];
}
