<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SatuanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    protected $satuanModel;

    public function __construct()
    {
        $this->satuanModel = new satuanModel();
    }

    public function index($tandaKeyword = false)
    {
        $data = [
            'title' => 'Data satuan',
            'satuan' => $this->satuanModel->findAll(),
            'tandaKeyword' => $tandaKeyword,
        ];
        return view('/satuan/index', $data);
        // d($this->pejabatModel->findAll());
    }
}
