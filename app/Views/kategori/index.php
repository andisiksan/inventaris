<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>





<?php if (session()->getFlashdata('pesan')) : ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses !</strong> <?= session()->getFlashdata('pesan'); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>


<!-- DataTales Example -->
<div class="kategori">
    <div class="card shadow mb-4 col-8">
        <div class="card-header py-3">

            <a href="<?= base_url(); ?>/kategori/create" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Kategori</span>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori as $data) :
                        ?>

                            <tr>
                                <th><?= $no++; ?></th>

                                <td><?= $data['nama_kategori']; ?></td>
                                <td><?= $data['warna']; ?></td>

                                <td>


                                    <a href="" data-toggle="modal" data-target="#staticBackdrop<?= $data['id_kategori']; ?>" type="button" class="btn btn-danger">Hapus</a>


                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop<?= $data['id_kategori']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                <form action="<?= base_url(); ?>/kategori/delete/<?= $data['id_kategori']; ?>" method="POST" class="d-inline">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>


                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>













    </div>
</div>

<?= $this->endSection(); ?>