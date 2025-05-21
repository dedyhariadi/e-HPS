<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PejabatModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pejabat extends BaseController
{
    protected $pejabatModel;

    public function __construct()
    {
        $this->pejabatModel = new PejabatModel();
    }
    public function index($tandaKeyword = false)
    {
        $data = [
            'title' => 'Data Pejabat',
            'pejabat' => $this->pejabatModel->findAll(),
            'tandaKeyword' => $tandaKeyword,
        ];
        return view('/pejabat/index', $data);
        // d($this->pejabatModel->findAll());
    }
}
