<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use CodeIgniter\I18n\Time;
?>
<!-- content -->

<div class="container">
    <div class="row mt-3 mb-3">
        <h1>Detail Kegiatan</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 650px;">
                <div class="row g-0">
                    <div class="col">
                        <div class="card-body fs-5">
                            <h5 class="card-title"><?= $kegiatan['namaKegiatan']; ?></h5>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <p class="card-text"><b>Dasar</b></p>
                                </div>
                                <div class="col">: Surat
                                    <?= $dasar['pejabat'] . ' Nomor ' . $dasar['noSurat']; ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-3">
                                    <p class="card-text"><b>No. Surat</b></p>
                                </div>
                                <div class="col">:
                                    <?= $kegiatan['noSurat']; ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-3">
                                    <p class="card-text"><b>Tgl Surat</b></p>
                                </div>
                                <div class="col">:
                                    <?php
                                    $myTime = Time::parse($kegiatan['tglSurat'], 'Asia/Jakarta');
                                    echo  $myTime->toLocalizedString('d MMMM yyy'); ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-3">
                                    <p class="card-text"><b>Pejabat Ttd</b></p>
                                </div>
                                <div class="col">:
                                    <?= $pangkat['pangkat'] . ' ' . $kegiatan['namaPejabat'] . ' NRP ' . $kegiatan['NRP']; ?>
                                </div>
                            </div>



                            <div class="row mt-5 text-end">
                                <p class="card-text"><small class="text-muted"> <b>Last updated at</b> <?= date('d M Y H:m:s', strtotime($kegiatan['updated_at'])); ?></small></p>


                                <form action="/kegiatan/<?= $kegiatan['idKegiatan']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="idKegiatan" value="<?= $kegiatan['idKegiatan']; ?>">
                                    <input type="hidden" name="tandaHapus" value="hapusKegiatan">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');">Delete</button>

                                    <!-- <a href="/kegiatan/edit/ idkegiatan>" class="btn btn-warning">Edit</a> -->

                                    <input type="button" value="Cetak Pdf" onclick="window.open('/kegiatan/cetakPdf/<?= $kegiatan['idKegiatan']; ?>', '_blank');" class="btn btn-primary">

                                </form>


                                <p class="mt-3">
                                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/kegiatan">Kembali ke daftar kegiatan</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-sm">
    <div class="row mt-5 mb-3">

        <div class="col-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">
                Tambah barang
            </button>
        </div>

        <!-- alert pesan setelah berhasil disimpan -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-bookmarks-fill"></i>
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        <!-- akhir alert -->

        <!-- daftar barang -->

        <div class="row mt-2">
            <table class="table table-hover table-bordered fs-5">
                <thead class="text-center align-middle">
                    <tr>
                        <th scope="col" rowspan="2">No</th>
                        <th scope="col" rowspan="2">Barang</th>
                        <th scope="col" rowspan="2">Kebutuhan</th>
                        <th scope="col" colspan="2">Referensi 1</th>
                        <th scope="col" colspan="2">Referensi 2</th>
                        <th scope="col" colspan="2" rowspan="2">Harga Rata2</th>
                        <th scope="col" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <td scope="col">Link</td>
                        <td scope="col">Harga</td>
                        <td scope="col">Link</td>
                        <td scope="col">Harga</td>
                    </tr>

                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $i = 1;
                    foreach ($trxGiatBarang as $b) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i++; ?></th>
                            <td>
                                <?php
                                foreach ($barang as $brg) :
                                    if ($b['barangId'] == $brg['idBarang']) {
                                        echo $brg['namaBarang'];
                                    }
                                endforeach;
                                ?>

                            </td>
                            <td class="ps-5 text-end">
                                <?php
                                echo number_format($b['kebutuhan'], 0, ",", ".") . " ";
                                foreach ($barang as $brg) :
                                    if ($b['barangId'] == $brg['idBarang']) {
                                        echo $brg['namaSatuan'];
                                    }
                                endforeach;
                                ?>

                            </td>

                            <?php
                            foreach ($trxReferensi as $trxR) :
                                if ($trxR['trxGiatBarangId'] == $b['idTrxGiatBarang']) {
                                    $cetakLink[] = $trxR['link'];
                                    $cetakHarga[] = $trxR['harga'];

                                    foreach ($sumber as $s):
                                        if ($s['idSumber'] == $trxR['sumberId'])
                                            $namaSumber[] = $s['namaSumber'];
                                    endforeach;
                                }
                            endforeach;

                            ?>

                            <td class="text-truncate" style="max-width: 150px;">
                                <?php
                                if (isset($cetakLink[0])) {
                                    echo anchor_popup($cetakLink[0], $namaSumber[0]);
                                } else {
                                ?>
                                    <a href="" class="" data-bs-toggle="modal" data-bs-target="#modalTambahReferensi<?= $b['idTrxGiatBarang']; ?>">add</a>
                                <?php
                                }
                                ?>

                            </td>
                            <td class="text-end">
                                <?= (isset($cetakHarga[0])) ? number_format($cetakHarga[0], 0, ",", ".") : ""; ?>

                            </td>
                            <td class="text-truncate" style="max-width: 150px;">
                                <?php
                                if (isset($cetakLink[1])) {
                                    echo anchor_popup($cetakLink[1], $namaSumber[1]);
                                } else {
                                ?>
                                    <a href="" class="" data-bs-toggle="modal" data-bs-target="#modalTambahReferensi<?= $b['idTrxGiatBarang']; ?>">add</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td class="text-end">
                                <?= (isset($cetakHarga[1])) ? number_format($cetakHarga[1], 0, ",", ".") : ""; ?>
                            <td class="text-end">
                                <?php
                                echo "Rp ";
                                ?>
                            </td>
                            <td class="text-end">
                                <?php
                                if (isset($cetakHarga)) {
                                    $cetakAverage = array_sum($cetakHarga) / count($cetakHarga);
                                    echo number_format($cetakAverage, 0, ",", ".");
                                }
                                ?>
                            </td>
                            <?php
                            unset($cetakLink);
                            unset($cetakHarga);
                            unset($namaSumber);
                            ?>
                            </td>
                            <td class="text-center">
                                <form action="/kegiatan/<?= $b['idTrxGiatBarang']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="idKegiatan" value="<?= $idKegiatan; ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal Form Tambah Barang-->

<div class="modal fade " id="tambahBarangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-3">
                <form action="" method="post">
                    <?= csrf_field(); ?>

                    <div class="row ms-5 mt-3">
                        <label for="combobox" class="form-label col-sm-3">Material</label>
                        <div class="col-sm-6">
                            <select class="form-select mb-3 fs-4" id="combobox" name="idBarang">
                                <?php foreach ($barang as $b) : ?>
                                    <option value=<?= $b['idBarang']; ?>><?= $b['namaBarang']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row ms-5 mt-2">
                        <label for="jenis" class="form-label col-sm-3">Jenis</label>
                        <div class="col-sm-4">
                            <select class="form-select fs-4" id="jenis" name="jenis">
                                <option value="1">Utama</option>
                                <option value="2">Pendukung</option>
                                <option value="3">Jasa</option>
                            </select>
                        </div>
                    </div>
                    <div class="row ms-5 mt-2">
                        <label for="kebutuhan" class="col-sm-3 col-form-label">Kebutuhan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= (isset($errors['kebutuhan'])) ? 'is-invalid' : ''; ?> fs-4" name="kebutuhan" value="<?= set_value('kebutuhan'); ?>">
                            <div class="invalid-feedback">
                                <?= (isset($errors['kebutuhan'])) ? $errors['kebutuhan'] : ''; ?>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row  text-center my-4">
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <input type="hidden" name="tandaTambah" value="1">

            </form>
        </div>
    </div>
</div>



<?php foreach ($trxGiatBarang as $b): ?>
    <!-- Modal Form Tambah Referensi Tiap Barang-->

    <div class="modal fade" id="modalTambahReferensi<?= $b['idTrxGiatBarang']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Referensi untuk
                        <span class="text-uppercase fs-5 fw-bold">
                            <?php
                            foreach ($barang as $brg) :
                                if ($b['barangId'] == $brg['idBarang']) {
                                    $namabarang = $brg['namaBarang'];
                                    echo $namabarang;
                                }
                            endforeach;
                            ?>
                        </span>

                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body fs-3">
                    <div class="row m-2 mt-3">
                        <table class="table table-hover fs-5">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"></th>
                                    <th scope="col">Sumber</th>
                                    <th scope="col">Link</th>
                                    <th scope="col" colspan="2">Harga</th>
                                    <th scope="col">Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($referensi as $r) :
                                    if ($r['barangId'] == $b['barangId']) {
                                ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $i++; ?></th>
                                            <td>
                                                <form action="" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="trxGiatBarangId" value="<?= $b['idTrxGiatBarang']; ?>">
                                                    <input type="hidden" name="referensiId" value="<?= $r['idReferensi']; ?>">
                                                    <input type="hidden" name="idKegiatan" value="<?= $idKegiatan; ?>">
                                                    <input type="hidden" name="tandaTambah" value="2">
                                                    <button type="submit" class="btn-btn primary"><i class="bi bi-pencil-fill"></i></button>
                                                </form>
                                            </td>
                                            <td><?= $r['namaSumber']; ?> </td>
                                            <td class="text-truncate"><?= $r['link']; ?></td>
                                            <td class="text-end"><?= "Rp "; ?></td>
                                            <td class="text-end"><?= number_format($r['harga'], 0, ",", "."); ?></td>
                                            <td class="text-center"><?= date('d M Y', strtotime($r['updated_at'])); ?></td>


                                        </tr>
                                <?php
                                    };
                                endforeach;
                                ?>

                            </tbody>
                        </table>


                    </div>


                </div>
                <div class="modal-footer">
                    <a href="/referensi/create/<?= $b['barangId']; ?>" class="btn btn-success   ">Tambah Referensi</a>
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- akhir content -->

<?= $this->endSection(); ?>