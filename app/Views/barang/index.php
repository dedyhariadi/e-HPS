<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col text-center">
            <h1> Daftar Barang</h1>
        </div>
    </div>

    <div class="row text-start">
        <div class="col">
            <a href="/barang/create" class="btn btn-primary">Tambah Barang</a>
        </div>
        <div class="col">

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Silahkan ketikkan pencarian.." aria-label="Recipient’s username" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="button" id="button-addon2">Cari</button>
            </div>

        </div>
    </div>

    <div class="row">

        <!-- alert pesan setelah berhasil disimpan -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- akhir alert -->

        <table class="table table-hover">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Last Updated</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($barang as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td><?= $b['namaBarang']; ?></td>
                        <td><?= $b['namaSatuan']; ?></td>
                        <td class="text-center"><?= date('d M Y', strtotime($b['updated_at'])); ?></td>
                        <td class="text-center"><a type="button" class="btn btn-warning" href="/barang/<?= $b['idBarang']; ?>">Detail</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>