<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 ml-auto mr-auto mt-4">
        <div class="card border-left-light bg-primary shadow h-100 py-2 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-light text-uppercase mb-1 " style="font-size: 15px;">
                            Jumlah Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-light">Jumlah : <?= $jumlah; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php foreach ($kategori as $key) : ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-<?= $key['warna']; ?> shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 15px;">
                                <?= $key['namaKategori']; ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Jumlah : <?= $key['jumlah']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>