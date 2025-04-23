<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit Book</h1>

    <form action="<?= site_url('books/update/' . $book->id) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-4">
            <label class="block font-medium mb-1">Title</label>
            <input type="text" name="title" value="<?= esc($book->title) ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2"><?= esc($book->description) ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Published Date</label>
            <input type="text" name="published_date" value="<?= esc($book->published_date) ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="text-right">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save Changes</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>