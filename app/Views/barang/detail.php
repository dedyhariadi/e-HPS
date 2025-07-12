<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<div class="container">
    <div class="row mt-3 mb-3">
        <h1>Detail Barang</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">

                        <?php
                        $imageProperties = [
                            'src'    => 'assets/images/' . $barang['gambar'],
                            'class'  => 'img-fluid rounded-start',
                            'width'  => '500',
                        ];

                        echo img($imageProperties);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $barang['namaBarang']; ?></h5>
                            <p class="card-text"><b>Satuan : </b><?= $barang['namaSatuan']; ?></p>
                            <p class="card-text"><small class="text-muted"> <b>Last updated :</b> <?= date('d M Y H:m:s', strtotime($barang['updated_atBarang'])); ?></small></p>

                            <?php

                            echo anchor('barang/edit/' . $barang['idBarang'], 'Edit', ['class' => 'btn btn-warning']);


                            echo form_open('barang/' . $barang['idBarang'], ['class' => 'd-inline'], ['_method' => 'DELETE']);

                            $data = [
                                'name'    => 'button',
                                'class'   => 'btn btn-danger',
                                'type'    => 'submit',
                                'content' => 'Delete',
                                'onclick' => "return confirm('Apakah anda yakin?');"
                            ];

                            echo form_button($data);
                            echo form_close();

                            ?>

                            <br><br>

                            <?= anchor('barang', 'Kembali ke daftar barang', ['class' => 'link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover']); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-3">

        <div class="col-3">

            <?= anchor('referensi/create/' . $barang['idBarang'], 'Tambah Referensi', ['class' => 'btn btn-warning']); ?>


        </div>
        <!-- alert pesan setelah berhasil disimpan -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-bookmarks-fill"></i>
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        <!-- akhir alert -->
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead class="text-center fs-5">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sumber</th>
                    <th scope="col">Link</th>
                    <th scope="col" colspan="2">Harga</th>
                    <th scope="col">Last Updated</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($barangRef as $b) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i++; ?></th>
                        <td>
                            <?php
                            foreach ($sumber as $s) :
                                echo ($b['sumberId'] == $s['idSumber']) ? $s['namaSumber'] : '';
                            endforeach;
                            ?>

                        </td>
                        <td width="30%">

                            <span class="d-inline-block text-truncate" style="max-width: 350px;">
                                <?= anchor_popup($b['link'],); ?>
                            </span>


                        </td>
                        <td class="text-end">
                            <?php
                            echo "Rp ";
                            ?>
                        </td>
                        <td class="text-end">
                            <?php
                            echo number_format($b['harga'], 0, ",", ".");
                            ?>
                        </td>
                        <td class="text-center"><?= date('d M Y H:m:s', strtotime($b['updated_at'])); ?></td>
                        <td class="text-center">

                            <?php

                            echo anchor('referensi/edit/' . $b['idReferensi'], '<i class="bi bi-pencil"></i>', ['class' => 'btn btn-warning', 'type' => 'button']);


                            echo form_open('referensi/' . $b['idReferensi'], ['class' => 'd-inline'], ['_method' => 'DELETE', 'idBarang' => $b['idBarang']]);

                            $data = [
                                'name'    => 'button',
                                'class'   => 'btn btn-danger',
                                'type'    => 'submit',
                                'content' => '<i class="bi bi-trash-fill"></i>',
                                'onclick' => "return confirm('Apakah anda yakin?');"
                            ];

                            echo form_button($data);
                            echo form_close();

                            ?>



                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>