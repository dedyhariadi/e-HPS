<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->

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

                            <?= anchor('barang/edit/' . $barang['idBarang'], 'Edit', ['class' => 'btn btn-warning']); ?>

                            <?= form_open('barang/' . $barang['idBarang'], ['class' => 'd-inline'], ['_method' => 'DELETE']); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');">Delete</button>
                            </form>

                            <br><br>
                            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/barang">Kembali ke daftar barang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col">
            <div class="row">



                <h2 class="my-4">Form Edit Data Referensi </h2>
            </div>

            <div class="row">

                <?= form_open('referensi/proses_edit', '', ['barangId' => $barang['idBarang'], 'referensiId' => $referensiSingle['idReferensi']]); ?>


                <div class="row mb-3">
                    <label for="sumber" class="col-sm-2 col-form-label">Sumber</label>
                    <div class="col-sm-4">

                        <select class="form-select" name="sumberId" id="sumber">

                            <?php foreach ($sumber as $s) : ?>
                                <option value="<?= $s['idSumber']; ?>" <?= ($s['idSumber'] == $referensiSingle['sumberId']) ? 'selected' : ''; ?> <?= set_select('sumberId', $s['idSumber']); ?>>
                                    <?= $s['namaSumber']; ?>
                                </option>
                            <?php endforeach; ?>

                        </select>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Link" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= (isset($errors['link'])) ? 'is-invalid' : ''; ?>" value="<?= set_value('link', $referensiSingle['link']); ?>" name="link" id="link">
                        <div class="invalid-feedback">
                            <?= (isset($errors['link'])) ? $errors['link'] : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= (isset($errors['harga'])) ? 'is-invalid' : ''; ?>" value="<?= set_value('harga', $referensiSingle['harga']); ?>" name="harga" id="Harga">
                        <div class="invalid-feedback">
                            <?= (isset($errors['harga'])) ? $errors['harga'] : ''; ?>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?= form_close(); ?>
            </div>

        </div>
    </div>
</div>

<!-- akhir content -->

<?= $this->endSection(); ?>