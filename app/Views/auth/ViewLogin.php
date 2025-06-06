<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Login</h2>
<form method="post" action="<?= site_url('login') ?>">
    <input type="text" name="identity" placeholder="Email or Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<?php if (session('error')): ?>
    <p style="color: red;"><?= esc(session('error')) ?></p>
<?php endif; ?>

<?php if (session('message')): ?>
    <p style="color: green;"><?= esc(session('message')) ?></p>
<?php endif; ?>

<?= $this->endSection() ?>