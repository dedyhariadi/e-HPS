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
    protected $validationRules = [
        'noSurat' => 'required|min_length[3]|max_length[100]|is_unique[dasarsurat.noSurat,idSurat,{idSurat}]',

    ];

    protected $validationMessages = [
        'noSurat' => [
            'required' => 'Nomor surat Harus Diisi',
            'min_length' => 'Minimal 3 Karakter',
            'max_length' => 'Maksimal 100 Karakter',
            'is_unique' => 'Nomor surat yang anda masukkan sudah ada sebelumnya'
        ]
    ];

    public function search($keyword)
    {
        return $this->like('noSurat', $keyword)
            ->orLike('tglSurat', $keyword)
            ->orLike('tentang', $keyword)
            ->orLike('pejabat', $keyword)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
    }
}
