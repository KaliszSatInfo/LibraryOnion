<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <h2>Login</h2>
    <form method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="identity" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
</div>

<?= $this->endSection() ?>