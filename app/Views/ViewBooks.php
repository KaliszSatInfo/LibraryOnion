<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-md-2 mb-4">
                <div class="card h-100">
                    <img src="<?= esc($book->cover_image) ?>" class="card-img-top" alt="Cover">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($book->title) ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
