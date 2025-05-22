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

    public function search($keyword)
    {
        return $this->like('namaPejabat', $keyword)
            ->orLike('pangkat', $keyword)
            ->orLike('NRP', $keyword)
            ->orLike('jabatan', $keyword)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
    }
}
