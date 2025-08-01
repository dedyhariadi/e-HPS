<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- awal content -->



<div class="container">
    <div class="col">
        <div class="row">
            <h2 class="my-4">Form Edit Pejabat </h2>
        </div>

        <div class="row">
            <?php
            $hidden = ['idPejabat' => $pejabat['idPejabat']];
            echo form_open('pejabat/proses_edit', '', $hidden); //ini utk membuka <form>
            ?>
            <div class="row mb-3">
                <label for="namaPejabat" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= (isset($errors['namaPejabat'])) ? 'is-invalid' : ''; ?>" name="namaPejabat" autofocus value="<?= set_value('namaPejabat', $pejabat['namaPejabat']); ?>">
                    <div class="invalid-feedback">
                        <?= (isset($errors['namaPejabat'])) ? $errors['namaPejabat'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="pangkat" class="col-sm-2 col-form-label">Pangkat</label>
                <div class="col-sm-4">
                    <select class="form-select" name="idPangkat">
                        <?php
                        foreach ($pangkat as $b) :
                            if ($b['idPangkat'] == $pejabat['pangkatId']) {
                        ?>
                                <option value="<?= ($b['idPangkat']); ?>" <?= set_select('idPangkat', $b['idPangkat']); ?> selected><?= $b['pangkat']; ?></option>
                            <?php } else { ?>
                                <option value="<?= ($b['idPangkat']); ?>" <?= set_select('idPangkat', $b['idPangkat']); ?>><?= $b['pangkat']; ?></option>
                        <?php
                            }
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="NRP" class="col-sm-2 col-form-label">NRP</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= (isset($errors['NRP'])) ? 'is-invalid' : ''; ?>" name="NRP" value="<?= set_value('NRP', $pejabat['NRP']); ?>">
                    <div class="invalid-feedback">
                        <?= (isset($errors['NRP'])) ? $errors['NRP'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= (isset($errors['jabatan'])) ? 'is-invalid' : ''; ?>" name="jabatan" value="<?= set_value('jabatan', $pejabat['jabatan']); ?>">
                    <div class="invalid-feedback">
                        <?= (isset($errors['jabatan'])) ? $errors['jabatan'] : ''; ?>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-4">
                    <?= anchor('pejabat', 'Kembali', ['class' => 'btn btn-primary me-3']); ?>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- akhir content -->

<?= $this->endSection(); ?>