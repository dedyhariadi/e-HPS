<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col text-center">
            <h1> Daftar Barang</h1>
        </div>
    </div>

    <div class="row text-start">
        <div class="col">
            <a href="/barang/create" class="btn btn-primary">Tambah Barang</a>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                </svg>
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        <!-- akhir alert -->

        <table class="table table-hover" name="barang">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Last Updated</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($tandaKeyword == false) {

                    $i = 1 + (8 * ($currentPage - 1)); //angka 8, disesuikan dengan jumlah baris per halaman di pagination (barangModel)
                } else {
                    $i = 1;
                }

                foreach ($barang as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td><?= $b['namaBarang']; ?></td>
                        <td><?= $b['namaSatuan']; ?></td>
                        <td class="text-center"><?= date('d M Y H:m:s', strtotime($b['updated_atBarang'])); ?></td>
                        <td class="text-center"><a type="button" class="btn btn-warning" href="/barang/<?= $b['idBarang']; ?>">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php
        if ($tandaKeyword == false) {
            echo $pager->links('barang', 'barang_pagination');
        }
        ?>

    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>