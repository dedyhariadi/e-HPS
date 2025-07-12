<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Tambah Data Barang </h2>
        </div>

        <div class="row">

            <?= form_open_multipart('barang/save'); ?>

            <div class="row mb-3">

                <label for="namaBarang" class="col-sm-2 col-form-label">Nama Barang</label>

                <div class="col-sm-4">
                    <input type="text" class="form-control <?= (isset($errors['namaBarang'])) ? 'is-invalid' : ''; ?>" name="namaBarang" autofocus value="<?= set_value('namaBarang'); ?>">
                    <div class="invalid-feedback">
                        <?= (isset($errors['namaBarang'])) ? $errors['namaBarang'] : ''; ?>
                    </div>
                </div>

            </div>

            <div class="row mb-3">
                <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-4">
                    <select class="form-select" name="idSatuan">
                        <?php foreach ($satuan as $b) : ?>
                            <option value="<?= ($b['idSatuan']); ?>" <?= set_select('idSatuan', $b['idSatuan']); ?>><?= $b['namaSatuan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-1">
                <label for="gambar" class="form-label col-sm-2">Gambar</label>
                <div class="col-sm-4">
                    <span class="input-group-btn">

                        <input class="btn-file  form-control <?= (isset($errors['gambar'])) ? 'is-invalid' : ''; ?>" type="file" name="gambar" id="gambar" value="<?= set_value('gambar'); ?>">
                        <div class="invalid-feedback">
                            <?= (isset($errors['gambar'])) ? $errors['gambar'] : ''; ?>
                        </div>

                    </span>
                    <img id='img-upload' />
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-4">
                    <?php
                    if (session()->getFlashdata('idKegiatan')) {

                        echo anchor('kegiatan/' . session()->getFlashdata('idKegiatan'), 'Kembali', ['class' => 'btn btn-warning me-3']);

                        session()->setFlashdata('idKegiatan', session()->getFlashdata('idKegiatan'));
                    } else {

                        echo anchor('barang', 'Kembali', ['class' => 'btn btn-warning me-3']);
                    }

                    ?>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>