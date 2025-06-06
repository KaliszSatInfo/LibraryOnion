<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Register</h2>
<form method="post" action="<?= site_url('register') ?>">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<?php if (session('error')): ?> 
    <p style="color: red;"><?= esc(session('error')) ?></p>
<?php endif; ?>

<?= $this->endSection() ?>