<?php

namespace App\Controllers;

use App\Models\DasarSuratModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dasarsurat extends BaseController
{
    protected $dasarSuratModel;

    public function __construct()
    {
        $this->dasarSuratModel = new DasarSuratModel();
    }
    public function index()
    {
        echo "ini halaman index dasar surat";
        $data =
            [
                'dasarSurat' => $this->dasarSuratModel->findAll()
            ];

        return view('/dasarsurat/index', $data);
    }
}
