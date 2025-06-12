<!Doctype html>
<html>
    <head>
        <title>Babylon Onion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <?= $this->include("layout/assets");?> 
    </head>

    <body>
        <div class="page_wrapper">
        <?php 
            $ionAuth = new \IonAuth\Libraries\IonAuth();
            $isLoggedIn = $ionAuth->loggedIn();
            $currentUser = $isLoggedIn ? $ionAuth->user()->row() : null;
        ?>
        <?php /* if ($isLoggedIn): ?>
            <div class="text-end text-muted p-2 small">
                Logged in as: <?= $currentUser->username ?>
            </div>
        <?php else: ?>
            <div class="text-end text-muted p-2 small">
                Logged out
            </div>
        <?php endif; */?>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <li><img class="main_logo" src="assets/book_icon.png"></li>
                <a class="navbar-brand" href="<?= base_url() ?>">Babylon Onion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('books') ?>">Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('authors') ?>">Authors</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('genres') ?>">Genres</a></li>


                        <?php if ($isLoggedIn): ?>
                            <li class="nav-item">
                                <form method="post" action="<?= base_url('logout') ?>" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="nav-link btn btn-link">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('register') ?>">Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
                        <?php endif; ?>
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

        <div class="container content">
            <?= $this->renderSection("content");?>
        </div>

            <footer class="bg-dark text-white text-center py-3 mt-4">
                <div class="container">
                    <p class="mb-0">© 2025 Babylon Onion. All rights reserved.</p>
                    <p class="mb-0">Powered by CodeIgniter 4</p>
                </div>
            </footer>
        </div>
    </body>
</html>