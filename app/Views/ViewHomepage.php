<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div id="homepageCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($items as $index => $item): ?>
      <div class="carousel-item bg_carousel <?= $index === 0 ? 'active' : '' ?>">
        <div class="row p-4 w-100">
          <div class="col-md-5 text-center">
            <img src="<?= $item->cover_image ?>" class="img-fluid rounded" style="max-height: 400px;" alt="Book Cover">
          </div>
          <div class="col-md-7">
            <h4><?= $item->title ?></h4>
            <p class="responsive-text"><?= $item->description ?></p>
            <div class="row mt-3">
              <?php 
              $portraitImages = explode(',', $item->portrait_images);
              $authors = explode(',', $item->authors);
              foreach ($portraitImages as $index => $portrait): ?>
                <div class="col-6 d-flex align-items-center">
                  <img src="<?= $portrait ?>" class="rounded me-2" width="96" height="96" alt="Author">
                  <div><?= $authors[$index] ?? '' ?></div>
                </div>
              <?php endforeach; ?>
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
