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
}
