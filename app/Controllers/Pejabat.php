<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PejabatModel;
use App\Models\PangkatModel;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Framework\Attributes\RequiresSetting;

class Pejabat extends BaseController
{
    protected $pejabatModel;
    protected $pangkatModel;

    public function __construct()
    {
        $this->pejabatModel = new PejabatModel();
        $this->pangkatModel = new PangkatModel();
    }
    public function index($keyword = false)
    {
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $pejabat = $this->pejabatModel->search($keyword);
        } else {
            $pejabat = $this->pejabatModel->join('pangkat', 'pangkat.idPangkat = pejabat.pangkatId')->orderBy('updated_at', 'DESC')->findAll();
        }

        $data = [
            'title' => 'Data Pejabat',
            'pejabat' => $pejabat,
            'pangkat' => $this->pangkatModel->findAll()
        ];

        return view('/pejabat/index', $data);
    }

    public function tambah()
    {
        $data =
            [
                'pangkat' => $this->pangkatModel->findAll()
            ];
        return view('/pejabat/tambah', $data);
    }

    public function simpan()
    {
        if ($this->pejabatModel->save([
            'namaPejabat' => $this->request->getVar('namaPejabat'),
            'pangkatId' => $this->request->getVar('idPangkat'),
            'NRP' => $this->request->getVar('NRP'),
            'jabatan' => $this->request->getVar('jabatan'),
        ])  == false) {
            // jika gagal simpan data
            $errors = $this->pejabatModel->errors();
            $data = [
                'title' => 'Tambah Data Satuan',
                'pangkat' => $this->pangkatModel->findAll(),
                'errors' => $errors,
            ];

            return view('/pejabat/tambah', $data);
        }

        session()->setFlashdata('pesan', 'Data pejabat berhasil ditambah.');
        return redirect()->to('/pejabat');
    }

    public function hapus($id)
    {
        echo 'ini halaman hapus dengan id' . $id;

        $this->pejabatModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/pejabat/');
    }
}
