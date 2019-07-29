<?php
session_start();
require '../../controller/controller_page_admin_verif.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon.ico">

    <title>SériesPhil!</title>

</head>



<body>

    <div id="wrapper">
        <div class="overlay"></div>
        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand colorFontNavSide">
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
                <li class="colorFontNavSide text-center"><a href="../../index.php"><i class="fas fa-home colorFontNavSide m-2"></i>Retour au site</a></li>
            </ul>
        </nav>
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>

            <div class="container">
                <div class="row mx-auto">
                    <div class="col-xl-10 col-lg-10 col-md-8 col-12 mx-auto">
                        <?php foreach ($seriesVerif as $value) { ?>
                            <div class="card mb-4">
                                <p class="card-title h3 text-center mt-2"><?= $value['sp_series_pages_title'] ?></p>
                                <hr>
                                <div class="text-center">
                                    <img style="width:10rem;" src="../../assets/images/imgSeries/<?= $value['sp_series_pages_image'] ?>" class="card-img-top imageVerifySeries text-center" alt="...">
                                </div>
                                <hr>
                                <div class="card-body text-center">
                                    <p class="card-text"><?= $value['sp_series_pages_description'] ?></p>
                                    <hr>
                                    <p><?= $value['sp_series_pages_number_seasons'] ?></p>
                                    <hr>
                                    <p><?= $value['sp_series_pages_number_episodes'] ?></p>
                                    <hr>
                                    <p><?= $value['sp_series_pages_duration_episodes'] ?></p>
                                    <hr>
                                    <p><?= $value['sp_series_pages_diffusion_channel'] ?></p>
                                    <hr>
                                    <p><?= $value['sp_series_pages_french_title'] ?></p>
                                    <hr>
                                    <p><?= $value['sp_series_pages_original_title'] ?></p>
                                    <hr>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <p><iframe width="560" height="315" src="<?= $value['sp_series_pages_trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
                                    </div>
                                    <p><a href="page_admin_verif.php?validation=<?= $value['id'] ?>"><i class="fas fa-check-circle text-success fa-2x mt-4"></i></a></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/admin.js"></script>
</body>

</html>