<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Tambah Kegiatan</h2>
        </div>

        <div class="row">
            <form action="/kegiatan/simpan" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <div class="row mb-3">

                    <label for="namaKegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>

                    <!-- <textarea class="form-control" aria-label="With textarea" name=""> -->

                    <div class="col-sm-4">
                        <textarea type="text" class="form-control <?= (isset($errors['namaKegiatan'])) ? 'is-invalid' : ''; ?>" name="namaKegiatan" autofocus value="<?= set_value('namaKegiatan'); ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= (isset($errors['namaKegiatan'])) ? $errors['namaKegiatan'] : ''; ?>
                        </div>
                    </div>

                </div>


                <div class="row mb-3">
                    <label for="noSurat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= (isset($errors['noSurat'])) ? 'is-invalid' : ''; ?>" name="noSurat" value="<?= set_value('noSurat'); ?>">
                        <div class="invalid-feedback">
                            <?= (isset($errors['noSurat'])) ? $errors['noSurat'] : ''; ?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row mb-3">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Surat</label>
            <div class="col-sm-2">
                <input type="text" class="form-control <?= (isset($errors['tglSurat'])) ? 'is-invalid' : ''; ?>" name="tglSurat" value="<?= set_value('tglSurat'); ?>" id="tanggal">

                <div class="invalid-feedback">
                    <?= (isset($errors['tglSurat'])) ? $errors['tglSurat'] : ''; ?>
                </div>


            </div>
        </div>

        <div class="row mb-3">
            <label for="pejabat" class="col-sm-2 col-form-label">Pejabat</label>
            <div class="col-sm-4">
                <select class="form-select" name="pejabatId">
                    <?php foreach ($pejabat as $p) : ?>
                        <option value="<?= ($p['idPejabat']); ?>" <?= set_select('idPejabat', $p['idPejabat']); ?>><?= $p['namaPejabat']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="suratId" class="col-sm-2 col-form-label">Dasar Surat</label>
            <div class="col-sm-4">
                <select class="form-select" name="suratId">
                    <?php foreach ($dasar as $d) : ?>
                        <option value="<?= ($d['idSurat']); ?>" <?= set_select('idSurat', $d['idSurat']); ?>><?= $d['noSurat']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="filePdf" class="form-label col-sm-2">File PDF</label>
            <div class="col-sm-4">
                <span class="input-group-btn">
                    <input class="btn-file  form-control <?= (isset($errors['filePdf'])) ? 'is-invalid' : ''; ?>" type="file" name="filePdf" id="filePdf" value="<?= set_value('filePdf'); ?>">
                    <div class="invalid-feedback">
                        <?= (isset($errors['filePdf'])) ? $errors['filePdf'] : ''; ?>
                    </div>
                </span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>