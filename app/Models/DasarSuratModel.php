<?php

namespace App\Models;

use CodeIgniter\Model;

class DasarSuratModel extends Model
{
    protected $table            = 'dasarsurat';
    protected $primaryKey       = 'idSurat';
    protected $useTimestamps = true;
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'noSurat',
        'tglSurat',
        'tentang',
        'pejabat',
        'filePdf'
    ];


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
