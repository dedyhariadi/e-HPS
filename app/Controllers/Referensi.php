<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\ReferensiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Referensi extends BaseController
{

    protected $barangModel;
    protected $referensiModel;

    public function __construct()
    {
        // Load the model
        $this->barangModel = new BarangModel();
        $this->referensiModel = new ReferensiModel();
    }

    public function create($idBarang)
    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->barangModel->getBarang($idBarang),
            'barangRef' => $this->barangModel->join('referensi', 'referensi.barangId=barang.idBarang')->where(['idBarang' => $idBarang])->findAll(),
            'referensi' => $this->referensiModel->getReferensi($idBarang)
        ];

        // jika data barang tidak ada di tabel
        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Barang tidak ditemukan');
        }

        return view('referensi/create', $data);
    }

    public function save()
    {
        $idBarang = $this->request->getVar('barangId');

        $data = [
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link'),
            'harga' => $this->request->getVar('harga'),
            'barangId' => $idBarang
        ];

        if (!$this->referensiModel->save($data)) {
            $errors = $this->referensiModel->errors();

            $data = [
                'title' => 'Detail Barang',
                'barang' => $this->barangModel->getBarang($idBarang),
                'barangRef' => $this->barangModel->join('referensi', 'referensi.barangId=barang.idBarang')->where(['idBarang' => $idBarang])->findAll(),
                'referensi' => $this->referensiModel->getReferensi($idBarang),
                'errors' => $errors,
            ];

            d($errors);
            return view('/referensi/create', $data);
        }

        session()->setFlashdata('pesan', 'Data referensi berhasil ditambahkan');
        return redirect()->to('/barang/' . $this->request->getVar('barangId'));
    }

    public function hapus($id)
    {
        $this->referensiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/barang/' . $this->request->getVar('idBarang'));
    }

    public function edit($idReferensi)
    {

        $idBarang = $this->referensiModel->find($idReferensi)['barangId'];

        $data = [
            'title' => 'Update Data Referensi',
            'barang' => $this->barangModel->getBarang($idBarang),
            'barangRef' => $this->barangModel->join('referensi', 'referensi.barangId=barang.idBarang')->where(['idBarang' => $idBarang])->findAll(),
            'referensi' => $this->referensiModel->getReferensi($idBarang)
        ];
        // dd($data);
        // jika data barang tidak ada di tabel
        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Barang tidak ditemukan');
        }



        return view('referensi/edit', $data);
    }
}
