<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>


<?php 
    $ionAuth = new \IonAuth\Libraries\IonAuth();
    $isLoggedIn = $ionAuth->loggedIn();
?>

<div class="container mt-4">
    <?php if($isLoggedIn): ?>
    <button id="toggleButton">Add genre (CSV)</button>
    <form id="uploadForm"  method="POST" enctype="multipart/form-data" style= "display: none" action="<?= base_url('addGenre')?>">
        <input type="file" accept =".csv" name="file" required>
    <button type="submit">Submit</button>
  </form>
  <?php endif; ?>
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

<script>
    const toggleBtn = document.getElementById('toggleButton');
    const form = document.getElementById('uploadForm');

    toggleBtn.addEventListener('click', () => {
      if (form.style.display === 'none') {
        form.style.display = 'block';
        //toggleBtn.textContent = 'Hide Upload Form';
      } else {
        form.style.display = 'none';
        //toggleBtn.textContent = 'Show Upload Form';
      }
    });
  </script>
  <style>
  #uploadForm {
    margin-top: 1rem;
    padding: 1rem;
    border: 1px solid #ffc107;
    border-radius: 8px;
    background-color: #fff8e1;
  }

  #uploadForm input[type="file"] {
    display: block;
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 6px;
    background-color: #fff;
    font-size: 0.9rem;
  }

  #uploadForm button[type="submit"] {
    background-color: #ffc107;
    border: none;
    color: #333;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: bold;
    font-size: 0.9rem;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }

  #uploadForm button[type="submit"]:hover {
    background-color: #e0a800;
  }
    #toggleButton {
    background-color: #ffc107;
    border: none;
    color: #333;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: bold;
    font-size: 0.9rem;
    cursor: pointer;
    width: 100%; /* full width */
    transition: background-color 0.2s ease;
  }

  #toggleButton:hover {
    background-color: #e0a800;
  }
</style>

<?= $this->endSection() ?>

