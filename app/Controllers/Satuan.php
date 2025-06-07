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
        $this->satuanModel =  new satuanModel();
    }

    public function index($keyword = false)
    {
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $satuan = $this->satuanModel->search($keyword);
        } else {
            $satuan = $this->satuanModel->orderBy('updated_at', 'DESC')->findAll();
        }

        $data = [
            'title' => 'Data Satuan',
            'satuan' => $satuan,
        ];

        return view('/satuan/index', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Data Satuan',
        ];

        return view('/satuan/tambah', $data);
    }

    public function simpan()
    {
        if ($this->satuanModel->save([
            'namaSatuan' => $this->request->getVar('namaSatuan'),
        ])  == false) {
            // jika gagal simpan data
            $errors = $this->satuanModel->errors();
            $data = [
                'title' => 'Tambah Data Satuan',
                'errors' => $errors,
            ];

            return view('/satuan/tambah', $data);
        }

        session()->setFlashdata('pesan', 'Data satuan berhasil ditambah.');
        return redirect()->to('/satuan');
    }

    public function edit($idSatuan)
    {

        $data = [
            'title' => 'Data Satuan',
            'satuan' => $this->satuanModel->find($idSatuan)
        ];

        return view('/satuan/edit', $data);
    }

    public function prosesedit()
    {
        d($this->request->getVar());

        $idSatuan = 'idSatuan';
        $aturan = 'max_length[19]|is_natural_no_zero';
        $this->satuanModel->setValidationRule($idSatuan, $aturan);

        if ($this->satuanModel->save([
            'idSatuan' => $this->request->getVar('idSatuan'),
            'namaSatuan' => $this->request->getVar('namaSatuan'),
        ])  == false) {
            // jika gagal simpan data
            $errors = $this->satuanModel->errors();
            $data = [
                'title' => 'Tambah Data Satuan',
                'errors' => $errors,
            ];

            return view('/satuan/tambah', $data);
        }

        session()->setFlashdata('pesan', 'Data satuan berhasil ditambah.');
        return redirect()->to('/satuan');
    }

    public function hapus($id)
    {

        $this->satuanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/satuan');
    }
}
