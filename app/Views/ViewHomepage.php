<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div id="homepageCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <?php foreach ($items as $index => $item): ?>
      <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
        <div class="row p-4">
          <div class="col-md-6 text-center">
            <img src="<?= esc($item->cover_image) ?>" class="img-fluid rounded" style="max-height: 400px;" alt="Book Cover">
          </div>
          <div class="col-md-6">
            <h4><?= esc($item->title) ?></h4>
            <p><?= esc($item->description) ?></p>
            <div class="d-flex align-items-center mt-3">
              <img src="<?= esc($item->portrait_image) ?>" width="128" height="128" alt="Author">
              <div><?= esc($item->first_name) . ' ' . esc($item->last_name) ?></div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<?= $this->endSection() ?>
