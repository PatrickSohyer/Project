<?php
session_start();
require '../../controller/controller_page_admin_user_role.php';
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

            <div class="container backgroundTheme">
                <div class="row mx-auto">
                    <?php foreach ($selectUsers as $value) { ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 mx-auto">
                            <ul class="list-group text-center">
                                <li class="list-group-item"><?= $value['sp_users_login'] ?></li>
                                <li class="list-group-item"><?= $value['sp_users_email'] ?></li>
                                <li class="list-group-item"><?= $value['sp_users_country'] ?></li>
                                <li class="list-group-item"><?= $value['sp_users_role'] ?></li>
                                <li class="list-group-item text-center"><a data-toggle="modal" data-target="#deleteAccountUserModal<?= $value['id'] ?>"><i class="fas fa-trash-alt fa-2x"></i></a></li>
                                <div class="modal fade" id="deleteAccountUserModal<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog colorFontBlue" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <p class="modal-title h3 text-center" id="exampleModalLabel">Supprimer le compte</p>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <img src="../../assets/images/imgAccueil/philDelete.png">
                                            <div class="modal-body">
                                                Êtes vous sur de vouloir supprimer le compte de <b><?= $value['sp_users_login'] ?></b> ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="page_admin_user_role.php?page=1" method="POST">
                                                    <button type="submit" name="deleteUserAccount" value=<?= $value['id'] ?> class="btnDeleteAccount btn btn-danger">Supprimer</button>
                                                    <button type="button" class="btn btn-success"><a href="page_admin_user_role.php?page=1">Ne pas supprimer</a></button>
                                                    <form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="container">
                <div class="row mx-auto">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 mx-auto">
                        <nav class="mx-auto m-4" aria-label="...">
                            <ul class="pagination">
                                <?php if ($currentPage == 1) {
                                    echo ' ';
                                } else { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="page_admin_update.php?page=<?= (($currentPage - 1) < 1 ? 1 : $currentPage - 1) ?>">Précédent</a>
                                    </li>
                                <?php } ?>
                                <?php for ($i = 1; $i <= $nbPages; $i++) { ?>
                                    <li class="page-item"><a class="page-link" href="page_admin_update.php?page=<?= $i ?>"><?= $i ?></a></li>
                                <?php }
                                if ($currentPage == $nbPages) {
                                    echo ' ';
                                } else { ?>

                                    <li class="page-item">
                                        <a class="page-link" href="page_admin_update.php?page=<?= (($currentPage + 1) > $nbPages ? $nbPages : $currentPage + 1) ?>">Suivant</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->







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