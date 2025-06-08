<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col text-center">
            <h1> Daftar Surat</h1>
        </div>
    </div>

    <div class="row text-start">
        <div class="col">
            <a href="/dasarsurat/create" class="btn btn-primary">Tambah Surat</a>
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

        <table class="table table-hover" name="barang">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col" width="40%">Perihal</th>
                    <th scope="col">Pejabat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($dasarSurat as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td><?= $b['noSurat']; ?></td>
                        <td><?= date('d M Y', strtotime($b['tglSurat'])); ?></td>
                        <td style="text-align: justify;"><?= $b['tentang']; ?></td>
                        <td><?= $b['pejabat']; ?></td>

                        <td class="text-center">
                            <form action="/dasarsurat/<?= $b['idSurat']; ?>" method="post" class="d-inline">


                                <?php
                                if ($b['filePdf'] != 'noFile.pdf') {
                                ?>
                                    <a href="/assets/pdf/<?= $b['filePdf']; ?>" target="_blank" class="btn btn-success"><i class="bi bi-file-arrow-down"></i></a>
                                <?php }
                                ?>

                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="idSurat" value="<?= $b['idSurat']; ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');"><i class="bi bi-trash-fill"></i></button>

                                <a href="/dasarsurat/edit/<?= $b['idSurat']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>