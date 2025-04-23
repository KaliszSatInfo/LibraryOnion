<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">Add New Book</h1>

<form method="POST" action="<?= base_url('books/create') ?>">
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Published Date</label>
        <input type="date" name="published_date" class="form-control">
    </div>

    <div class="mb-3">
        <label>Cover Image URL</label>
        <input type="text" name="cover_image" class="form-control">
    </div>

    <div class="mb-3">
        <label>ISBN</label>
        <input type="text" name="isbn" class="form-control">
    </div>

    <div class="mb-3">
        <label>Authors</label>
        <select name="author_ids[]" class="form-control" multiple>
            <?php foreach ($authors as $author): ?>
                <option value="<?= $author->id ?>"><?= $author->first_name ?> <?= $author->last_name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Genres</label>
        <select name="genre_ids[]" class="form-control" multiple>
            <?php foreach ($genres as $genre): ?>
                <option value="<?= $genre->id ?>"><?= $genre->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Add Book</button>
</form>

<?= $this->endSection() ?>