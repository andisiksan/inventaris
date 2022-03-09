<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>


<div class="user">
    <div class="card mb-3 shadow" style="max-width: 500px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/<?= $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name'] ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <?php $date = $user['created_at'];  ?>
                    <p class="card-text"><small class="text-muted">Dibuat pada <?= date('d F Y', strtotime($date)); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>