<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Tambah Satuan </h2>
        </div>

        <div class="row">


            <?= form_open('satuan/simpan'); ?>

            <div class="row mb-3">

                <label for="namaSatuan" class="col-sm-2 col-form-label">Nama Satuan</label>

                <div class="col-sm-4">
                    <input type="text" class="form-control <?= (isset($errors['namaSatuan'])) ? 'is-invalid' : ''; ?>" name="namaSatuan" autofocus value="<?= set_value('namaSatuan'); ?>">
                    <div class="invalid-feedback">
                        <?= (isset($errors['namaSatuan'])) ? $errors['namaSatuan'] : ''; ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-4">
                    <a href="satuan" class="btn btn-warning me-3">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>