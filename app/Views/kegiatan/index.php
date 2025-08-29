<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col text-center">
            <h1> Daftar Kegiatan</h1>
        </div>
    </div>

    <div class="row text-start">
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKegiatanModal">
                Tambah Kegiatan
            </button>
        </div>
        <div class="col">

            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Silahkan ketikkan pencarian.." name="keyword">
                    <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                </div>
            </form>

        </div>
    </div>

    <div class="row">

        <!-- alert pesan setelah berhasil disimpan -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-bookmarks-fill"></i>
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        <!-- akhir alert -->

        <table class="table table-hover" name="barang" width="100%">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col" width="10%">No</th>
                    <th scope="col" width="25%">Nama Kegiatan</th>
                    <th scope="col" width="15%">No. Surat</th>
                    <th scope="col" width="10%">Tanggal Surat</th>
                    <th scope="col" width="15%">Pejabat</th>
                    <th scope="col" width="10%">Last Updated</th>
                    <th scope="col" width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $i = 1;

                foreach ($kegiatan as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td style="width: 600px;">


                            <?= anchor('kegiatan/' . $b['idKegiatan'], $b['namaKegiatan'], ['class' => 'link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-100-hover']); ?>

                        </td>
                        <td><?= $b['noSurat']; ?></td>
                        <td class="text-left">
                            <?= date('d', strtotime($b['tglSurat'])); ?>
                            <?= $bulan[intval(date('m', strtotime($b['tglSurat']))) - 1] . " " . date('Y', strtotime($b['tglSurat'])); ?>
                        </td>
                        <td><?= $b['namaPejabat']; ?></td>
                        <td class="text-left">
                            <?= date('d', strtotime($b['updated_at'])); ?>
                            <?= $bulan[intval(date('m', strtotime($b['updated_at']))) - 1] . " " . date('Y', strtotime($b['updated_at'])); ?>
                        </td>
                        <td class="text-end">
                            <?php
                            if ($b['filePdf'] != 'noFile.pdf') {
                            ?>
                                <?= anchor('assets/pdf/' . $b['filePdf'], '<i class="bi bi-file-arrow-down"></i>', ['class' => 'btn btn-success', 'target' => '_blank']); ?>

                            <?php } else { ?>
                                <a href="#" class="btn btn-secondary disabled"><i class="bi bi-file-arrow-down"></i></a>
                            <?php } ?>
                            <?= anchor('kegiatan/' . $b['idKegiatan'], 'Detail', ['class' => 'btn btn-warning', 'type' => 'button']); ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>

<!-- Modal Form Tambah Kegiatan -->
<div class="modal fade" id="tambahKegiatanModal" tabindex="-1" aria-labelledby="tambahKegiatanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahKegiatanModalLabel">Form Tambah Kegiatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Error Alert -->
                <?php if (isset($errors) && !empty($errors)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal menyimpan data:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($errors as $error) : ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?= form_open_multipart('kegiatan/simpan', ['id' => 'tambahKegiatanForm']); ?>
                <div class="row mb-3">
                    <!-- input nama kegiatan -->
                    <label for="namaKegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control <?= (isset($errors['namaKegiatan'])) ? 'is-invalid' : ''; ?>" name="namaKegiatan" autofocus><?php echo set_value('namaKegiatan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= (isset($errors['namaKegiatan'])) ? $errors['namaKegiatan'] : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- input pejabat -->
                    <label for="pejabat" class="col-sm-3 col-form-label">Pejabat</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="pejabatId">
                            <option value="">Pilih Pejabat</option>
                            <?php foreach ($pejabat as $p) : ?>
                                <option value="<?= ($p['idPejabat']); ?>" <?= set_select('pejabatId', $p['idPejabat']); ?>><?= $p['namaPejabat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- input no Surat -->
                    <label for="noSurat" class="col-sm-3 col-form-label">No Surat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= (isset($errors['noSurat'])) ? 'is-invalid' : ''; ?>" name="noSurat" value="<?php echo set_value('noSurat'); ?>">
                        <div class="invalid-feedback">
                            <?= (isset($errors['noSurat'])) ? $errors['noSurat'] : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- input tanggal surat -->
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-9">
                        <input type="text" autocomplete="off" class="form-control tanggal-input <?= (isset($errors['tglSurat'])) ? 'is-invalid' : ''; ?>" name="tglSurat" value="<?php echo tampilTanggal('tglSurat'); ?>">
                        <div class="invalid-feedback">
                            <?= (isset($errors['tglSurat'])) ? $errors['tglSurat'] : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- input dasar surat -->
                    <label for="suratId" class="col-sm-3 col-form-label">Dasar Surat</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="suratId">
                            <option value="">Pilih Dasar Surat</option>
                            <?php foreach ($dasar as $d) : ?>
                                <option value="<?= ($d['idSurat']); ?>" <?= set_select('suratId', $d['idSurat']); ?>><?= $d['noSurat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- input file PDF -->
                    <label for="filePdf" class="col-sm-3 col-form-label">File PDF</label>
                    <div class="col-sm-9">
                        <input class="form-control <?= (isset($errors['filePdf'])) ? 'is-invalid' : ''; ?>" type="file" name="filePdf" id="filePdf">
                        <div class="invalid-feedback">
                            <?= (isset($errors['filePdf'])) ? $errors['filePdf'] : ''; ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="tambahKegiatanForm">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- akhir content -->

<script>
    // Set status variables for JavaScript
    window.kegiatanSuccessMessage = <?php echo session()->getFlashdata('pesan') ? 'true' : 'false'; ?>;
    window.kegiatanHasErrors = <?php echo (isset($errors) && !empty($errors)) ? 'true' : 'false'; ?>;
</script>

<?= $this->endSection(); ?>