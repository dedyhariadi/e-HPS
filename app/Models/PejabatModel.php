<?php

namespace App\Models;

use CodeIgniter\Model;

class PejabatModel extends Model
{
    protected $table            = 'pejabat';
    protected $primaryKey       = 'idPejabat';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [];
}
