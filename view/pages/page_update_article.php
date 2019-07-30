<?php
session_start();
require_once '../../controller/controller_page_update_article.php';
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
        <div class="overlay">
        </div>

        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a href="page_admin.php">Menu</a>
                    </div>
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

                                <?php foreach ($selectArticle as $value) { ?>

                                    <form class="formUpdateArticle text-center p-5" method="POST" action="page_update_article.php?id=<?= $value['id'] ?>">

                                        <p class="h2 mb-5 formupdateArticleText"><u><b>Modifier un article!</u></b></p>


                                        <label for="updateArticleTitle"><b>Titre de l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['updateArticleTitle']) ? $errorMessage['updateArticleTitle'] : ''; ?></span><input type="text" id="updateArticleTitle" class="form-control mb-4" name="updateArticleTitle" value="<?= $value['sp_article_title'] ?>" required />

                                        <label for="updateArticleDescription"><b>Description de l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['updateArticleDescription']) ? $errorMessage['updateArticleDescription'] : ''; ?></span><textarea id="updateArticleDescription" class="form-control mb-4" name="updateArticleDescription" required><?= $value['sp_article_description'] ?></textarea>

                                        <label for="updateArticleImage"><b>Nom de l'image</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['updateArticleImage']) ? $errorMessage['updateArticleImage'] : ''; ?></span><input type="text" id="updateArticleImage" class="form-control mb-4" name="updateArticleImage" value="<?= $value['sp_article_image'] ?>" required />

                                        <label for="updateArticleResume"><b>Contenu de l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['updateArticleResume']) ? $errorMessage['updateArticleResume'] : ''; ?></span><textarea id="updateArticleResume" class="form-control mb-4" name="updateArticleResume" required><?= $value['sp_article_resume'] ?></textarea>

                                        <label for="updateIdSeriesPages"><b>Série liée à l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['updateIdSeriesPages']) ? $errorMessage['updateIdSeriesPages'] : ''; ?></span><select class="form-control" name="updateIdSeriesPages">
                                            <?php foreach ($selectSeries as $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['sp_series_pages_title'] ?></option>
                                            <?php } ?>
                                        </select>

                                    <?php } ?>

                                    <button class="spStyleButton btn btn-block text-white my-4" type="submit">Valider</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/admin.js"></script>

</body>

</html>