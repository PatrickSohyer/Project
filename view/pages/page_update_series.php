<?php
session_start();
require_once '../../controller/controller_page_update_series.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <title>SériesPhil!</title>

</head>

<body>


    <div id="wrapper">
        <div class="overlay"></div>
        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a href="page_admin.php">Menu</a></div>
                </div>
                <li class="colorFontNavSide text-center"><a href="page_admin_verif.php"><i class="fas fa-check-circle colorFontNavSide m-2"></i>Vérifier une série <span class="badge badge-pill badge-warning ml-2"><?= $seriesCountVerif['total'] ?></span></a></li>
                <li class="colorFontNavSide text-center"><a href="page_form_add_series.php"><i class="fas fa-plus-circle colorFontNavSide m-2"></i>Ajouter une série</a></li>
                <li class="colorFontNavSide text-center"><a href="page_admin_update.php?page=1"><i class="fas fa-cogs colorFontNavSide m-2"></i>Modifier une série</a></li>
                <li class="colorFontNavSide text-center"><a href="page_admin_delete.php?page=1"><i class="fas fa-trash colorFontNavSide m-2"></i>Supprimer une série</a></li>
                <li class="colorFontNavSide text-center"><a href="page_admin_suggest_series.php"><i class="fas fa-lightbulb colorFontNavSide m-2"></i>Suggestion de série <span class="badge badge-pill badge-warning ml-2"><?= $suggestCount['total'] ?></span></a></li>
                <li class="colorFontNavSide text-center"><a href="page_admin_user_role.php?page=1"><i class="fas fa-check-circle colorFontNavSide m-2"></i>Utilisateurs</a></li>
                <li class="colorFontNavSide text-center"><a href="page_form_add_article.php"><i class="fas fa-plus-circle colorFontNavSide m-2"></i>Ajouter un article</a></li>
                <li class="colorFontNavSide text-center"><a href="page_admin_update_article.php?page=1"><i class="fas fa-cogs colorFontNavSide m-2"></i>Modifier un article</a></li>
                <li class="colorFontNavSide text-center"><a href="page_admin_delete_article.php?page=1"><i class="fas fa-trash colorFontNavSide m-2"></i>Supprimer un article</a></li>
                <li class="colorFontNavSide text-center"><a href="../../index.php"><i class="fas fa-home colorFontNavSide m-2"></i>Retour au site</a></li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container-fluid container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
                        <div class="card" id="cardupdateSeries">
                            <div class="card-body">

                                <?php foreach ($seriesAllSeries as $value) { ?>

                                    <form class="formUpdateSeries text-center p-5" method="POST" action="page_update_series.php?id=<?= $value['id'] ?>">

                                        <p class="h2 mb-5 formupdateSeriesText"><u><b>Modifier une série!</u></b></p>


                                        <label for="updateSeriesTitle"><b>Titre de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesTitle']) ? $errorMessageupdateSeries['updateSeriesTitle'] : ''; ?></span><input type="text" id="updateSeriesTitle" class="form-control mb-4" name="updateSeriesTitle" value="<?= $value['sp_series_pages_title'] ?>" required />

                                        <label for="updateSeriesDescription"><b>Description de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesDescription']) ? $errorMessageupdateSeries['updateSeriesDescription'] : ''; ?></span><textarea id="updateSeriesDescription" class="form-control mb-4" name="updateSeriesDescription" required /><?= $value['sp_series_pages_description'] ?></textarea>

                                        <label for="updateSeriesSeasonsNumber"><b>Nombre de saisons</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesSeasonsNumber']) ? $errorMessageupdateSeries['updateSeriesSeasonsNumber'] : ''; ?></span><input type="number" id="updateSeriesSeasonsNumber" min="1" class="form-control mb-4" name="updateSeriesSeasonsNumber" value="<?= $value['sp_series_pages_number_seasons'] ?>" required />

                                        <label for="updateSeriesEpisodesNumber"><b>Nombre d'épisodes</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesEpisodesNumber']) ? $errorMessageupdateSeries['updateSeriesEpisodesNumber'] : ''; ?></span><input type="number" id="updateSeriesEpisodesNumber" min="1" class="form-control mb-4" name="updateSeriesEpisodesNumber" value="<?= $value['sp_series_pages_number_episodes'] ?>" required />

                                        <label for="updateSeriesEpisodesDuration"><b>Durée d'un épisode</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesEpisodesDuration']) ? $errorMessageupdateSeries['updateSeriesEpisodesDuration'] : ''; ?></span><input type="number" id="updateSeriesEpisodesDuration" min="1" class="form-control mb-4" name="updateSeriesEpisodesDuration" value="<?= $value['sp_series_pages_duration_episodes'] ?>" required />

                                        <label for="updateSeriesDiffusion"><b>Chaîne de diffusion</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesDiffusion']) ? $errorMessageupdateSeries['updateSeriesDiffusion'] : ''; ?></span><input type="text" id="updateSeriesDiffusion" class="form-control mb-4" name="updateSeriesDiffusion" value="<?= $value['sp_series_pages_diffusion_channel'] ?>" required />

                                        <label for="updateSeriesTrailer"><b>Trailer</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesTrailer']) ? $errorMessageupdateSeries['updateSeriesTrailer'] : ''; ?></span><input type="text" id="updateSeriesTrailer" class="form-control mb-4" name="updateSeriesTrailer" value="<?= $value['sp_series_pages_trailer'] ?>" required />

                                        <label for="updateSeriesImage"><b>Image de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesImage']) ? $errorMessageupdateSeries['updateSeriesImage'] : ''; ?></span><input type="text" id="updateSeriesImage" class="form-control mb-4" name="updateSeriesImage" value="<?= $value['sp_series_pages_image'] ?>" required />

                                        <label for="updateSeriesFrenchTitle"><b>Titre français</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesFrenchTitle']) ? $errorMessageupdateSeries['updateSeriesFrenchTitle'] : ''; ?></span><input type="text" id="updateSeriesFrenchTitle" class="form-control mb-4" name="updateSeriesFrenchTitle" value="<?= $value['sp_series_pages_french_title'] ?>" required />

                                        <label for="updateSeriesOriginalTitle"><b>Titre original</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesOriginalTitle']) ? $errorMessageupdateSeries['updateSeriesOriginalTitle'] : ''; ?></span><input type="text" id="updateSeriesOriginalTitle" class="form-control mb-4" name="updateSeriesOriginalTitle" value="<?= $value['sp_series_pages_original_title'] ?>" required />

                                        <label for="updateSeriesOrigin"><b>Origine de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageupdateSeries['updateSeriesOrigin']) ? $errorMessageupdateSeries['updateSeriesOrigin'] : ''; ?></span><input type="text" id="updateSeriesOrigin" class="form-control mb-4" name="updateSeriesOrigin" value="<?= $value['sp_series_pages_origin'] ?>" required />

                                    <?php } ?>

                                    <button class="spStyleButton btn btn-block text-white my-4" type="submit" id="update_series_button">Valider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/admin.js"></script>

</body>

</html>