<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class=" row h-100">
    <div class="col-sm">
        <img src="<?= $book->cover_image ?>" class="" alt="Cover">
    </div>
    <div class="col-sm mt-5">
        <h2 class="card-title"><?=$book->title?></h2> 
        <p class="description my-3"><?=$book->description?></p>
        <div class="row">
            <div class="col-sm">
                    <p><a href="<?= site_url('books/edit/' . $book->id) ?>">
                    <button type="submit" class="btn btn-warning btn-sm mt-3 w-100">Edit Book</button></a></p>
            </div>
            <div class="col-sm">
                <form action="<?= base_url('books/delete/' . $book->id) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                    <button type="submit" class="btn btn-danger btn-sm mt-3 w-100">Delete</button>
                </form>
            </div>                
        </div>
    </div>
                    
</div>
<?= $this->endSection() ?>