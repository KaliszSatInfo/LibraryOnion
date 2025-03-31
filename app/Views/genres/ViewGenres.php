<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($genres as $genre): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card-body">
                        <h5 class="card-title"><?= $genre->name ?></h5>
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