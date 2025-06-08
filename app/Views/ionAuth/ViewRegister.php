<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Register</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="identity" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Register</button>
    </form>
</div>

<?= $this->endSection() ?>
