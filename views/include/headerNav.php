<img src="<?= $sourceTest; ?>" class="img-fluid avatar" />

<nav class="navbar navbar-expand-lg sticky-top navbar-dark justify-content-center">
  <a class="navbar-brand text-light" href="#"></a>
  <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-dark" id="navCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-light mr-4" href="../../index.php" id="showBodyPage"><b>Accueil</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light mr-4" href="#" id="showSerieTV"><b>Séries TV</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light mr-4" href="#" id="showSeriesNetflix"><b>Séries Netflix</b></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light mr-4" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Catégorie</b></a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#"><b>Comédie</b></a>
          <a class="dropdown-item" href="#"><b>Dramatique</b></a>
          <a class="dropdown-item" href="#"><b>Action/aventure</b></a>
          <a class="dropdown-item" href="#"><b>Fantastique/science-fiction</b></a>
        </div>
      </li>
    </ul>
    <form class="form-inline ml-auto">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Rechercher une série..." aria-label="Search">
      </div>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" id="showSignIn" href="#"><b>Connexion</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" id="showSignUp" href="<?= $signUpPage; ?>"><b>S'inscrire</b></a>
      </li>
    </ul>
  </div>
</nav>
