<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="card m-3 p-3">
        <div class="card-body">
            <h2 class="card-title mb-5">Form Tambah Kegiatan</h2>



            <div class="row">

                <?= form_open_multipart('kegiatan/simpan'); ?>


                <div class="row mb-3">
                    <!-- input nama kegiatan -->
                    <label for="namaKegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                    <!-- <textarea class="form-control" aria-label="With textarea" name=""> -->
                    <div class="col-sm-4">
                        <textarea type="text" class="form-control <?= (isset($errors['namaKegiatan'])) ? 'is-invalid' : ''; ?>" name="namaKegiatan" autofocus></textarea>
                        <div class="invalid-feedback">
                            <?= (isset($errors['namaKegiatan'])) ? $errors['namaKegiatan'] : ''; ?>
                        </div>
                    </div>

                    <!-- utk jarak antar input -->
                    <div class="col-sm-1"></div>

                    <!-- input pejabat -->
                    <label for="pejabat" class="col-sm-1 col-form-label">Pejabat</label>
                    <div class="col-sm-3 ms-0">
                        <select class="form-select" name="pejabatId">
                            <?php foreach ($pejabat as $p) : ?>
                                <option value="<?= ($p['idPejabat']); ?>" <?= set_select('idPejabat', $p['idPejabat']); ?>><?= $p['namaPejabat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <!-- input no Surat -->
                    <label for="noSurat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control <?= (isset($errors['noSurat'])) ? 'is-invalid' : ''; ?>" name="noSurat" value="<?= set_value('noSurat'); ?>">
                        <div class="invalid-feedback">
                            <?= (isset($errors['noSurat'])) ? $errors['noSurat'] : ''; ?>
                        </div>
                    </div>

                    <div class="col-sm-3"></div>

                    <!-- input tanggal surat -->
                    <label for="tanggal" class="col-sm-1 pe-0 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-2">
                        <input type="text" autocomplete="off" class="form-control <?= (isset($errors['tglSurat'])) ? 'is-invalid' : ''; ?>" name="tglSurat" value="<?= set_value('tglSurat'); ?>" id="tanggal">
                        <div class="invalid-feedback">
                            <?= (isset($errors['tglSurat'])) ? $errors['tglSurat'] : ''; ?>
                        </div>
                    </div>
                </div>

                <!-- input dasar surat -->
                <div class="row mb-3">
                    <label for="suratId" class="col-sm-2 col-form-label">Dasar Surat</label>
                    <div class="col-sm-2">
                        <select class="form-select" name="suratId">
                            <?php foreach ($dasar as $d) : ?>
                                <option value="<?= ($d['idSurat']); ?>" <?= set_select('idSurat', $d['idSurat']); ?>><?= $d['noSurat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-3"></div>

                    <label for="filePdf" class="col-sm-1 col-form-label">File PDF</label>
                    <div class="col-sm-3">
                        <span class="input-group-btn">
                            <input class="btn-file  form-control <?= (isset($errors['filePdf'])) ? 'is-invalid' : ''; ?>" type="file" name="filePdf" id="filePdf" value="<?= set_value('filePdf'); ?>">
                            <div class="invalid-feedback">
                                <?= (isset($errors['filePdf'])) ? $errors['filePdf'] : ''; ?>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="row text-start">
                    <div class="col-8"></div>
                    <div class="col-4 mt-3">
                        <?= anchor('kegiatan', 'Kembali', ['class' => 'btn btn-warning me-3']); ?>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>