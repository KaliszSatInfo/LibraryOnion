<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?php 
    $ionAuth = new \IonAuth\Libraries\IonAuth();
    $isLoggedIn = $ionAuth->loggedIn();
?>

<div class="container my-4">
        <?php if ($isLoggedIn): ?>
            <a href="<?= base_url('books/new') ?>" class="btn btn-warning fs-3 mb-4 fw-bold">Add New Book</a>
        <?php endif; ?>

    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="<?= $book->cover_image ?>" class="card-img-top" alt="Cover">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">
                            <?= anchor('books/'.$book->id, $book->title) ?>
                        </h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <div class="d-flex">
        <div class="mx-auto text-center">
            <?= $pager->links(); ?>
        </div>
    </div>
</footer>

<?= $this->endSection() ?>