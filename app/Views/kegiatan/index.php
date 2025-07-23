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
            <?= anchor('kegiatan/tambah', 'Tambah Kegiatan', ['class' => 'btn btn-primary']); ?>
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

        <table class="table table-hover" name="barang" width="100%">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col" width="10%">No</th>
                    <th scope="col" width="25%">Nama Kegiatan</th>
                    <th scope="col" width="15%">No. Surat</th>
                    <th scope="col" width="10%">Tanggal Surat</th>
                    <th scope="col" width="15%">Pejabat</th>
                    <th scope="col" width="10%">Last Updated</th>
                    <th scope="col" width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $i = 1;

                foreach ($kegiatan as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td style="width: 600px;">


                            <?= anchor('kegiatan/' . $b['idKegiatan'], $b['namaKegiatan'], ['class' => 'link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-100-hover']); ?>

                        </td>
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
                        <td class="text-end">
                            <?php
                            if ($b['filePdf'] != 'noFile.pdf') {
                            ?>
                                <?= anchor('assets/pdf/' . $b['filePdf'], '<i class="bi bi-file-arrow-down"></i>', ['class' => 'btn btn-success', 'target' => '_blank']); ?>

                            <?php } else { ?>
                                <a href="#" class="btn btn-secondary disabled"><i class="bi bi-file-arrow-down"></i></a>
                            <?php } ?>
                            <?= anchor('kegiatan/' . $b['idKegiatan'], 'Detail', ['class' => 'btn btn-warning', 'type' => 'button']); ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>