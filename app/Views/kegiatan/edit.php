<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Edit Kegiatan</h2>
        </div>

        <div class="row">

            <?= form_open_multipart('kegiatan/prosesedit/' . $kegiatan['idKegiatan']); ?>

            <div class="row mb-3">
                <!-- input nama kegiatan -->
                <label for="namaKegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                <!-- <textarea class="form-control" aria-label="With textarea" name=""> -->
                <div class="col-sm-4">
                    <textarea type="text" class="form-control <?= (isset($errors['namaKegiatan'])) ? 'is-invalid' : ''; ?>" name="namaKegiatan" autofocus><?= set_value('namaKegiatan', $kegiatan['namaKegiatan']); ?></textarea>
                    <div class="invalid-feedback">
                        <?= (isset($errors['namaKegiatan'])) ? $errors['namaKegiatan'] : ''; ?>
                    </div>
                </div>

                <!-- utk jarak antar input -->
                <div class="col-sm-1"></div>

                <!-- input pejabat -->
                <label for="pejabat" class="col-sm-1 col-form-label">Pejabat</label>
                <div class="col-sm-3 ms-0">

                    <?php
                    foreach ($pejabat as $p) {
                        $pejabat['idPejabat'][] = $p['idPejabat'];
                        $pejabat['namaPejabat'][] = $p['namaPejabat'];
                    }

                    $pejabat = array_combine($pejabat['idPejabat'], $pejabat['namaPejabat']);
                    echo form_dropdown('pejabatId', $pejabat, set_value('pejabatId', $kegiatan['pejabatId']), ['class' => 'form-select']);

                    ?>
                    <div class="invalid-feedback">
                        <?= (isset($errors['pejabatId'])) ? $errors['pejabatId'] : ''; ?>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <!-- input no Surat -->
                <label for="noSurat" class="col-sm-2 col-form-label">No Surat</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control <?= (isset($errors['noSurat'])) ? 'is-invalid' : ''; ?>" name="noSurat" value="<?= set_value('noSurat', $kegiatan['noSurat']); ?>">
                    <div class="invalid-feedback">
                        <?= (isset($errors['noSurat'])) ? $errors['noSurat'] : ''; ?>
                    </div>
                </div>

                <div class="col-sm-3"></div>

                <!-- input tanggal surat -->
                <label for="tanggal" class="col-sm-1 pe-0 col-form-label">Tanggal Surat</label>
                <div class="col-sm-2">
                    <input type="text" autocomplete="off" class="form-control <?= (isset($errors['tglSurat'])) ? 'is-invalid' : ''; ?>" name="tglSurat" value="<?= set_value('tglSurat', date('d F Y', strtotime($kegiatan['tglSurat']))); ?>" id="tanggal">
                    <div class="invalid-feedback">
                        <?= (isset($errors['tglSurat'])) ? $errors['tglSurat'] : ''; ?>
                    </div>
                </div>
            </div>

            <!-- input dasar surat -->
            <div class="row mb-3">
                <label for="suratId" class="col-sm-2 col-form-label">Dasar Surat</label>
                <div class="col-sm-2">
                    <?php
                    foreach ($dasar as $d) {
                        $dasar['idSurat'][] = $d['idSurat'];
                        $dasar['noSurat'][] = $d['noSurat'];
                    }

                    $dasar = array_combine($dasar['idSurat'], $dasar['noSurat']);
                    echo form_dropdown('suratId', $dasar, set_value('suratId', $kegiatan['dasarId']), ['class' => 'form-select']);

                    ?>
                    <div class="invalid-feedback">
                        <?= (isset($errors['suratId'])) ? $errors['suratId'] : ''; ?>
                    </div>

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
                    <?= anchor('kegiatan', 'Kembali', ['class' => 'btn btn-primary me-3']); ?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>