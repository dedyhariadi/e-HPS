<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Tambah Satuan </h2>
        </div>

        <div class="row">
            <form action="/satuan/prosesedit" method="post">

                <?= csrf_field(); ?>

                <div class="row mb-3">

                    <label for="namaSatuan" class="col-sm-2 col-form-label">Nama Satuan</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= (isset($errors['namaSatuan'])) ? 'is-invalid' : ''; ?>" name="namaSatuan" autofocus value="<?= set_value('namaSatuan', $satuan['namaSatuan']); ?>">
                        <div class="invalid-feedback">
                            <?= (isset($errors['namaSatuan'])) ? $errors['namaSatuan'] : ''; ?>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="idSatuan" value="<?= $satuan['idSatuan']; ?>">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>