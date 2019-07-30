<?php
session_start();
require_once '../../controller/controller_page_admin.php';
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
        <div class="overlay">
        </div>

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

        <div id="page-content-wrapper">

            <button type="button" class="hamburger animated fadeInLeft text-white is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>

            <div class="container accueilAdmin">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1>Console Administrateur SériesPhil <img src="../../assets/images/imgAccueil/imgNavbar.png"></h1>
                        <p>Bienvenue sur la console administrateur du site SériesPhil!</p>
                        <p>D'ici tu pourras <b>ajouter</b> une série, <b>supprimer</b> une série, <b>modifier</b> une série ou <b>valider</b> les séries envoyées sur le site. Tu as aussi accès aux données des utilisateurs mais <b>attention</b>, n'y touche pas sans leurs <b>accord</b>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/admin.js"></script>

</body>

</html>