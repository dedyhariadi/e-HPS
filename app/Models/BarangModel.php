<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'idBarang';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [
        'idBarang',
        'namaBarang',
        'gambar',
        'satuanId',
        'created_at',
        'updated_at',
    ];
}
