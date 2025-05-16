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

    protected $validationRules = [
        'namaBarang' => 'required|min_length[3]|max_length[50]|is_unique[barang.namaBarang]',
        'satuanId'   => 'required',
        'gambar'     => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
    ];

    public function getBarang($id = false)
    {
        if ($id == false) {
            return $this->join('satuan', 'satuan.idSatuan = barang.satuanId')->findAll();
        }

        return $this->join('satuan', 'satuan.idSatuan = barang.satuanId')->where(['idBarang' => $id])->first();
    }
}
