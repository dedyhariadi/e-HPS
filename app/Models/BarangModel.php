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

    public function getBarang($id = false)
    {
        if ($id == false) {
            return $this->join('satuan', 'satuan.idSatuan = barang.satuanId')->findAll();
        }

        return $this->join('satuan', 'satuan.idSatuan = barang.satuanId')->where(['idBarang' => $id])->first();
    }
}
