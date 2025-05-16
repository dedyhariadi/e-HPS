<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Tambah Data Barang 2</h2>
            <?php
            d($validation);
            ?>

            <?= $validation->listErrors() ?>

        </div>
        <div class="row">
            <form action="/barang/save" method="post">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="namaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="namaBarang">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="idSatuan">
                            <?php foreach ($satuan as $b) : ?>
                                <option value="<?= $b['idSatuan']; ?>"><?= $b['namaSatuan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gambar" class="form-label col-sm-2">Gambar</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="file" name="gambar">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>