<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>




<div class="card mb-3" style="max-width: 600px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <a href="" data-toggle="modal" data-target="#gambar" type="button">
                <img src="<?= base_url(); ?>/img/<?= $barang['image']; ?>" width="200" alt="...">
            </a>
        </div>

        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $barang['nama_barang']; ?></h5>

                <p class="card-text"><?= $barang['nama_kategori']; ?></p>
                <h5>
                    <span class="badge badge-<?= $barang['warna_status']; ?>"><?= $barang['status']; ?></span>
                </h5>
                <p class="card-text"><?= $barang['keterangan']; ?></p>
                <p class="card-text"><small class="text-muted">Last updated <?= $barang['updated_at']; ?></small></p>
                <p class="card-text"><small class="text-muted">Created<?= $barang['created_at']; ?></small></p>
            </div>
        </div>
    </div>
</div>

<a href="<?= base_url(); ?>/barang/edit/<?= $barang['id_barang']; ?>" type="button" class="btn btn-warning">Update</a>



<a href="" data-toggle="modal" data-target="#staticBackdrop" type="button" class="btn btn-danger">Hapus</a>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Yakin Ingin Menghapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="<?= base_url(); ?>/barang/delete/<?= $barang['id_barang']; ?>" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="gambar" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <img src="<?= base_url(); ?>/img/<?= $barang['image']; ?>" width="500" alt="...">

        </div>
    </div>
</div>


<?= $this->endSection(); ?>