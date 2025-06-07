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
    public function index($keyword = false)
    {


        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $dasarsurat = $this->dasarSuratModel->search($keyword);
        } else {
            $dasarsurat = $this->dasarSuratModel->orderBy('updated_at', 'DESC')->findAll();
        }

        $data =
            [
                'dasarSurat' => $dasarsurat
            ];

        return view('/dasarsurat/index', $data);
    }

    public function tambah()
    {
        // echo "ini halaman tambah surat";

        $data = [
            'judul' => 'tambah dasar satuan'
        ];
        return view('dasarsurat/tambah', $data);
    }

    public function simpan($filePdf = false)
    {
        // d($this->request->getVar());
        // d($this->request->getFile('filePdf'));

        $filePdf = $this->request->getFile('filePdf');  // ambil filePdf

        // cek apakah ada gambar yang diupload
        if ($filePdf->getError() == 4) {
            $namaFile = 'noFile.pdf';
        } else {
            $namaFile = $filePdf->getRandomName();
            $filePdf->move('assets/pdf', $namaFile); //pindahkan file ke folder upload pdf
        }

        // proses simpan ke database
        if ($this->dasarSuratModel->save([
            'noSurat' => $this->request->getVar('noSurat'),
            'tglSurat' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tglSurat'))),
            'pejabat' => $this->request->getVar('pejabat'),
            'tentang' => $this->request->getVar('tentang'),
            'filePdf' => $namaFile
        ]) == false) {
            // jika gagal simpan data
            $errors = $this->dasarSuratModel->errors();
            $data = [
                'title' => 'Tambah Dasar Surat',
                'pejabat' => $this->dasarSuratModel->findAll(),
                'errors' => $errors,
            ];
            return view('/dasarsurat/tambah', $data);
        }

        // kembali ke index kegiatan
        session()->setFlashdata('pesan', 'Data Berhasil ditambah.');
        return redirect()->to('/dasarsurat');
    }

    public function hapus()
    {
        // d($this->request->getVar());
        echo "ini halaman kontroller dasarsurat method hapus";

        $this->dasarSuratModel->delete($this->request->getVar('idSurat'));

        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/dasarsurat/');
    }

    public function edit($idSurat, $errors = false)
    {

        $data = [
            'title' => 'Form Ubah Data Dasar Surat',
            'surat' => $this->dasarSuratModel->find($idSurat),
            'errors' => $errors,
        ];
        return view('dasarsurat/edit', $data);
    }

    public function prosesedit($id)
    {
        // menambahkan aturan validasi pada ID barang untuk ignore namaBarang yang sama dengan sebelumnya
        $idSurat = 'idSurat';
        $aturan = 'max_length[19]|is_natural_no_zero';
        $this->dasarSuratModel->setValidationRule($idSurat, $aturan);


        $filePdf = $this->request->getFile('filePdf');  // ambil filePdf

        // cek apakah ada gambar yang diupload
        if ($filePdf->getError() == 4) {
            $namaFile = 'noFile.pdf';
        } else {
            $namaFile = $filePdf->getRandomName();
            $filePdf->move('assets/pdf', $namaFile); //pindahkan file ke folder upload pdf
        }

        // proses simpan ke database
        if ($this->dasarSuratModel->save([
            'idSurat' => $id,
            'noSurat' => $this->request->getVar('noSurat'),
            'tglSurat' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tglSurat'))),
            'pejabat' => $this->request->getVar('pejabat'),
            'tentang' => $this->request->getVar('tentang'),
            'filePdf' => $namaFile
        ]) == false) {
            // jika gagal simpan data
            $errors = $this->dasarSuratModel->errors();
            $data = [
                'title' => 'Tambah Dasar Surat',
                'errors' => $errors,
                'surat' => $this->dasarSuratModel->find($id)
            ];
            return view('/dasarsurat/edit', $data);
        }

        // kembali ke index kegiatan
        session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        return redirect()->to('/dasarsurat');
    }
}
