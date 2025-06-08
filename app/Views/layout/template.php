<!Doctype html>
<html>
    <head>
        <title>Babylon Onion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <?= $this->include("layout/assets");?> 
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url() ?>">Babylon Onion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('books') ?>">Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('authors') ?>">Authors</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('genres') ?>">Genres</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('register') ?>">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-3">
            <?php if (!empty($breadcrumbs)): ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?= $breadcrumbs ?>
                    </ol>
                </nav>
            <?php endif; ?>
        </div>

        <div class="container">
            <?= $this->renderSection("content");?>
        </div>
    </body>
</html>