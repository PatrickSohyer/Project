<img src="<?= $sourceTest; ?>" class="img-fluid avatarBanner" />

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
                    <a class="dropdown-item" href="#"><b>Action</b></a>
                    <a class="dropdown-item" href="#"><b>Aventure</b></a>
                    <a class="dropdown-item" href="#"><b>Comédie</b></a>
                    <a class="dropdown-item" href="#"><b>Drame</b></a>
                    <a class="dropdown-item" href="#"><b>Enfants</b></a>
                    <a class="dropdown-item" href="#"><b>Fantastique</b></a>
                    <a class="dropdown-item" href="#"><b>Horreur</b></a>
                    <a class="dropdown-item" href="#"><b>Manga</b></a>
                    <a class="dropdown-item" href="#"><b>Mini-séries</b></a>
                    <a class="dropdown-item" href="#"><b>Science fiction</b></a>
                    <a class="dropdown-item" href="#"><b>Thriller</b></a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light mr-4" href="<?= $myAccountPage; ?>" id="navMyAccount"><b>Mon compte</b></a>
            </li>
        </ul>
        <form class="form-inline ml-auto">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Rechercher une série..." aria-label="Search">
            </div>
        </form>
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