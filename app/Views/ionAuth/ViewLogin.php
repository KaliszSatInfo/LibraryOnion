<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Email or Username</label>
            <input type="text" name="identity" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check mt-2">
            <input type="checkbox" class="form-check-input" name="remember" value="1">
            <label class="form-check-label">Remember me</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
</div>

<?= $this->endSection() ?>