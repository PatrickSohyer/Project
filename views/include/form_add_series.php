<?php
$sourceTest = '../../images/imgAccueil/BannerPhil.jpg';
$myAccountPage = 'my_account_page.php';
$articlePage = 'article_page.php';
$allSeriesPage = 'all_series_page.php';
$allArticlesPage = 'all_articles_page.php';
$mentionsLegalsPage = 'mentions_legals.php';
$seriesCard = 'series_card.php';
$signUpPage = 'sign_up.php';
$signInPage = 'sign_in.php';
$formAddSeries = 'add_series_form.php';
?> 
<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../main.css">
        <link href="../../font/Acme-Regular.ttf" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">

        <title>SériesPhil!</title>

    </head>



    <body>

        <?php require_once ('../include/header_navbar.php'); ?>

        <div class="container-fluid container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
                    <div class="card" id="cardAddSeries">
                        <div class="card-body">
                            <form class="formAddSeries text-center p-5" method="POST" action="add_series_form.php">

                                <p class="h2 mb-5 formAddSeriesText"><u><b>Ajouter une série!</u></b></p>

                                <label for="addSeriesTitle">Titre de la série</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesTitle']) ? $errorMessageAddSeries['addSeriesTitle'] : ''; ?></span><input type="text" id="addSeriesTitle" class="form-control mb-4" name="addSeriesTitle" value="<?= isset($_POST['addSeriesTitle']) ? $_POST['addSeriesTitle'] : ''; ?>" />
                                <label for="addSeriesDescription">Description de la série</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesDescription']) ? $errorMessageAddSeries['addSeriesDescription'] : ''; ?></span><textarea id="addSeriesDescription" class="form-control mb-4" name="addSeriesDescription" value="<?= isset($_POST['addSeriesDescription']) ? $_POST['addSeriesDescription'] : ''; ?>" /></textarea>
                                <label for="addSeriesSeasonsNumber">Nombre de saisons</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesSeasonsNumber']) ? $errorMessageAddSeries['addSeriesSeasonsNumber'] : ''; ?></span><input type="number" id="addSeriesSeasonsNumber" min="1" class="form-control mb-4" name="addSeriesSeasonsNumber" value="<?= isset($_POST['addSeriesSeasonsNumber']) ? $_POST['addSeriesSeasonsNumber'] : ''; ?>"/>
                                <label for="addSeriesEpisodesNumber">Nombre d'épisodes</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesEpisodesNumber']) ? $errorMessageAddSeries['addSeriesEpisodesNumber'] : ''; ?></span><input type="number" id="addSeriesEpisodesNumber" min="1" class="form-control mb-4" name="addSeriesEpisodesNumber" value="<?= isset($_POST['addSeriesEpisodesNumber']) ? $_POST['addSeriesEpisodesNumber'] : ''; ?>"/>
                                <label for="addSeriesEpisodesDuration">Durée d'un épisode</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesEpisodesDuration']) ? $errorMessageAddSeries['addSeriesEpisodesDuration'] : ''; ?></span><input type="number" id="addSeriesEpisodesDuration" min="1" class="form-control mb-4" name="addSeriesEpisodesDuration" value="<?= isset($_POST['addSeriesEpisodesDuration']) ? $_POST['addSeriesEpisodesDuration'] : ''; ?>"/>
                                <label for="addSeriesDiffusion">Chaîne de diffusion</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesDiffusion']) ? $errorMessageAddSeries['addSeriesDiffusion'] : ''; ?></span><input type="text" id="addSeriesDiffusion" class="form-control mb-4" name="addSeriesDiffusion" value="<?= isset($_POST['addSeriesDiffusion']) ? $_POST['addSeriesDiffusion'] : ''; ?>"/>
                                <button class="spStyleButton btn btn-block text-white my-4" type="submit" id="add_series_button">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('../include/footer.php') ?>

        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../../index.js"></script>

    </body>
</html>