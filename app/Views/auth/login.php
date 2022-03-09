<?= $this->extend('auth/templateAuth'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('pesan')) : ?>


    <?= session()->getFlashdata('pesan'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>

<?php endif; ?>

<form class="user" method="post" action="/auth/login">
    <div class="form-group">
        <input type="text" value="<?= old('email'); ?>" name="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Enter Email Address...">
        <div class="invalid-feedback ml-3">
            <?= $validation->getError('email'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password">
        <div class="invalid-feedback ml-3">
            <?= $validation->getError('password'); ?>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>

</form>
<hr>

<?= $this->endSection(); ?>