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
        'namaBarang' => 'required|min_length[3]|max_length[50]|is_unique[barang.namaBarang,idBarang,{idBarang}]',
        'satuanId'   => 'required',
        // 'gambar'     => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        // 'gambar'     => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
    ];

    protected $validationMessages = [
        'namaBarang' => [
            'required' => 'Nama barang Harus Diisi',
            'min_length' => 'Minimal 3 Karakter',
            'max_length' => 'Maksimal 50 Karakter',
            'is_unique' => 'Barang yang anda masukkan sudah ada sebelumnya'
        ],
        'satuanId' => [
            'required' => 'Satuan Harus Dipilih'
        ],
        'gambar' => [
            // 'uploaded' => 'Harus ada gambar yang di upload',
            'max_size' => 'Ukuran Gambar Terlalu Besar',
            'is_image' => 'Yang Anda Pilih Bukan Gambar',
            'mime_in'  => 'Yang Anda Pilih Bukan Gambar'
        ]
    ];



    public function getBarang($id = false)
    {
        if ($id == false) {
            return $this->select('*,barang.created_at AS created_atBarang, barang.updated_at AS updated_atBarang, satuan.created_at AS created_atSatuan, satuan.updated_at AS updated_atSatuan ')
                ->join('satuan', 'satuan.idSatuan = barang.satuanId')
                ->orderBy('barang.updated_at', 'DESC')
                ->paginate(8, 'barang');
        }

        return $this->select('*,barang.created_at AS created_atBarang, barang.updated_at AS updated_atBarang, satuan.created_at AS created_atSatuan, satuan.updated_at AS updated_atSatuan ')
            ->join('satuan', 'satuan.idSatuan = barang.satuanId')
            ->orderBy('barang.updated_at', 'DESC')
            ->where(['idBarang' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->select('*,barang.created_at AS created_atBarang, barang.updated_at AS updated_atBarang, satuan.created_at AS created_atSatuan, satuan.updated_at AS updated_atSatuan ')
            ->join('satuan', 'satuan.idSatuan = barang.satuanId')
            ->like('namaBarang', $keyword)
            ->orLike('namaSatuan', $keyword)
            ->orderBy('barang.updated_at', 'DESC')
            ->findAll();
    }
}
