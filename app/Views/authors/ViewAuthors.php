<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($authors as $author): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="<?= $author->portrait_image ?>" class="card-img-top" alt="Portrait">
                    <div class="card-body">
                        <h5 class="card-title"><?= $author->first_name, ' ', $author->last_name ?></h5>
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