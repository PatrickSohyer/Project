<img src="<?= $sourceBanner; ?>" class="img-fluid avatarBanner" />

<?php if (count($_SESSION) === 0) { ?>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark justify-content-center mb-3">
        <a class="navbar-brand text-light" href="#"></a>
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-dark" id="navCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-light mr-4" href="../../index.php" id="navBodyPage"><b>Accueil</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mr-4" href="<?= $allSeriesPage; ?>" id="navSerieTV"><b>Séries TV</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mr-4" href="<?= $allArticlesPage; ?>" id="navArticles"><b>Articles</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light mr-4" id="navCategorie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Catégorie</b></a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navCategorie">
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Action"><b>Action</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Aventure"><b>Aventure</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Comédie"><b>Comédie</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Drame"><b>Drame</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Enfants"><b>Enfants</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Fantastique&"><b>Fantastique</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Horreur"><b>Horreur</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Manga"><b>Manga</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Mini-séries"><b>Mini-séries</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Science fiction"><b>Science fiction</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Thriller"><b>Thriller</b></a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" id="showSignIn" href="<?= $signInPage; ?>"><b>Connexion</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" id="showSignUp" href="<?= $signUpPage; ?>"><b>S'inscrire</b></a>
                </li>
            </ul>

        </div>
    </nav>
<?php } elseif ($_SESSION['role'] == 'admin') { ?>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark justify-content-center mb-3">
        <a class="navbar-brand text-light" href="#"></a>
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-dark" id="navCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <img src="<?= $sourceImgNav ?>" class="mr-5" />
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-light mr-4" href="../../index.php" id="navBodyPage"><b>Accueil</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mr-4" href="<?= $allSeriesPage; ?>" id="navSerieTV"><b>Séries TV</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mr-4" href="<?= $allArticlesPage; ?>" id="navArticles"><b>Articles</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light mr-4" id="navCategorie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Catégories</b></a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navCategorie">
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Action"><b>Action</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Aventure"><b>Aventure</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Comédie"><b>Comédie</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Drame"><b>Drame</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Enfants"><b>Enfants</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Fantastique&"><b>Fantastique</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Horreur"><b>Horreur</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Manga"><b>Manga</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Mini-séries"><b>Mini-séries</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Science fiction"><b>Science fiction</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Thriller"><b>Thriller</b></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mr-4" href="<?= $pageAdmin ?>" id="navAddSeries"><b>Page Admin</b></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= $accountUser; ?>" id="navMyAccount"><b>Mon compte</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" id="showSignIn" href="<?= $logout ?>?logout=logout"><b>Déconnexion</b></a>
                </li>

            </ul>

        </div>
    </nav>
<?php } else { ?>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark justify-content-center mb-3">
        <a class="navbar-brand text-light" href="#"></a>
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-dark" id="navCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <img src="<?= $sourceImgNav ?>" class="mr-5" />
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-light mr-4" href="../../index.php" id="navBodyPage"><b>Accueil</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mr-4" href="<?= $allSeriesPage; ?>" id="navSerieTV"><b>Séries TV</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light mr-4" href="<?= $allArticlesPage; ?>" id="navArticles"><b>Articles</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light mr-4" id="navCategorie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Catégories</b></a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navCategorie">
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Action"><b>Action</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Aventure"><b>Aventure</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Comédie"><b>Comédie</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Drame"><b>Drame</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Enfants"><b>Enfants</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Fantastique&"><b>Fantastique</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Horreur"><b>Horreur</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Manga"><b>Manga</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Mini-séries"><b>Mini-séries</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Science fiction"><b>Science fiction</b></a>
                        <a class="dropdown-item" href="<?= $allSeriesPage ?>&AMP;categorie=Thriller"><b>Thriller</b></a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= $accountUser; ?>" id="navMyAccount"><b>Mon compte</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" id="showSignIn" href="<?= $logout ?>?logout=logout"><b>Déconnexion</b></a>
                </li>

            </ul>

        </div>
    </nav>
<?php } ?>