<?php

namespace App\Models;

use CodeIgniter\Model;

class SumberModel extends Model
{
    protected $table            = 'sumber';
    protected $primaryKey       = 'idSumber';
    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $allowedFields    = [];
}
