<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col text-center">
            <h1> Daftar Pejabat</h1>
        </div>
    </div>

    <div class="row text-start">
        <div class="col">
            <a href="/pejabat/tambah" class="btn btn-primary">Tambah Pejabat</a>
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

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-bookmarks-fill"></i>
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        <!-- akhir alert -->

        <table class="table table-hover" name="pejabat">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Pangkat</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($pejabat as $p) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td><?= $p['namaPejabat']; ?></td>
                        <td>
                            <?= $p['pangkat']; ?>
                        </td>
                        <td class="text-center"><?= $p['NRP']; ?></td>
                        <td class="text-center"><?= $p['jabatan']; ?></td>
                        <td class="text-center">
                            <form action="/pejabat/<?= $p['idPejabat']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="idPejabat" value="<?= $p['idPejabat']; ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');"><i class="bi bi-trash-fill"></i></button>

                            </form>
                            <a href="/pejabat/edit/<?= $p['idPejabat']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>