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

        return view('dasarsurat/index', $data);
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

        $id = $this->request->getVar('idSurat'); // Ambil ID surat dari request

        $targetPath = ROOTPATH . 'public/assets/pdf'; // Path absolut ke direktori tujuan
        $namaFileUntukDB = $this->dasarSuratModel->find($id)['filePdf'] ?? null; // Ambil nama file dari database

        // Jika ada file lama (bukan 'noFile.pdf' atau null), hapus file lama untuk menghemat ruang
        if ($namaFileUntukDB && $namaFileUntukDB !== 'noFile.pdf' && file_exists($targetPath . '/' . $namaFileUntukDB)) {
            unlink($targetPath . '/' . $namaFileUntukDB);
        }


        try {
            $this->dasarSuratModel->delete($id);
            session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        } catch (\Exception $e) {
            if ($e->getCode() == 1451) {
                session()->setFlashdata('error', 'Gagal menghapus data: Dasar surat ini sedang digunakan di kegiatan.');
            } else {
                // Tangani error lainnya
                session()->setFlashdata('error', 'Gagal menghapus data: ' . $e->getMessage());
            }
        }
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
        // Menambahkan aturan validasi pada ID surat (ini tidak terkait dengan upload file, jadi tetap biarkan)
        $idSuratField = 'idSurat'; // Gunakan nama variabel yang lebih deskriptif
        $aturanId = 'max_length[19]|is_natural_no_zero';
        $this->dasarSuratModel->setValidationRule($idSuratField, $aturanId);

        // 1. Inisialisasi variabel untuk nama file PDF yang akan disimpan ke DB
        // Ambil nama file PDF lama dari database berdasarkan ID surat
        $suratLama = $this->dasarSuratModel->find($id);
        $namaFileUntukDB = $suratLama['filePdf'] ?? null; // Default null jika tidak ada file lama

        // 2. Tangani Unggahan File Baru (Jika ada)
        $filePdf = $this->request->getFile('filePdf'); // 'filePdf' adalah nama input di form HTML

        // Cek apakah ada file baru yang diunggah dan valid
        // getError() == 4 artinya UPLOAD_ERR_NO_FILE (tidak ada file diunggah)
        if ($filePdf && $filePdf->getError() !== UPLOAD_ERR_NO_FILE) {
            // File diunggah, sekarang validasi file ini

            // Logika validasi file di controller, bukan di model.
            $validationRules = [
                'filePdf' => [ // Pastikan nama field ini cocok dengan input form
                    'uploaded[filePdf]', // Pastikan file benar-benar diunggah
                    'mime_in[filePdf,application/pdf]', // Hanya izinkan tipe MIME PDF
                    'max_size[filePdf,2048]', // Ukuran maksimum 2MB
                ],
            ];

            // Tambahkan pesan validasi kustom
            $validationMessages = [
                'filePdf' => [
                    'uploaded' => 'Anda harus mengunggah file PDF.',
                    'mime_in'  => 'File yang Anda unggah harus berformat PDF.',
                    'max_size' => 'Ukuran file PDF tidak boleh melebihi 2MB.',
                ],
            ];

            // Lakukan validasi menggunakan Validator CI4
            if (! $this->validate($validationRules, $validationMessages)) {
                // Jika validasi gagal, kembalikan ke form edit dengan error
                $errors = $this->validator->getErrors();
                $data = [
                    'title' => 'Edit Dasar Surat',
                    'errors' => $errors,
                    'surat' => $suratLama // Pastikan data surat lama tetap ditampilkan
                ];
                return view('/dasarsurat/edit', $data);
            }

            // Jika validasi file berhasil, pindahkan file
            $namaFileBaru = $filePdf->getRandomName(); // Menghasilkan nama unik
            $targetPath = ROOTPATH . 'public/assets/pdf'; // Path absolut ke direktori tujuan

            // Pastikan direktori tujuan ada dan dapat ditulis
            if (!is_dir($targetPath)) {
                // mkdir akan mengembalikan true jika berhasil, false jika gagal
                if (!mkdir($targetPath, 0777, true)) {
                    // Tangani error jika gagal membuat direktori
                    $errors = ['filePdf' => 'Gagal membuat direktori unggahan.'];
                    $data = [
                        'title' => 'Edit Dasar Surat',
                        'errors' => $errors,
                        'surat' => $suratLama
                    ];
                    return view('/dasarsurat/edit', $data);
                }
            }

            try {
                $filePdf->move($targetPath, $namaFileBaru);

                // Jika ada file lama yang berhasil dipindahkan, hapus file lama untuk menghemat ruang
                if ($namaFileUntukDB && file_exists($targetPath . '/' . $namaFileUntukDB)) {
                    unlink($targetPath . '/' . $namaFileUntukDB);
                }

                // Perbarui nama file yang akan disimpan ke database dengan nama file baru
                $namaFileUntukDB = $namaFileBaru;
            } catch (\Exception $e) {
                // Tangani error jika gagal memindahkan file (misalnya karena izin)
                $errors = ['filePdf' => 'Gagal memindahkan file: ' . $e->getMessage()];
                $data = [
                    'title' => 'Edit Dasar Surat',
                    'errors' => $errors,
                    'surat' => $suratLama
                ];
                return view('/dasarsurat/edit', $data);
            }
        }
        // Jika tidak ada file baru diunggah ($filePdf->getError() == UPLOAD_ERR_NO_FILE),
        // $namaFileUntukDB akan tetap berisi nama file lama dari database.

        // 3. Siapkan data untuk disimpan ke database
        $dataToSave = [
            'idSurat'  => $id,
            'noSurat'  => $this->request->getVar('noSurat'),
            'tglSurat' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tglSurat'))),
            'pejabat'  => $this->request->getVar('pejabat'),
            'tentang'  => $this->request->getVar('tentang'),
            'filePdf'  => $namaFileUntukDB // Gunakan nama file yang sudah diproses (baru atau lama)
        ];

        // 4. Coba simpan data ke model
        // PENTING: Pastikan tidak ada aturan validasi file (uploaded, mime_in, dll.) di DasarsuratModel.php
        if ($this->dasarSuratModel->save($dataToSave) === false) { // Gunakan === false untuk perbandingan yang lebih ketat
            // jika gagal simpan data (ini akan menangkap error validasi dari model,
            // tetapi BUKAN error file upload lagi karena sudah divalidasi dan dipindahkan sebelumnya)
            $errors = $this->dasarSuratModel->errors();
            $data = [
                'title' => 'Edit Dasar Surat',
                'errors' => $errors,
                'surat' => $suratLama // Pastikan data surat lama tetap dikirim ke view
            ];
            return view('/dasarsurat/edit', $data);
        }

        // Jika berhasil
        session()->setFlashdata('pesan', 'Data Dasar Surat berhasil diubah.');
        return redirect()->to('/dasarsurat');
    }
}
