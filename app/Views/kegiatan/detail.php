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
            <div class="card mb-3" style="max-width: 550px;">
                <div class="row g-0">
                    <div class="col">
                        <div class="card-body">
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
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');">Delete</button>

                                    <a href="/kegiatan/edit/<?= $kegiatan['idKegiatan']; ?>" class="btn btn-warning">Edit</a>

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

<div class="row mt-5 mb-3">

    <div class="col-3">

        <a href="/barang/create/<?= $kegiatan['idKegiatan']; ?>" class="btn btn-primary">Tambah barang</a>
    </div>

    <!-- alert pesan setelah berhasil disimpan -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
            </svg>
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php endif; ?>
    <!-- akhir alert -->

    <!-- daftar barang -->
    <div class="row">
        <table class="table table-hover">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Kebutuhan</th>
                    <th scope="col" colspan="2">Harga Rata2</th>
                    <th scope="col">Jml Referensi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($trxGiatBarang as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td>
                            <?= $b['barangId']; ?>
                        </td>
                        <td><?= $b['kebutuhan']; ?></td>
                        <td class="text-end">
                            <?php
                            echo "Rp ";
                            ?>
                        </td>
                        <td class="text-end">
                            <?php
                            // echo number_format($b['harga'], 0, ",", ".");
                            ?>
                        </td>
                        <td class="text-center">Jml Referensi</td>
                        <td class="text-center">
                            <a type="button" class="btn btn-warning" href="/referensi/edit/<?= $b['idTrxGiatBarang']; ?>">Edit</a>

                            <form action="/referensi/<?= $b['idTrxGiatBarang']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="idTrxGiatBarang" value="<?= $b['idTrxGiatBarang']; ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>





<!-- akhir content -->

<?= $this->endSection(); ?>