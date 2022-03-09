<?= $this->extend('auth/templateAuth'); ?>
<?= $this->section('content'); ?>


<form class="user" method="post" action="/auth/register">
    <?= csrf_field(); ?>
    <div class="form-group">
        <input type="text" value="<?= old('name'); ?>" class="form-control form-control-user <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Full name">
        <div class="invalid-feedback ml-3">
            <?= $validation->getError('name'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="text" value="<?= old('email'); ?>" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address">
        <div class="invalid-feedback ml-3">
            <?= $validation->getError('email'); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1" name="password1" placeholder="Password">
            <div class="invalid-feedback ml-3">
                <?= $validation->getError('password1'); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2" placeholder="Repeat Password">
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Register Account
    </button>
</form>
<hr>
<div class="text-center">
    <a class="small" href="forgot-password.html">Forgot Password?</a>
</div>
<div class="text-center">
    <a class="small" href="/">Already have an account? Login!</a>
</div>

<?= $this->endSection(); ?>