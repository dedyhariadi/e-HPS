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
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
