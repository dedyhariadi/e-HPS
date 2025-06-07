<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->
<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Edit Dasar Surat</h2>
        </div>

        <div class="row">
            <form action="/dasarsurat/prosesedit/<?= $surat['idSurat']; ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <!-- input no Surat -->
                    <label for="noSurat" class="col-sm-1 col-form-label">No Surat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= (isset($errors['noSurat'])) ? 'is-invalid' : ''; ?>" name="noSurat" value="<?= set_value('noSurat', $surat['noSurat']); ?>">
                        <div class="invalid-feedback">
                            <?= (isset($errors['noSurat'])) ? $errors['noSurat'] : ''; ?>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>


                    <!-- input tanggal surat -->
                    <label for="tanggal" class="col-sm-1 pe-0  col-form-label">Tanggal Surat</label>
                    <div class="col-sm-3 ms-4 ps-3">
                        <input type="text" autocomplete="off" class="form-control <?= (isset($errors['tglSurat'])) ? 'is-invalid' : ''; ?>" name="tglSurat" value="<?= set_value('tglSurat', date('d F Y', strtotime($surat['tglSurat']))); ?>" id="tanggal">
                        <div class="invalid-feedback">
                            <?= (isset($errors['tglSurat'])) ? $errors['tglSurat'] : ''; ?>
                        </div>
                    </div>
                </div>

                <!-- input tentang -->
                <div class="row mb-3">
                    <label for="tentang" class="col-sm-1 col-form-label ">Tentang</label>
                    <div class="form-floating col-sm-4 ">
                        <textarea class="form-control <?= (isset($errors['tentang'])) ? 'is-invalid' : ''; ?>" placeholder="Masukkan perihal tentang surat" id="tentang" style="height: 100px" name="tentang"> <?= set_value('tentang', $surat['tentang']); ?></textarea>
                        <label for="tentang">Tentang</label>
                    </div>

                    <div class="invalid-feedback">
                        <?= (isset($errors['tentang'])) ? $errors['tentang'] : ''; ?>
                    </div>

                    <div class="col-sm-2"></div>

                    <!-- pejabat -->
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <label for="pejabat" class="col-sm-3 col-form-label">Pejabat</label>
                                    <div class="col-sm-7 mb-3">
                                        <input type="text" class="form-control <?= (isset($errors['pejabat'])) ? 'is-invalid' : ''; ?>" name="pejabat" value="<?= set_value('pejabat', $surat['pejabat']); ?>">
                                        <div class="invalid-feedback">
                                            <?= (isset($errors['pejabat'])) ? $errors['pejabat'] : ''; ?>
                                        </div>

                                    </div>
                                </div>

                            </div>


                            <!-- filepdf -->
                            <div class="col-sm-12">
                                <div class="row">
                                    <label for="filePdf" class="col-sm-3 col-form-label ">File PDF</label>
                                    <div class="col-sm-7">
                                        <input class="btn-file  form-control <?= (isset($errors['filePdf'])) ? 'is-invalid' : ''; ?>" type="file" name="filePdf" id="filePdf" value="<?= set_value('filePdf', $surat['filePdf']); ?>">
                                        <div class="invalid-feedback">
                                            <?= (isset($errors['filePdf'])) ? $errors['filePdf'] : ''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br>



                </div>
                <div class="row text-start">
                    <div class="col-8"></div>
                    <div class="col-3 mt-3 ms-4">
                        <a href="/dasarsurat" class="btn btn-warning me-3">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>