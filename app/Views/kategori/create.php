<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4 col-sm-8">
    <div class="container">
        <div class=" row">
            <div class="col-12">
                <form action="<?= base_url(); ?>/kategori/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input name="nama_kategori" type="text" class="form-control <?= $validation->hasError('nama_kategori') ? 'is-invalid' : ''; ?>" placeholder="Nama Kategori" id="nama_kategori" aria-describedby="autofocus">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_kategori'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <select name="warna" class="form-control <?= $validation->hasError('warna') ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1">

                            <option selected disabled>Pilih </option>
                            <option class="text-danger font-weight-bold" value="danger">Danger</option>
                            <option class="text-primary font-weight-bold" value="primary">Primary</option>
                            <option class="text-secondary font-weight-bold" value="secondary">Secondary</option>
                            <option class="text-success font-weight-bold" value="success">Success</option>
                            <option class="text-warning font-weight-bold" value="warning">Warning</option>
                            <option class="text-info font-weight-bold" value="info">Info</option>
                            <option class="text-dark font-weight-bold" value="dark">Dark</option>



                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('warna'); ?>
                        </div>
                        <!-- <input type="text" name="warna" id="warna" class="form-control" placeholder="Warna Kategori"> -->
                    </div>


                    <button type="submit" class="btn btn-primary mb-3">Submit</button>


                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>