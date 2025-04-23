<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php var_dump($book);?>
<p><a href="<?= site_url('books/edit/' . $book->id) ?>">Edit Book</a></p>
<?= $this->endSection() ?>