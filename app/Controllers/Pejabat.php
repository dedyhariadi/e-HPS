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
    public function index($keyword = false)
    {
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $pejabat = $this->pejabatModel->search($keyword);
        } else {

            $pejabat = $this->pejabatModel->findAll();
        }

        $data = [
            'title' => 'Data Pejabat',
            'pejabat' => $pejabat,
        ];

        return view('/pejabat/index', $data);
        // d($this->pejabatModel->findAll());
    }
}
