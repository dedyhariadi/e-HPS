<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Ubah Data Barang </h2>
        </div>
        <?php
        d($barang);
        ?>
        <div class="row">
            <form action="/barang/proses_update/<?= $barang['idBarang']; ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <div class="row mb-3">

                    <label for="namaBarang" class="col-sm-2 col-form-label">Nama Barang</label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control <?= (isset($errors['namaBarang'])) ? 'is-invalid' : ''; ?>" name="namaBarang" autofocus value="<?= set_value('namaBarang', $barang['namaBarang']) ?>">

                        <div class="invalid-feedback">
                            <?= (isset($errors['namaBarang'])) ? $errors['namaBarang'] : ''; ?>
                        </div>
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="idSatuan">
                            <?php foreach ($satuan as $b) :
                                if ($b['idSatuan'] == $barang['idSatuan']) {
                            ?>
                                    <option value="<?= ($b['idSatuan']); ?>" <?= set_select('idSatuan', $b['idSatuan']); ?> selected><?= $b['namaSatuan']; ?></option>
                                <?php } else { ?>
                                    <option value="<?= ($b['idSatuan']); ?>" <?= set_select('idSatuan', $b['idSatuan']); ?>><?= $b['namaSatuan']; ?></option>
                            <?php
                                }
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="gambar" class="form-label col-sm-2">Gambar</label>
                    <div class="col-sm-4">

                        <span class="input-group-btn">
                            <input class="btn-file form-control <?= (isset($errors['gambar'])) ? 'is-invalid' : ''; ?>" type="file" name="gambar" id="gambar" value="<?= $barang['gambar']; ?>">
                            <div class="invalid-feedback">
                                <?= (isset($errors['gambar'])) ? $errors['gambar'] : ''; ?>
                            </div>

                        </span>
                        <img src="<?= base_url('assets/images/' . $barang['gambar']); ?>" alt="" class="img-thumbnail mt-2" id='img-upload' width="200px">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>