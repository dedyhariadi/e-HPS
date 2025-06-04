<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col text-center">
            <h1> Daftar Kegiatan</h1>
        </div>
    </div>

    <div class="row text-start">
        <div class="col">
            <a href="/kegiatan/tambah" class="btn btn-primary">Tambah Kegiatan</a>
        </div>
        <div class="col">

            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Silahkan ketikkan pencarian.." name="keyword">
                    <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                </div>
            </form>

        </div>
    </div>

    <div class="row">

        <!-- alert pesan setelah berhasil disimpan -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-bookmarks-fill"></i>
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        <!-- akhir alert -->

        <table class="table table-hover" name="barang">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">No. Surat</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Pejabat</th>
                    <th scope="col">Last Updated</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $i = 1;

                foreach ($kegiatan as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td style="width: 600px;"><?= $b['namaKegiatan']; ?></td>
                        <td><?= $b['noSurat']; ?></td>
                        <td class="text-left">
                            <?= date('d', strtotime($b['tglSurat'])); ?>
                            <?= $bulan[intval(date('m', strtotime($b['tglSurat']))) - 1] . " " . date('Y', strtotime($b['tglSurat'])); ?>
                        </td>
                        <td><?= $b['namaPejabat']; ?></td>
                        <td class="text-left">
                            <?= date('d', strtotime($b['updated_at'])); ?>
                            <?= $bulan[intval(date('m', strtotime($b['updated_at']))) - 1] . " " . date('Y', strtotime($b['updated_at'])); ?>
                        </td>
                        <td class="text-center"><a type="button" class="btn btn-warning" href="/kegiatan/<?= $b['idKegiatan']; ?>">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>