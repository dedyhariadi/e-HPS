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

        $tandaTambah = $this->request->getVar('tandaTambah');

        // proses menambah barang ke kegiatan
        if ($tandaTambah == 1) {
            $tambahBarang = $this->request->getVar();
            if ($tambahBarang) {
                if ($this->trxGiatBarangModel->save([
                    'kegiatanId' => $idKegiatan,
                    'barangId' => $this->request->getVar('idBarang'),
                    'kebutuhan' => $this->request->getVar('kebutuhan'),
                    'jenis' => $this->request->getVar('jenis'),
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
            d($this->request->getVar());
            $tambahReferensi = $this->request->getVar();
            if ($tambahReferensi) {
                if ($this->trxReferensiModel->save([
                    'trxGiatBarangId' => $this->request->getVar('trxGiatBarangId'),
                    'referensiId' => $this->request->getVar('referensiId'),
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
            'trxReferensi' => $this->referensiModel->join('trxreferensi', 'trxreferensi.referensiId=referensi.idReferensi')->findAll()
        ];

        return view('kegiatan/detail', $data);
    }

    public function hapus($id)
    {
        $this->trxGiatBarangModel->delete($id);
        $this->trxReferensiModel->where(['trxGiatBarangId' => $id])->delete();
        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/kegiatan/' . $this->request->getVar('idKegiatan'));
    }

    public function hapusKegiatan($id)
    {
        echo "halaman hapus kegiatan";
    }


    public function cetakPdf($kegiatanId = false)
    {
        $tandaTambah = $this->request->getVar('tandaTambah');
        echo "ini adalah halaman untuk mencetak PDF kegiatan";
        $data = [
            'judul' => 'Cetak PDF Kegiatan',
        ];


        ob_end_clean(); //untuk memperbaiki tulisan failed to load PDF document
        // return view('kegiatan/cetakPdf', $data);
        // $options->set('defaultFont', 'arial');
        // die;
        // $options = new Options();
        // $options->set('isRemoteEnabled', TRUE);
        // $dompdf = new Dompdf($options);

        // $options = $dompdf->getOptions();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('ishtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        

        $html = view('kegiatan/cetakPdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('kegiatanku.pdf', array(
            'Attachment' => 0 // 0 untuk menampilkan di browser, 1 untuk mengunduh
        ));
    }
}
