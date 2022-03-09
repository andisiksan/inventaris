<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="container">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/barang/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input name="nama_barang" required type="namabarang" class="form-control" id="namabarang" aria-describedby="autofocus">
                    </div>
                    <!-- <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah Barang">
                    </div> -->


                    <div class="form-group">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori" class="form-label">Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($status as $e) : ?>
                                <option value="<?= $e['id_status']; ?>"><?= $e['status']; ?></option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Tambahkan Gambar</label>
                        <input name="image" class="form-control form-control-sm" id="gambar" type="file">
                    </div>

                    <div class="form-group">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" required id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>



                    <button type="submit" class="btn btn-primary mb-3">Submit</button>


                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>