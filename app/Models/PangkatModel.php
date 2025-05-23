<?php

namespace App\Models;

use CodeIgniter\Model;

class PangkatModel extends Model
{
    protected $table            = 'pangkat';
    protected $primaryKey       = 'idPangkat';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [
        'pangkat'
    ];
}
