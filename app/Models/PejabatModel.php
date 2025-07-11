<?php

namespace App\Models;

use CodeIgniter\Model;

class PejabatModel extends Model
{
    protected $table            = 'pejabat';
    protected $primaryKey       = 'idPejabat';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [
        'namaPejabat',
        'pangkatId',
        'NRP',
        'jabatan'
    ];

    protected $validationRules = [
        'namaPejabat' => 'required|is_unique[pejabat.namaPejabat,idPejabat,{idPejabat}]',
    ];

    protected $validationMessages = [
        'namaPejabat' => [
            'required' => 'Nama harus diisi',
            'is_unique' => 'Nama tersebut sudah ada di database'
        ],

    ];

    public function search($keyword)
    {
        return $this->join('pangkat', 'pangkat.idPangkat = pejabat.pangkatId')
            ->like('namaPejabat', $keyword)
            ->orLike('pangkat', $keyword)
            ->orLike('NRP', $keyword)
            ->orLike('jabatan', $keyword)
            ->orderBy('pejabat.updated_at', 'DESC')
            ->findAll();
    }
}
