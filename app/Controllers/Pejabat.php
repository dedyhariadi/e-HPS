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

    public function edit($idPejabat, $errors = false)
    {

        $data = [
            'title' => 'Form Ubah Data Pejabat',
            'pejabat' => $this->pejabatModel->find($idPejabat),
            'pangkat' => $this->pangkatModel->findAll(),
            'errors' => $errors
        ];
        d($data);
        return view('pejabat/edit', $data);
    }

    public function proses_edit()
    {
        d($this->request->getVar());

        // menambahkan aturan validasi pada ID barang untuk ignore namaBarang yang sama dengan sebelumnya
        $idPejabat = 'idPejabat';
        $aturan = 'max_length[19]|is_natural_no_zero';
        $this->pejabatModel->setValidationRule($idPejabat, $aturan);

        if ($this->pejabatModel->save([
            'idPejabat' => $this->request->getVar('idPejabat'),
            'namaPejabat' => $this->request->getVar('namaPejabat'),
            'pangkatId' => $this->request->getVar('idPangkat'),
            'NRP' => $this->request->getVar('NRP'),
            'jabatan' => $this->request->getVar('jabatan'),
        ]) == false) {
            // jika gagal menyimpan
            $errors = $this->pejabatModel->errors();
            $data = [
                'tittle' => 'update data pejabat',
                'errors' => $errors,
                'pejabat' => $this->pejabatModel->find($this->request->getVar('idPejabat')),
                'pangkat' => $this->pangkatModel->findAll()
            ];
            return view('pejabat/edit', $data);
        }
        //jika sukses, kembali ke index pejabat
        session()->setFlashdata('pesan', 'Data pejabat berhasil diubah ');
        return redirect()->to('/pejabat');
    }
}
