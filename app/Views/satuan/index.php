<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col text-center">
            <h1> Daftar Satuan</h1>
        </div>
    </div>

    <div class="row text-start">
        <div class="col">
            <?= anchor('satuan/tambah', 'Tambah Satuan', ['class' => 'btn btn-primary']); ?>
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
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-bookmarks-fill"></i>
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>


        <!-- akhir alert -->

        <table class="table table-hover" name="satuan">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($satuan as $p) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td><?= $p['namaSatuan']; ?></td>
                        <td class="text-center"><?= date('d M Y H:m:s', strtotime($p['updated_at'])); ?></td>
                        <td class="text-center">

                            <?= form_open('satuan/' . $p['idSatuan'], ['class' => 'd-inline'], ['_method' => 'DELETE']); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');"><i class="bi bi-trash-fill"></i></button>
                            <?= form_close(); ?>
                            <?= anchor('satuan/edit/' . $p['idSatuan'], '<i class="bi bi-pencil"></i>', ['class' => 'btn btn-warning']); ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>