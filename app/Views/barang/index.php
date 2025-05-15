<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row">
        <div class="col text-center">
            <h1> Daftar Barang</h1>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover table-sm">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Satuan</th>
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
                        <td><?= $b['gambar']; ?></td>
                        <td><?= $b['namaSatuan']; ?></td>
                        <td class="text-center"><button type="button" class="btn btn-warning">Edit</button> <button type="button" class="btn btn-danger">Hapus</button></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>