<?php
session_start();
require '../../controller/controller_info_series.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/favicon.ico">

    <title>SériesPhil!</title>

</head>



<body>

    <?php
    require_once('../include/include_header.php');
    ?>


    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-4 text-center mt-3">
                <img id="seriesImagesInformation" src="../../assets/images/imgSeries/<?= $seriesInfo['sp_series_pages_image'] ?>" />
                <?php
                if (isset($_GET['rate'])) {
                    $pourcentageSeriesVote = round($newRate / $newVote, 1);
                    ?>
                    <p class="h2 text-white"><?= $pourcentageSeriesVote ?> / 5<p>
                            <a href="#"><img src="../../assets/images/imgAccueil/favoriteButton.png" /></a>
                        <?php } elseif (isset($_SESSION['id'])) {
                            ?>
                            <div class="rating rating2">
                                <a href="page_info_series.php?id=<?= $seriesInfo['id'] ?>&AMP;rate=5" title="Donner 5 étoiles">★</a>
                                <a href="page_info_series.php?id=<?= $seriesInfo['id'] ?>&AMP;rate=4" title="Donner 4 étoiles">★</a>
                                <a href="page_info_series.php?id=<?= $seriesInfo['id'] ?>&AMP;rate=3" title="Donner 3 étoiles">★</a>
                                <a href="page_info_series.php?id=<?= $seriesInfo['id'] ?>&AMP;rate=2" title="Donner 2 étoiles">★</a>
                                <a href="page_info_series.php?id=<?= $seriesInfo['id'] ?>&AMP;rate=1" title="Donner 1 étoiles">★</a>
                            </div>

                            <a href="#"><img src="../../assets/images/imgAccueil/favoriteButton.png" /></a>

                        <?php
                        } else {
                            echo ' ';
                        }
                        ?>
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <p class="textSeriePage h1 text-center p-1 backgroundTheme"><?= $seriesInfo['sp_series_pages_title'] ?></p>
                <p class="textSeriePage text-center p-1 mb-2 backgroundTheme">Description :<br /><?= $seriesInfo['sp_series_pages_description'] ?></p>
                <ol class="textSeriePage text-center p-1 mb-2 backgroundTheme">
                    <li>Nombre de Saisons : <?= $seriesInfo['sp_series_pages_number_seasons'] ?></li>
                    <li>Nombre d'épisodes : <?= $seriesInfo['sp_series_pages_number_episodes'] ?></li>
                    <li>Durée d'un épisode : <?= $seriesInfo['sp_series_pages_duration_episodes'] ?></li>
                    <li>Diffusion : <?= $seriesInfo['sp_series_pages_diffusion_channel'] ?></li>
                    <li></li>
                </ol>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="<?= $seriesInfo['sp_series_pages_trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </div>


    <nav class="slidemenu">
        <!--                     Item 1 -->
        <input type="radio" name="slideItem" id="slideItemPresentation" class="slide-toggle" checked />
        <label for="slideItemPresentation">
            <p class="icon"><i class="fas fa-home"></i></p><span>Présentation</span>
        </label>

        <!--                     Item 2 -->
        <input type="radio" name="slideItem" id="slideItemSeasons" class="slide-toggle" />
        <label for="slideItemSeasons">
            <p class="icon"><i class="fas fa-list-alt"></i></p><span>Épisodes</span>
        </label>

        <!--                     Item 3 -->
        <input type="radio" name="slideItem" id="slideItemComment" class="slide-toggle" />
        <label for="slideItemComment">
            <p class="icon"><i class="fas fa-comments"></i></p><span>Avis</span>
        </label>

        <!--                     Item 4 -->
        <input type="radio" name="slideItem" id="slideItemArticle" class="slide-toggle" />
        <label for="slideItemArticle">
            <p class="icon"><i class="fas fa-pen-nib"></i></p><span>Articles</span>
        </label>

        <div class="clear"></div>

        <!--                     Bar -->
        <div class="slider">
            <div class="bar"></div>
        </div>
    </nav>

    <div class="container container-fluid" id="contentPresentationSerie">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-12 informationSeriesCard">
                <p class="h2 mt-2"><b>Informations sur la série</b></p>
                <p class="mt-3"><b>Titre Original</b> : <i><?= $seriesInfo['sp_series_pages_original_title'] ?></i><br /><br />

                    <b>Titre français</b> : <i><?= $seriesInfo['sp_series_pages_french_title'] ?></i><br /><br />

                    <b>Chaîne(s) de diffusion</b> : <i><?= $seriesInfo['sp_series_pages_diffusion_channel'] ?></i><br /><br />

                    <b>Nationalité</b> : <i><?= $seriesInfo['sp_series_pages_origin'] ?></i><br /><br />

                    <b>Genres</b> : <i>Drame, Mystere</i><br /><br />

                    <b>Résumé</b> : <i><?= $seriesInfo['sp_series_pages_description'] ?></i>
                </p>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-12 h-100 mt-2">
                <div class="informationSeriesCard">
                    <p class="h2 mt-2 text-center"><b>Création / Production</b></p>
                    <p class="h5 text-center"><i><?php foreach ($seriesCreator as $value) { ?><i><?= $value['sp_creator_productor'] ?><br /></i><?php } ?></i></p>
                </div>
                <div class="informationSeriesCard mt-2">
                    <p class="h2 mt-2 text-center"><b>Acteurs Principaux</b></p>
                    <p class="h5 text-center"><?php foreach ($seriesActor as $value) { ?><i><?= $value['sp_actor_firstname'] . ' ' . $value['sp_actor_lastname'] ?><br /></i><?php } ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-fluid" id="contentSeasons">
        <div class="row">
            <div class="col-lg-8 col-xl-8 col-md-8 col-8 mx-auto">
                <div class="seasonsSeriesCard">
                    <p id="season1Episode"><?php foreach ($seriesEpisodes as $value) { ?><i><?= $value['sp_episodes_infos_number'] . ' : ' . $value['sp_episodes_infos_name'] ?><br /></i><?php } ?><br /></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-fluid" id="contentComment">
        <div class="row">
            <div class="col-lg-8 col-xl-8 col-md-8 col-12 mx-auto">
                <div class="backgroundTheme">
                    <div class="text-center">
                        <button type="submit" class="btn mx-auto" id="refreshComment"><i class="fas fa-sync mr-2"></i>Rafraîchir les commentaires</button>
                    </div>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        foreach ($selectComments as $value) { ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <span class="ml-2 mt-2 commentMessage d-block"><a data-toggle="modal" data-target="#deleteCommentModal<?= $value['idComment'] ?>" class="text-dark"><i class="fas fa-trash mr-2"></i></a> Posté <?= strftime('Le %d %B %Y à %H:%M', strtotime($value['sp_date_message'])); ?> par <?= $value['sp_users_login'] ?> : <?= $value['sp_message'] ?></span></li>
                            </ul>
                            <div class="modal fade" id="deleteCommentModal<?= $value['idComment'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog colorFontBlue" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title h3" id="exampleModalLabel">Supprimer le commentaire</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes vous sur de vouloir supprimer le commentaire de <b><?= $value['sp_users_login'] ?></b> ?
                                        </div>
                                        <img src="../../assets/images/imgAccueil/philDelete.png">
                                        <div class="modal-footer">
                                            <button type="button" class="btnDeleteComment btn btn-danger"><a href="page_info_series.php?deleteComment=<?= $value['idComment'] ?>&AMP;id=<?= $value['idSeries'] ?>">Supprimer</a></button>
                                            <button type="button" data-dismiss="modal" class="btn btn-success">Ne pas supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <form method="POST" id="formMessage" action="page_info_series.php?id=<?= $seriesInfo['id'] ?>" class="text-center mt-4">
                            <label for="commentMessage" class="d-block">Poster un Commentaire</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['commentMessage']) ? $errorMessage['commentMessage'] : ''; ?></span><textarea name="commentMessage" id="commentMessage" rows="5" cols="25" class="form-control mb-2" maxlength="500" required></textarea>
                            <button type="submit" id="validateComment" class="btn btnblock spStyleButton text-white mb-2">Envoyer le commentaire</button>
                        </form>
                    <?php } elseif (count($_SESSION) > 0) {
                        foreach ($selectComments as $value) { ?>
                            <span class="ml-2 mt-2 commentMessage d-block">Posté <?= strftime('Le %d %B %Y à %H:%M', strtotime($value['sp_date_message'])); ?> par <?= $value['sp_users_login'] ?> : <?= $value['sp_message'] ?></span>
                        <?php } ?>
                        <form method="POST" id="formMessage" action="page_info_series.php?id=<?= $seriesInfo['id'] ?>" class="text-center mt-4">
                            <label for="commentMessage" class="d-block">Poster un Commentaire</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['commentMessage']) ? $errorMessage['commentMessage'] : ''; ?></span><textarea name="commentMessage" id="commentMessage" rows="5" cols="25" class="form-control mb-2" maxlength="500" required></textarea>
                            <button type="submit" id="validateComment" class="btn btnblock spStyleButton text-white mb-2">Envoyer le commentaire</button>
                        </form>
                    <?php } else {
                        foreach ($selectComments as $value) { ?>
                            <span class="ml-2 mt-2 commentMessage d-block">Posté par <?= $value['sp_users_login'] ?> : <?= $value['sp_message'] ?></span>
                            <small class="dateMessage ml-2 mb-2">(<?= strftime('Le %d %B %Y à %H:%M', strtotime($value['sp_date_message'])); ?>)</small>
                        <?php } ?>
                        <a href="page_form_sign_up.php">
                            <p class="h5 text-center text-primary mt-5"><b><u>Inscrit toi dès maintenant pour pouvoir poster un commentaire</u></b></p>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-fluid" id="contentArticle">
        <div class="row">
            <div class="col-">
                <p class="text-light">C'est un Test numéro 3!</p>
            </div>
        </div>
    </div>

    <?php require_once('../include/include_footer.php') ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>