<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="container">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/barang/update" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input name="id_barang" type="hidden" value="<?= $barang['id_barang']; ?>">
                    <div class="mb-3 mt-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input value="<?= $barang['nama_barang']; ?>" name="nama_barang" required type="namabarang" class="form-control" id="namabarang" aria-describedby="autofocus">
                    </div>


                    <div class="form-group">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($kategori as $k) : ?>
                                <option <?= $barang['id_kategori'] == $k['id_kategori'] ? 'selected' : ''; ?> value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori" class="form-label">Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($status as $e) : ?>
                                <option <?= $barang['id_status'] == $e['id_status'] ? 'selected' : ''; ?> value="<?= $e['id_status']; ?>"><?= $e['status']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-row">

                        <div class="col-md">
                            <label for="image_id">Gambar</label>
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" onchange="preview()" class="custom-file-input " id="image_id" name="image">

                                        <label class="custom-file-label" for="image_id"><?= $barang['image']; ?></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <img width="120" src="<?= base_url('img'); ?>/<?= $barang['image']; ?>" alt="" class="img img-preview">
                                    <input type="hidden" name="img_tetap" value="<?= $barang['image']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" required id="exampleFormControlTextarea1" rows="3"><?= $barang['keterangan']; ?></textarea>
                    </div>



                    <button type="submit" class="btn btn-warning mb-3">Update</button>


                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>