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
        $data =
            [
                'dasarSurat' => $this->dasarSuratModel->findAll()
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
}
