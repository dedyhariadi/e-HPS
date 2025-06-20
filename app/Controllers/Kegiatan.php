<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use App\Models\BarangModel;
use App\Models\SatuanModel;
use App\Models\ReferensiModel;
use App\Models\SumberModel;
use App\Models\PejabatModel;
use App\Models\DasarSuratModel;
use App\Models\PangkatModel;
use App\Models\TrxGiatBarangModel;
use App\Models\TrxReferensiModel;
use App\Models\TrxReferensModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Kegiatan extends BaseController
{
    protected $barangModel;
    protected $satuanModel;
    protected $referensiModel;
    protected $sumberModel;
    protected $kegiatanModel;
    protected $pejabatModel;
    protected $dasarModel;
    protected $pangkatModel;
    protected $trxGiatBarangModel;
    protected $trxReferensiModel;

    public function __construct()
    {
        // Load the model
        $this->barangModel = new BarangModel();
        $this->satuanModel = new SatuanModel();
        $this->referensiModel = new ReferensiModel();
        $this->sumberModel = new SumberModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->pejabatModel = new PejabatModel();
        $this->dasarModel = new DasarSuratModel();
        $this->pangkatModel = new PangkatModel();
        $this->trxGiatBarangModel = new TrxGiatBarangModel();
        $this->trxReferensiModel = new TrxReferensiModel();
    }

    public function index($keyword = false)
    {

        // proses pencarian
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $kegiatan = $this->kegiatanModel->search($keyword);
        } else {

            $kegiatan = $this->kegiatanModel->getKegiatan();
        }

        $data = [
            'title' => 'Daftar Kegiatan',
            'bulan' => $this->bulan,
            'kegiatan' => $kegiatan
        ];

        return view('kegiatan/index', $data);
    }

    public function tambah($errors = false)
    {
        $data = [
            'title' => 'Tambah Kegiatan',
            'kegiatan' => $this->kegiatanModel->getKegiatan(),
            'pejabat' => $this->pejabatModel->findAll(),
            'dasar' => $this->dasarModel->findAll(),
            'errors' => $errors,
        ];

        return view('kegiatan/tambah', $data);
    }

    public function simpan($filePdf = false)
    {
        $filePdf = $this->request->getFile('filePdf');  // ambil filePdf

        // cek apakah ada gambar yang diupload
        if ($filePdf->getError() == 4) {
            $namaFile = 'noFile.pdf';
        } else {
            $namaFile = $filePdf->getRandomName();
            $filePdf->move('assets/pdf', $namaFile); //pindahkan file ke folder upload pdf
        }

        // proses simpan ke database
        if ($this->kegiatanModel->save([
            'namaKegiatan' => $this->request->getVar('namaKegiatan'),
            'noSurat' => $this->request->getVar('noSurat'),
            'tglSurat' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tglSurat'))),
            'pejabatId' => $this->request->getVar('pejabatId'),
            'dasarId' => $this->request->getVar('suratId'),
            'filePdf' => $namaFile
        ]) == false) {
            // jika gagal simpan data
            $errors = $this->kegiatanModel->errors();
            $data = [
                'title' => 'Tambah Data Kegiatan',
                'pejabat' => $this->pejabatModel->findAll(),
                'dasar' => $this->dasarModel->findAll(),
                'errors' => $errors,
            ];
            return view('/kegiatan/tambah', $data);
        }

        // kembali ke index kegiatan
        session()->setFlashdata('pesan', 'Data Berhasil ditambah.');
        return redirect()->to('/kegiatan');
    }


    public function detail($idKegiatan = false)
    {
        d($this->request->getVar());
        $tandaTambah = $this->request->getVar('tandaTambah');

        // proses menambah barang ke kegiatan
        if ($tandaTambah == 1) {
            $tambahBarang = $this->request->getVar();
            if ($tambahBarang) {
                if ($this->trxGiatBarangModel->save([
                    'kegiatanId' => $idKegiatan,
                    'barangId' => $this->request->getVar('idBarang'),
                    'kebutuhan' => $this->request->getVar('kebutuhan'),
                    'jenis' => 'utama', // default jenis utama
                ]) == false) {
                    // jika gagal simpan data
                    $errors = $this->trxGiatBarangModel->errors();
                    echo "Gagal menyimpan di trxGiatBarangModel";
                    die;
                } else {
                    session()->setFlashdata('pesan', 'Data Barang Berhasil ditambahkan.');
                }
            }
        }

        // proses menambah referensi ke trxreferensi
        if ($tandaTambah == 2) {
            $tambahReferensi = $this->request->getVar();
            if ($tambahReferensi) {
                if ($this->trxReferensiModel->save([
                    'trxGiatBarangId' => $this->request->getVar('trxGiatBarangId'),
                    'referensiId' => $this->request->getVar('referensiId'),
                    'indeks' => $this->request->getVar('indeksKe'),
                ]) == false) {
                    // jika gagal simpan data
                    $errors = $this->trxReferensiModel->errors();
                    echo "Gagal menyimpan di trx referensi";
                    die;
                } else {
                    session()->setFlashdata('pesan', 'Referensi Berhasil ditambahkan.');
                }
            }
        }

        $kegiatan = $this->kegiatanModel->getKegiatan($idKegiatan);

        $data = [
            'idKegiatan' => $idKegiatan,
            'kegiatan' => $kegiatan,
            'dasar' => $this->dasarModel->find($kegiatan['dasarId']),
            'pangkat' => $this->pangkatModel->find($kegiatan['pangkatId']),
            'trxGiatBarang' => $this->trxGiatBarangModel->where(['kegiatanId' => $idKegiatan])->findAll(),
            'barang' => $this->barangModel->join('satuan', 'satuan.idSatuan=barang.satuanId')->findAll(),
            'referensi' => $this->referensiModel->join('sumber', 'sumber.idSumber=referensi.sumberId')->findAll(),
            'trxReferensi' => $this->referensiModel->join('trxreferensi', 'trxreferensi.referensiId=referensi.idReferensi')->findAll(),
            'sumber' => $this->sumberModel->findAll()
        ];

        return view('kegiatan/detail', $data);
    }

    public function hapus($id)
    {





        try {
            // Logika untuk menghapus pejabat (yang mungkin akan memicu error)
            $this->pejabatModel->delete($pejabatId);

            // Jika berhasil
            return redirect()->to('/daftar-pejabat')->with('success', 'Pejabat berhasil dihapus.');
        } catch (DatabaseException $e) {
            // Tangkap exception spesifik untuk foreign key constraint
            if (strpos($e->getMessage(), '1451') !== false || strpos($e->getMessage(), 'foreign key constraint fails') !== false) {
                return redirect()->to('/daftar-pejabat')->with('error', 'Tidak dapat menghapus pejabat ini karena masih ada kegiatan yang terkait dengannya. Harap hapus kegiatan terkait terlebih dahulu.');
            } else {
                // Tangani error database lainnya
                return redirect()->to('/daftar-pejabat')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
            }
        } catch (\Exception $e) {
            // Tangani exception umum lainnya
            return redirect()->to('/daftar-pejabat')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }






        // proses hapus data barang
        if (!$this->request->getVar('tandaHapus')) {
            try {
                $id = $this->request->getVar('idTrxGiatBarang');
            } catch (\Exception $e) {
                // Tangani error jika idTrxGiatBarang tidak ditemukan
                session()->setFlashdata('error', 'ID Barang tidak ditemukan.');
                return redirect()->to('/kegiatan/' . $this->request->getVar('idKegiatan'));
            }

            // Proses hapus di tabel trxGiatBarang
            
            $this->trxGiatBarangModel->delete($id);
            $this->trxReferensiModel->where(['trxGiatBarangId' => $id])->delete();
            session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
            return redirect()->to('/kegiatan/' . $this->request->getVar('idKegiatan'));
        }

        // proses hapus di tabel trxReferensi
        if ($this->request->getVar('tandaHapus') == 1) {
            $idReferensi = $this->request->getVar('idReferensi');
            $indeksKe = $this->request->getVar('indeksKe');
            $this->trxReferensiModel->where(['trxGiatBarangId' => $id])->where(['referensiId' => $idReferensi])->where(['indeks' => $indeksKe])->delete();

            session()->setFlashdata('pesan', 'Data Referensi Berhasil dihapus.');
            return redirect()->to('/kegiatan/' . $this->request->getVar('idKegiatan'));
        }



        $listBarang = $this->trxGiatBarangModel->where(['kegiatanId' => $id])->findAll();

        // proses hapus di tabel trxReferensi
        foreach ($listBarang as $list) :
            $this->trxReferensiModel->where(['trxGiatBarangId' => $list['idTrxGiatBarang']])->delete();
        endforeach;

        $targetPath = ROOTPATH . 'public/assets/pdf'; // Path absolut ke direktori tujuan
        $namaFileUntukDB = $this->kegiatanModel->find($id)['filePdf'] ?? null; // Ambil nama file dari database

        // Jika ada file lama (bukan 'noFile.pdf' atau null), hapus file lama untuk menghemat ruang
        if ($namaFileUntukDB && $namaFileUntukDB !== 'noFile.pdf' && file_exists($targetPath . '/' . $namaFileUntukDB)) {
            unlink($targetPath . '/' . $namaFileUntukDB);
        }

        $this->trxGiatBarangModel->where(['kegiatanId' => $id])->delete(); //hapus di tabel trxGiatBarang
        $this->kegiatanModel->delete($id); //hapus di tabel Kegiatan

        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/kegiatan');
    }


    public function cetakPdf($kegiatanId = false)
    {
        ob_start(); // Mulai output buffering
        $tandaTambah = $this->request->getVar('tandaTambah');


        $kegiatan = $this->kegiatanModel->getKegiatan($kegiatanId);

        $data = [
            'bulan' => $this->bulan,
            'idKegiatan' => $kegiatanId,
            'kegiatan' => $kegiatan,
            'dasar' => $this->dasarModel->find($kegiatan['dasarId']),
            'pangkat' => $this->pangkatModel->find($kegiatan['pangkatId']),
            'trxGiatBarang' => $this->trxGiatBarangModel->where(['kegiatanId' => $kegiatanId])->findAll(),
            'barang' => $this->barangModel->join('satuan', 'satuan.idSatuan=barang.satuanId')->findAll(),
            'referensi' => $this->referensiModel->join('sumber', 'sumber.idSumber=referensi.sumberId')->findAll(),

            'trxReferensi' => $this->referensiModel->join('trxreferensi', 'trxreferensi.referensiId=referensi.idReferensi')->findAll(),
            'sumber' => $this->sumberModel->findAll()
        ];

        ob_end_clean(); //untuk memperbaiki tulisan failed to load PDF document

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', true);
        $options->set('ishtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);


        $dompdf = new Dompdf($options);
        $html = view('kegiatan/cetakPdf', $data);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render(); //untuk mendapatkan jumlah halaman pdf

        $canvas = $dompdf->getCanvas();
        $totalPages = $canvas->get_page_count(); // Mendapatkan jumlah halaman PDF
        $data['jumlahHalaman'] = $totalPages;
        // dd($data);

        $dompdf = new Dompdf($options); // Membuat instance baru untuk menghindari error
        $html2 = view('kegiatan/cetakPdf', $data);
        $dompdf->loadHtml($html2);

        $dompdf->render(); //render ulang untuk mengirim jumlahHalaman
        $dompdf->stream('kegiatanku.pdf', array(
            'Attachment' => 0 // 0 untuk menampilkan di browser, 1 untuk mengunduh

        ));
    }

    public function edit($idKegiatan = false, $errors = false)
    {

        $data = [
            'title' => 'Edit Kegiatan',
            'kegiatan' => $this->kegiatanModel->getKegiatan($idKegiatan),
            'pejabat' => $this->pejabatModel->findAll(),
            'dasar' => $this->dasarModel->findAll(),
            'errors' => $errors,
        ];
        // dd($data);
        return view('kegiatan/edit', $data);
    }

    public function prosesedit($id)
    {
        // Menambahkan aturan validasi pada ID kegiatan (ini tidak terkait dengan upload file, jadi tetap biarkan)
        $idKegiatanField = 'idKegiatan'; // Gunakan nama variabel yang lebih deskriptif
        $aturanId = 'max_length[19]|is_natural_no_zero'; // Asumsi aturan ini relevan untuk ID kegiatan
        $this->kegiatanModel->setValidationRule($idKegiatanField, $aturanId);

        // 1. Inisialisasi variabel untuk nama file PDF yang akan disimpan ke DB
        // Ambil data kegiatan lama dari database berdasarkan ID kegiatan
        $kegiatanLama = $this->kegiatanModel->find($id);
        // Default nama file untuk DB adalah nama file lama (jika ada), atau null
        $namaFileUntukDB = $kegiatanLama['filePdf'] ?? null;

        // 2. Tangani Unggahan File Baru (Jika ada)
        $filePdf = $this->request->getFile('filePdf'); // 'filePdf' adalah nama input di form HTML

        // Cek apakah ada file baru yang diunggah (error code 4 = UPLOAD_ERR_NO_FILE)
        if ($filePdf && $filePdf->getError() !== UPLOAD_ERR_NO_FILE) {
            // File diunggah, sekarang validasi file ini di controller

            $validationRules = [
                'filePdf' => [ // Pastikan nama field ini cocok dengan input form HTML
                    'uploaded[filePdf]',          // Aturan: file harus diunggah
                    'mime_in[filePdf,application/pdf]', // Aturan: tipe MIME harus PDF
                    'max_size[filePdf,2048]',    // Aturan: ukuran maksimum 2MB
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
                    'title'    => 'Ubah Data Kegiatan',
                    'pejabat'  => $this->pejabatModel->findAll(), // Pastikan model Pejabat ada
                    'dasar'    => $this->dasarModel->findAll(),   // Pastikan model Dasar ada
                    'errors'   => $errors,
                    'kegiatan' => $kegiatanLama // Pastikan data kegiatan lama tetap ditampilkan
                ];
                return view('/kegiatan/edit', $data);
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
                        'title'    => 'Ubah Data Kegiatan',
                        'pejabat'  => $this->pejabatModel->findAll(),
                        'dasar'    => $this->dasarModel->findAll(),
                        'errors'   => $errors,
                        'kegiatan' => $kegiatanLama
                    ];
                    return view('/kegiatan/edit', $data);
                }
            }

            try {
                $filePdf->move($targetPath, $namaFileBaru);

                // Jika ada file lama (bukan 'noFile.pdf' atau null), hapus file lama untuk menghemat ruang
                if ($namaFileUntukDB && $namaFileUntukDB !== 'noFile.pdf' && file_exists($targetPath . '/' . $namaFileUntukDB)) {
                    unlink($targetPath . '/' . $namaFileUntukDB);
                }

                // Perbarui nama file yang akan disimpan ke database dengan nama file baru
                $namaFileUntukDB = $namaFileBaru;
            } catch (\Exception $e) {
                // Tangani error jika gagal memindahkan file (misalnya karena izin)
                $errors = ['filePdf' => 'Gagal memindahkan file: ' . $e->getMessage()];
                $data = [
                    'title'    => 'Ubah Data Kegiatan',
                    'pejabat'  => $this->pejabatModel->findAll(),
                    'dasar'    => $this->dasarModel->findAll(),
                    'errors'   => $errors,
                    'kegiatan' => $kegiatanLama
                ];
                return view('/kegiatan/edit', $data);
            }
        }
        // Jika tidak ada file baru diunggah ($filePdf->getError() == UPLOAD_ERR_NO_FILE),
        // $namaFileUntukDB akan tetap berisi nama file lama dari database.
        // Jika $namaFileUntukDB awalnya null dan tidak ada upload, maka akan tetap null.

        // 3. Siapkan data untuk disimpan ke database
        $dataToSave = [
            'idKegiatan'   => $id,
            'namaKegiatan' => $this->request->getVar('namaKegiatan'),
            'tglSurat'     => date('Y-m-d H:i:s', strtotime($this->request->getVar('tglSurat'))),
            'pejabatId'    => $this->request->getVar('pejabatId'),
            'suratId'      => $this->request->getVar('suratId'),
            'filePdf'      => $namaFileUntukDB // Gunakan nama file yang sudah diproses (baru atau lama)
        ];

        // 4. Coba simpan data ke model
        // PENTING: Pastikan tidak ada aturan validasi file (uploaded, mime_in, dll.) di KegiatanModel.php
        if ($this->kegiatanModel->save($dataToSave) === false) { // Gunakan === false untuk perbandingan yang lebih ketat
            // jika gagal simpan data (ini akan menangkap error validasi dari model,
            // tetapi BUKAN error file upload lagi karena sudah divalidasi dan dipindahkan sebelumnya)
            $errors = $this->kegiatanModel->errors();
            $data = [
                'title'    => 'Ubah Data Kegiatan',
                'pejabat'  => $this->pejabatModel->findAll(),
                'dasar'    => $this->dasarModel->findAll(),
                'errors'   => $errors,
                'kegiatan' => $kegiatanLama // Pastikan data kegiatan lama tetap dikirim ke view
            ];
            return view('/kegiatan/edit', $data);
        }

        // Jika berhasil
        session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        return redirect()->to('/kegiatan');
    }
}
