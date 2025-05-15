<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kegiatan extends BaseController
{
    public function index()
    {
        return view('kegiatan/index');
    }
}
