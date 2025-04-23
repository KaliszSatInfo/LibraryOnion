<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="<?= esc($book->cover_image) ?>" class="card-img-top" alt="Cover">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">
                            <?= anchor('books/'.$book->id, esc($book->title)) ?>
                        </h5>

                        <form action="<?= base_url('books/delete/' . $book->id) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                            <button type="submit" class="btn btn-danger btn-sm mt-3 w-100">Delete</button>
                        </form>
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