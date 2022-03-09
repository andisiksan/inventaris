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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php if ($var == 'barang') : ?>
            <a href="<?= base_url(); ?>/barang/create" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Barang</span>
            </a>
        <?php endif; ?>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <!-- <th>Jumlah</th> -->
                        <th>Status</th>
                        <th>Waktu Terakhir Pengecekan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang as $data) :
                    ?>

                        <tr>
                            <th><?= $no++; ?></th>

                            <td><?= $data['nama_barang']; ?></td>
                            <td><?= $data['nama_kategori']; ?></td>


                            <td>
                                <h5>
                                    <span class="badge badge-<?= $data['warna_status']; ?>"><?= $data['status']; ?></span>
                                </h5>
                            </td>
                            <td><?= $data['updated_at']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>/barang/<?= $data['id_barang']; ?>" type="button" class="btn btn-info">Detail</a>


                            </td>
                        </tr>


                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>












<?= $this->endSection(); ?>