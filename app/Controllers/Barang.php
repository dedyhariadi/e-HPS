<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\SatuanModel;
use App\Models\ReferensiModel;
use App\Models\SumberModel;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    protected $barangModel;
    protected $satuanModel;
    protected $referensiModel;
    protected $sumberModel;

    public function __construct()
    {
        // Load the model
        $this->barangModel = new BarangModel();
        $this->satuanModel = new SatuanModel();
        $this->referensiModel = new ReferensiModel();
        $this->sumberModel = new SumberModel();
    }

    public function index($tandaKeyword = false)
    {
        // proses pencarian
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $tandaKeyword = true;
            $barang = $this->barangModel->search($keyword);
        } else {

            $barang = $this->barangModel->getBarang();
        }

        // pagination
        $currentPage = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1; //cek variabel page_barang, kalo tidak ada variabel page_barang maka nilainya 1, kalo ada maka nilainya variabel page_barang itu sendiri
        // dd($barang);
        $data = [
            'title' => 'Data Barang',
            'barang' => $barang,
            'pager' => $this->barangModel->pager,
            'currentPage' => $currentPage,
            'tandaKeyword' => $tandaKeyword,
            'trxReferensi' => $this->referensiModel->findAll()
        ];

        // Load the view for the index page
        return view('barang/index', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->barangModel->getBarang($id),
            'barangRef' => $this->barangModel->join('referensi', 'referensi.barangId=barang.idBarang')->where(['idBarang' => $id])->orderBy('referensi.updated_at', 'DESC')->findAll(),
            'sumber' => $this->sumberModel->findAll()
        ];

        // jika data barang tidak ada di tabel
        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Barang tidak ditemukan');
        }

        return view('barang/detail', $data);
    }

    public function create($errors = false)
    {
        // ambil data satuan
        $satuan = $this->satuanModel->findAll();
        $data = [
            'title' => 'Tambah Data Barang',
            'satuan' => $satuan,
            'errors' => $errors,
        ];
        return view('barang/create', $data);
    }

    public function simpan($errors = false)
    {

        $gambar = $this->request->getFile('gambar');  // ambil gambar


        //menyimpan data dengan tanpa upload gambar

        if ($gambar->getError() == 4) {
            if ($this->barangModel->save([
                'namaBarang' => $this->request->getVar('namaBarang'),
                'satuanId' => $this->request->getVar('idSatuan'),
                'gambar' => 'default.jpg'
            ]) == false) {
                // jika gagal simpan data
                $satuan = $this->satuanModel->findAll();
                $errors = $this->barangModel->errors();

                // Jika dari modal, redirect kembali dengan error
                $redirectToKegiatan = $this->request->getVar('redirectToKegiatan');
                if ($redirectToKegiatan) {
                    session()->setFlashdata('errors', $errors);
                    session()->setFlashdata('old_input', $this->request->getPost());
                    return redirect()->to('kegiatan/' . $redirectToKegiatan)->with('error', 'Gagal menambah barang. Silakan coba lagi.');
                }

                $data = [
                    'title' => 'Tambah Data Barang',
                    'satuan' => $satuan,
                    'errors' => $errors,
                ];

                return view('barang/create', $data);
            }
        }


        // $namaGambar = 'default.jpg'; // jika tidak ada gambar yang diupload, maka gunakan gambar default        

        // proses simpan data
        if ($this->barangModel->save([
            'namaBarang' => $this->request->getVar('namaBarang'),
            'satuanId' => $this->request->getVar('idSatuan'),
            'gambar' => $gambar->getRandomName()
        ])  == false && $gambar->getError() <> 4) {
            // jika gagal simpan data
            $satuan = $this->satuanModel->findAll();
            $errors = $this->barangModel->errors();

            // Jika dari modal, redirect kembali dengan error
            $redirectToKegiatan = $this->request->getVar('redirectToKegiatan');
            if ($redirectToKegiatan) {
                session()->setFlashdata('errors', $errors);
                session()->setFlashdata('old_input', $this->request->getPost());
                return redirect()->to('kegiatan/' . $redirectToKegiatan)->with('error', 'Gagal menambah barang. Silakan coba lagi.');
            }

            $data = [
                'title' => 'Tambah Data Barang',
                'satuan' => $satuan,
                'errors' => $errors,
            ];

            return view('barang/create', $data);
        }


        if ($gambar->getError() <> 4) {
            // // jika berhasil simpan data
            $id = $this->barangModel->insertID(); // ambil id barang yang baru saja disimpan
            $barang = $this->barangModel->find($id); // ambil data barang yang baru saja disimpan

            $gambar->move('assets/images', $barang['gambar']);  // pindahkan gambar ke folder images

        }

        session()->setFlashdata('pesan', 'Data Berhasil ditambah.');

        // Cek apakah ada parameter redirectToKegiatan dari modal
        $redirectToKegiatan = $this->request->getVar('redirectToKegiatan');
        if ($redirectToKegiatan) {
            return redirect()->to('kegiatan/' . $redirectToKegiatan)->with('pesan', 'Data barang berhasil ditambah.');
        }

        if (session()->getFlashdata('idKegiatan')) {
            return redirect()->to('kegiatan/' . session()->getFlashdata('idKegiatan'));
        } else {
            return redirect()->to('barang');
        }
    }

    public function hapus($id)
    {

        $data = $this->barangModel->find($id);
        $namaFile = $data['gambar'];
        if (file_exists('assets/images/' . $namaFile)) {
            unlink('assets/images/' . $namaFile);
        }

        try {
            $this->barangModel->delete($id);
            session()->setFlashdata('pesan', 'Data barang Berhasil dihapus.');
        } catch (\Exception $e) {

            if ($e->getCode() == 1451) {
                session()->setFlashdata('error', 'Data tidak dapat dihapus karena masih digunakan di kegiatan lain.');
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
            }
        }
        return redirect()->to('barang');
    }


    public function form_update($id, $errors = false)
    {

        $satuan = $this->satuanModel->findAll();
        $data = [
            'title' => 'Form Ubah Data Barang',
            'satuan' => $satuan,
            'barang' => $this->barangModel->getBarang($id),
            'errors' => $errors,

        ];
        return view('barang/edit', $data);
    }

    public function proses_update($id)
    {
        // menambahkan aturan validasi pada ID barang untuk ignore namaBarang yang sama dengan sebelumnya
        $idBarang = 'idBarang';
        $aturan = 'max_length[19]|is_natural_no_zero';
        $this->barangModel->setValidationRule($idBarang, $aturan);


        if ($this->barangModel->save([
            'idBarang' => $id,
            'namaBarang' => $this->request->getVar('namaBarang'),
            'satuanId' => $this->request->getVar('idSatuan'),

        ]) == false) {

            // jika gagal simpan data
            $satuan = $this->satuanModel->findAll();
            $errors = $this->barangModel->errors();

            $data = [
                'title' => 'Update Data Barang',
                'satuan' => $satuan,
                'barang' => $this->barangModel->getBarang($id),
                'errors' => $errors,
            ];

            return view('barang/edit', $data);
        }

        // jika berhasil simpan data
        $gambar = $this->request->getFile('gambar');  // ambil gambar

        if ($gambar->getError() <> 4) { // cek apakah ada gambar 
            if ($this->barangModel->save([
                'idBarang' => $id,
                'gambar' => $gambar->getRandomName()
            ]) == false) {
                // jika gagal simpan data
                $satuan = $this->satuanModel->findAll();
                $errors = $this->barangModel->errors();

                $data = [
                    'title' => 'Update Data Barang',
                    'satuan' => $satuan,
                    'barang' => $this->barangModel->getBarang($id),
                    'errors' => $errors,
                ];

                return view('barang/edit', $data);
            }

            $gambarUpdate = $this->barangModel->find($id); // ambil data barang yang baru saja disimpan
            $gambar->move('assets/images', $gambarUpdate['gambar']);  // pindahkan gambar ke folder images
        }



        // // jika berhasil simpan data

        session()->setFlashdata('pesan', 'Data Berhasil di UPDATE.');
        return redirect()->to('barang');
    }


    public function search() //untuk ajax cari nama barang di kegiatan/detail/tambahbarang
    {
        $term = $this->request->getGet('q');
        $result = [];

        if ($term) {
            $result = $this->barangModel
                ->like('namaBarang', $term)
                ->findAll();

            if (count($result) === 0) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Barang tidak ditemukan untuk kata kunci: ' . $term
                ])->setStatusCode(404);
            }

            return $this->response->setJSON([
                'status' => 'success',
                'query' => $term,
                'data' => $result
            ])->setStatusCode(200);
        }

        // Jika tidak ada parameter pencarian, tampilkan semua data
        $result = $this->barangModel->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $result
        ])->setStatusCode(200);
    }
}
