<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use CodeIgniter\I18n\Time;
?>
<!-- content -->

<div class="container">
    <div class="row mt-3 mb-3">
        <h1>Detail Kegiatan</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <!-- <div class="card mb-3" style="max-width: 650px;"> -->
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col">
                        <div class="card-body fs-5">
                            <h5 class="card-title"><?= $kegiatan['namaKegiatan']; ?></h5>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <p class="card-text"><b>Dasar</b></p>
                                </div>
                                <div class="col">: Surat
                                    <?= $dasar['pejabat'] . ' Nomor ' . $dasar['noSurat']; ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-3">
                                    <p class="card-text"><b>No. Surat</b></p>
                                </div>
                                <div class="col">:
                                    <?= $kegiatan['noSurat']; ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-3">
                                    <p class="card-text"><b>Tgl Surat</b></p>
                                </div>
                                <div class="col">:
                                    <?php
                                    $myTime = Time::parse($kegiatan['tglSurat'], 'Asia/Jakarta');
                                    echo  $myTime->toLocalizedString('d MMMM yyy'); ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-3">
                                    <p class="card-text"><b>Pejabat Ttd</b></p>
                                </div>
                                <div class="col">:
                                    <?= $pangkat['pangkat'] . ' ' . $kegiatan['namaPejabat'] . ' NRP ' . $kegiatan['NRP']; ?>
                                </div>
                            </div>

                            <div class="row mt-5 text-end">
                                <p class="card-text"><small class="text-muted"> <b>Last updated at</b> <?= date('d M Y H:m:s', strtotime($kegiatan['updated_at'])); ?></small></p>

                                <?= form_open('kegiatan/' . $kegiatan['idKegiatan'], ['class' => 'd-inline'], ['_method' => 'DELETE', 'idKegiatan' => $kegiatan['idKegiatan'], 'tandaHapus' => 'hapusKegiatan']); ?>

                                <?php
                                echo anchor('kegiatan/edit/' . $kegiatan['idKegiatan'], 'Edit', ['class' => 'btn btn-warning']);

                                $data = [
                                    'name'    => 'button',
                                    'class'   => 'btn btn-danger',
                                    'type'    => 'submit',
                                    'content' => 'Delete',
                                    'onclick' => "return confirm('Apakah anda yakin?');"
                                ];
                                echo " ";
                                echo form_button($data);

                                ?>


                                <?php
                                foreach ($trxGiatBarang as $b) :

                                    $banyakReferensi = 0;
                                    foreach ($trxReferensi as $trxR) :
                                        if ($trxR['trxGiatBarangId'] == $b['idTrxGiatBarang']) {
                                            $cetakLink[] = $trxR['link'];
                                            $cetakHarga[] = $trxR['harga'];

                                            foreach ($sumber as $s):
                                                if ($s['idSumber'] == $trxR['sumberId'])
                                                    $namaSumber[] = $s['namaSumber'];
                                            endforeach;
                                            $banyakReferensi++;
                                        }
                                    endforeach;
                                endforeach;

                                $atts = [
                                    'resizable' => 'yes',
                                    'screenx' => 80,
                                    'screeny' => 20,
                                    'window_name' => '_blank',
                                    'target' => '_blank',
                                ];

                                (count($trxGiatBarang) == 0 || $banyakReferensi == 0) ? $atts = ['class' => 'btn btn-secondary disabled'] : $atts = ['class' => 'btn btn-primary'];

                                echo anchor_popup('kegiatan/cetakPdf/' . $kegiatan['idKegiatan'], 'Cetak Pdf', $atts);
                                ?>



                                <?= form_close(); ?>



                                <p class="mt-3">

                                    <?= anchor('kegiatan', 'Kembali ke daftar kegiatan', ['class' => 'link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover']); ?>



                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card mb-3">
                <div class="card-header fs-5">
                    <h5 class="card-title">Sub Kegiatan</h5>
                </div>
                <div class="card-body fs-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Sub Kegiatan</th>
                                <th scope="col" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $n = 1;
                            foreach ($subKegiatan as $sk) : ?>
                                <tr>
                                    <th scope="row"><?= $n++; ?></th>
                                    <td><?= $sk['nama']; ?></td>
                                    <td class="text-center">
                                        <?php

                                        // echo anchor('', '<i class="bi bi-pencil"></i>', ['class' => 'btn btn-warning', 'type' => 'button']);

                                        echo anchor('', '<i class="bi bi-pencil"></i>', ['class' => 'btn btn-warning', 'type' => 'button', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#editSubKegiatanModal' . $n]);

                                        echo form_open('kegiatan/' . $idKegiatan, ['class' => 'd-inline'], ['_method' => 'DELETE', 'tandaDel' => 'true', 'idSubKegiatan' => $sk['idSubKegiatan']]);

                                        $data = [
                                            'name'    => 'button',
                                            'class'   => 'btn btn-danger',
                                            'type'    => 'submit',
                                            'content' => '<i class="bi bi-trash-fill"></i>',
                                            'onclick' => "return confirm('Apakah anda yakin menghapus sub kegiatan?');"
                                        ];
                                        echo form_button($data);


                                        echo form_close();
                                        ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td>
                                    <?= anchor('', 'add', ['class' => 'link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#tambahSubKegiatanModal']); ?>
                                </td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm">
        <div class="row mt-5 mb-3">

            <div class="col-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">
                    Tambah barang
                </button>
            </div>

            <!-- alert pesan setelah berhasil disimpan -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <i class="bi bi-bookmarks-fill"></i>
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;
            d($trxSubKegiatan);
            ?>

            <!-- akhir alert -->

            <!-- daftar barang -->

            <div class="row mt-2">
                <table class="table table-hover table-bordered fs-5">
                    <thead class="text-center align-middle">
                        <tr>
                            <th scope="col" rowspan="2">No</th>
                            <th scope="col" rowspan="2">Barang</th>
                            <th scope="col" rowspan="2">Kebutuhan</th>
                            <th scope="col" colspan="2">Referensi 1</th>
                            <th scope="col" colspan="2">Referensi 2</th>
                            <th scope="col" colspan="2" rowspan="2">Harga Rata2</th>
                            <th scope="col" rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <td scope="col">Link</td>
                            <td scope="col">Harga</td>
                            <td scope="col">Link</td>
                            <td scope="col">Harga</td>
                        </tr>

                    </thead>
                    <tbody class="table-group-divider">
                        <?php

                        $i = 1;
                        $currentSubKegiatan = null;
                        dd($trxSubKegiatan);
                        foreach ($trxSubKegiatan as $b => $kolom) :
                            $currentSubKegiatan = $b['subKegiatanId'];
                        ?>


                            <tr>
                                <th scope="row" class="text-center"><?= $i++; ?></th>
                                <td>
                                    <?php
                                    foreach ($barang as $brg) :
                                        if ($b['barangId'] == $brg['idBarang']) {
                                            echo $brg['namaBarang'];
                                        }
                                    endforeach;
                                    ?>

                                </td>
                                <td class="ps-5 text-end">
                                    <?php
                                    echo number_format($b['kebutuhan'], 0, ",", ".") . " ";
                                    foreach ($barang as $brg) :
                                        if ($b['barangId'] == $brg['idBarang']) {
                                            echo $brg['namaSatuan'];
                                        }
                                    endforeach;
                                    ?>

                                </td>

                                <?php
                                unset($cetakLink);
                                unset($cetakHarga);
                                unset($namaSumber);
                                unset($referensiId);
                                unset($indeksKe);
                                unset($hargaHitung);
                                $Found = false;
                                foreach ($trxReferensi as $trxR):
                                    if ($trxR['trxGiatBarangId'] == $b['idTrxGiatBarang']) {
                                        $cetakLink[] = $trxR['link'];
                                        $cetakHarga[] = $trxR['harga'];
                                        $referensiId[] = $trxR['referensiId'];
                                        $indeksKe[] = $trxR['indeks'];

                                        foreach ($sumber as $s):
                                            if ($s['idSumber'] == $trxR['sumberId']) {
                                                $namaSumber[] = $s['namaSumber'];
                                            }
                                        endforeach;
                                        $Found = true;
                                    }
                                endforeach;
                                ?>

                                <td style="max-width: 150px;">
                                    <?php
                                    $hargaTampil = '';
                                    if ($Found && in_array('1', $indeksKe)) {
                                        $indeks = array_search('1', $indeksKe);
                                        $hargaTampil = $cetakHarga[$indeks];
                                    ?>
                                        <span class="float-start">
                                            <?= anchor_popup($cetakLink[$indeks], $namaSumber[$indeks], ['class' => 'link-body-emphasis link-offset-2 link-underline-opacity-10 link-underline-opacity-100-hover']); ?>
                                        </span>
                                        <span class="float-end">
                                            <?= form_open('kegiatan/' . $b['idTrxGiatBarang'], ['class' => 'd-inline'], ['idReferensi' => $referensiId[$indeks], 'idKegiatan' => $idKegiatan, 'tandaHapus' => '1', '_method' => 'DELETE', 'indeksKe' => '1']); ?>

                                            <button type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('apakah anda yakin menghapus?');"><i class="bi bi-x-square "></i></button>

                                            <?= form_close(); ?>
                                        </span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="float-end">
                                            <a href="" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#modalTambahReferensi<?= $b['idTrxGiatBarang'] . 'r1'; ?>">add</a>
                                        </span>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td class="text-end">

                                    <?php
                                    if ($hargaTampil !== '') {
                                        $hargaHitung[] = $hargaTampil;
                                    }
                                    ?>
                                    <?= ($hargaTampil !== '') ? number_format($hargaTampil, 0, ",", ".") : ""; ?>

                                </td>
                                <td class="text-truncate" style="max-width: 150px;">
                                    <?php
                                    $hargaTampil = '';
                                    if ($Found && in_array('2', $indeksKe)) {
                                        $indeks = array_search('2', $indeksKe);
                                        $hargaTampil = $cetakHarga[$indeks];
                                    ?>
                                        <span class="float-start">
                                            <?php
                                            echo anchor_popup($cetakLink[$indeks], $namaSumber[$indeks], ['class' => 'link-body-emphasis link-offset-2 link-underline-opacity-10 link-underline-opacity-100-hover']);

                                            ?></span>
                                        <span class="float-end">
                                            <?= form_open('kegiatan/' . $b['idTrxGiatBarang'], ['class' => 'd-inline'], ['idReferensi' => $referensiId[$indeks], 'idKegiatan' => $idKegiatan, 'tandaHapus' => '1', '_method' => 'DELETE', 'indeksKe' => '2']); ?>

                                            <button type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('apakah anda yakin menghapus?');"><i class="bi bi-x-square "></i></button>

                                            <?= form_close(); ?>
                                        </span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="float-end">
                                            <a href="" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                                data-bs-toggle="modal" data-bs-target="#modalTambahReferensi<?= $b['idTrxGiatBarang'] . 'r2'; ?>">add
                                            </a>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="text-end">
                                    <?php
                                    if ($hargaTampil !== '') {
                                        $hargaHitung[] = $hargaTampil;
                                    }
                                    ?>
                                    <?= ($hargaTampil !== '') ? number_format($hargaTampil, 0, ",", ".") : ""; ?>

                                <td class="text-end">
                                    <?php
                                    echo "Rp ";
                                    ?>
                                </td>
                                <td class="text-end">
                                    <?php
                                    if (isset($hargaHitung) && count($hargaHitung) > 0) {
                                        $cetakAverage = array_sum($hargaHitung) / count($hargaHitung);
                                        echo number_format($cetakAverage, 0, ",", ".");
                                    }
                                    ?>
                                </td>


                                <td class="text-center">
                                    <?php

                                    echo form_open('kegiatan/' . $b['idTrxGiatBarang'], ['class' => 'd-inline'], ['_method' => 'DELETE', 'idKegiatan' => $idKegiatan]);

                                    $data = [
                                        'name'    => 'button',
                                        'class'   => 'btn btn-danger',
                                        'type'    => 'submit',
                                        'content' => '<i class="bi bi-trash-fill"></i>',
                                        'onclick' => "return confirm('Apakah anda yakin?');"
                                    ];
                                    echo form_button($data);

                                    echo form_close(); ?>
                                </td>
                            </tr>
                        <?php
                            unset($cetakLink);
                            unset($cetakHarga);
                            unset($namaSumber);
                            unset($referensiId);
                            unset($indeksKe);
                            unset($hargaHitung);
                        endforeach;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Form Tambah Sub Kegiatan-->

    <div class="modal fade " id="tambahSubKegiatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Tambah Sub Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <?= form_open('kegiatan/' . $idKegiatan, '', ['tandaSubKegiatan' => 'menambahkan sub kegiatan', 'tandaAdd' => 'true']); ?>

                <div class="modal-body">
                    <div class="mb-3">
                        <?= form_input('namaSubKegiatan', '', ['id' => 'namaSubKegiatan', 'class' => 'form-control fs-2', 'aria-describedby' => 'subKegiatanHelp'], 'text'); ?>
                        <div id="subKegiatanHelp" class="form-text">nama sub kegiatan.</div>
                    </div>
                </div>
                <div class="row  text-center my-4">
                    <div class="col">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

                <?= form_close(); ?>

            </div>
        </div>
    </div>



    <!-- Modal Form EDIT Sub Kegiatan-->

    <?php
    $n = 2;
    foreach ($subKegiatan as $sk) :
        $idmodal = "editSubKegiatanModal" . $n++;
    ?>

        <div class="modal fade" id=<?= $idmodal; ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Edit Sub Kegiatan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <?= form_open('kegiatan/' . $idKegiatan, '', ['tandaSubKegiatan' => 'menambahkan sub kegiatan', 'idSubKegiatan' => $sk['idSubKegiatan'], 'tandaEdit' => 'true']); ?>

                    <div class="modal-body">
                        <div class="mb-3">
                            <?= form_input('namaSubKegiatan', $sk['nama'], ['id' => 'namaSubKegiatan', 'class' => 'form-control fs-2', 'aria-describedby' => 'subKegiatanHelp'], 'text'); ?>
                            <div id="subKegiatanHelp" class="form-text">nama sub kegiatan.</div>
                        </div>
                    </div>
                    <div class="row  text-center my-4">
                        <div class="col">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    <?php
    endforeach;

    ?>

    <!-- Modal Form Tambah Barang-->

    <div class="modal fade " id="tambahBarangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fs-3">
                    <form action="" method="post">
                        <?= csrf_field(); ?>

                        <div class="row ms-5 mt-3">
                            <label for="combobox" class="d-inline form-label col-sm-4">Material</label>
                            <div class="col-sm-4 d-inline">
                                <select class="form-select mb-3 fs-4" id="combobox" name="idBarang">
                                    <?php foreach ($barang as $b) : ?>
                                        <option value=<?= $b['idBarang']; ?>><?= $b['namaBarang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php
                                ?>
                            </div>
                            <div class="d-inline col-sm-2">
                                <?php
                                session()->setFlashdata('idKegiatan', $idKegiatan);
                                echo anchor('barang/create', 'add', ['class' => '']);
                                ?>

                            </div>
                        </div>

                        <div class="row ms-5 mt-3">
                            <label for="combobox" class="d-inline form-label col-sm-4">Sub Kegiatan</label>
                            <div class="col-sm-4 d-inline">
                                <select class="form-select mb-3 fs-4" id="combobox" name="idSubKegiatan">
                                    <?php foreach ($subKegiatan as $sk) : ?>
                                        <option value=<?= $sk['idSubKegiatan']; ?>><?= $sk['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php
                                ?>
                            </div>
                        </div>

                        <div class="row ms-5 mt-2">
                            <label for="kebutuhan" class="col-sm-4 col-form-label">Kebutuhan</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control <?= (isset($errors['kebutuhan'])) ? 'is-invalid' : ''; ?> fs-4" name="kebutuhan" value="<?= set_value('kebutuhan'); ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($errors['kebutuhan'])) ? $errors['kebutuhan'] : ''; ?>
                                </div>
                            </div>
                        </div>


                </div>
                <div class="row  text-center my-4">
                    <div class="col">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <input type="hidden" name="tandaTambah" value="1">

                </form>
            </div>
        </div>
    </div>



    <?php foreach ($trxGiatBarang as $b): ?>
        <!-- Modal Form Tambah Referensi Tiap Barang-->

        <!-- modal tambah referensi 1 -->
        <div class="modal fade" id="modalTambahReferensi<?= $b['idTrxGiatBarang'] . 'r1'; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Referensi untuk
                            <span class="text-uppercase fs-5 fw-bold">
                                <?php
                                foreach ($barang as $brg) :
                                    if ($b['barangId'] == $brg['idBarang']) {
                                        $namabarang = $brg['namaBarang'];
                                        echo $namabarang;
                                    }
                                endforeach;
                                ?>
                            </span>

                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body fs-3">
                        <div class="row m-2 mt-3">
                            <table class="table table-hover fs-5">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col"></th>
                                        <th scope="col">Sumber</th>
                                        <th scope="col">Link</th>
                                        <th scope="col" colspan="2">Harga</th>
                                        <th scope="col">Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($referensi as $r) :
                                        if ($r['barangId'] == $b['barangId']) {
                                    ?>
                                            <tr>
                                                <th scope="row" class="text-center"><?= $i++; ?></th>
                                                <td>
                                                    <form action="" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="trxGiatBarangId" value="<?= $b['idTrxGiatBarang']; ?>">
                                                        <input type="hidden" name="referensiId" value="<?= $r['idReferensi']; ?>">
                                                        <input type="hidden" name="idKegiatan" value="<?= $idKegiatan; ?>">
                                                        <input type="hidden" name="indeksKe" value="1">
                                                        <input type="hidden" name="tandaTambah" value="2">
                                                        <button type="submit" class="btn-btn primary"><i class="bi bi-pencil-fill"></i></button>
                                                    </form>
                                                </td>
                                                <td><?= $r['namaSumber']; ?> </td>
                                                <td class="text-truncate"><?= $r['link']; ?></td>
                                                <td class="text-end"><?= "Rp "; ?></td>
                                                <td class="text-end"><?= number_format($r['harga'], 0, ",", "."); ?></td>
                                                <td class="text-center"><?= date('d M Y', strtotime($r['updated_at'])); ?></td>


                                            </tr>
                                    <?php
                                        };
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="modal-footer">


                        <div class="d-inline col-sm-3 text-end">
                            <?php
                            session()->setFlashdata('idKegiatan', $idKegiatan);
                            echo anchor('referensi/create/' . $b['barangId'], 'Tambah Referensi', ['class' => 'btn btn-success']);
                            ?>

                        </div>
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- modal tambah referensi 2 -->
        <div class="modal fade" id="modalTambahReferensi<?= $b['idTrxGiatBarang'] . 'r2'; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Referensi untuk
                            <span class="text-uppercase fs-5 fw-bold">
                                <?php
                                foreach ($barang as $brg) :
                                    if ($b['barangId'] == $brg['idBarang']) {
                                        $namabarang = $brg['namaBarang'];
                                        echo $namabarang;
                                    }
                                endforeach;
                                ?>
                            </span>

                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body fs-3">
                        <div class="row m-2 mt-3">
                            <table class="table table-hover fs-5">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col"></th>
                                        <th scope="col">Sumber</th>
                                        <th scope="col">Link</th>
                                        <th scope="col" colspan="2">Harga</th>
                                        <th scope="col">Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($referensi as $r) :
                                        if ($r['barangId'] == $b['barangId']) {
                                    ?>
                                            <tr>
                                                <th scope="row" class="text-center"><?= $i++; ?></th>
                                                <td>
                                                    <form action="" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="trxGiatBarangId" value="<?= $b['idTrxGiatBarang']; ?>">
                                                        <input type="hidden" name="referensiId" value="<?= $r['idReferensi']; ?>">
                                                        <input type="hidden" name="idKegiatan" value="<?= $idKegiatan; ?>">
                                                        <input type="hidden" name="indeksKe" value="2">
                                                        <input type="hidden" name="tandaTambah" value="2">
                                                        <button type="submit" class="btn-btn primary"><i class="bi bi-pencil-fill"></i></button>
                                                    </form>
                                                </td>
                                                <td><?= $r['namaSumber']; ?> </td>
                                                <td class="text-truncate"><?= $r['link']; ?></td>
                                                <td class="text-end"><?= "Rp "; ?></td>
                                                <td class="text-end"><?= number_format($r['harga'], 0, ",", "."); ?></td>
                                                <td class="text-center"><?= date('d M Y', strtotime($r['updated_at'])); ?></td>


                                            </tr>
                                    <?php
                                        };
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="modal-footer">


                        <div class="d-inline col-sm-3 text-end">
                            <?php
                            session()->setFlashdata('idKegiatan', $idKegiatan);
                            echo anchor('referensi/create/' . $b['barangId'], 'Tambah Referensi', ['class' => 'btn btn-success']);
                            ?>

                        </div>
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </div>
        </div>


    <?php endforeach; ?>

    <!-- akhir content -->

    <?= $this->endSection(); ?>