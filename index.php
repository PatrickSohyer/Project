<?php
session_start();
require 'controller/controller_index.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico" />

    <title>SériesPhil!</title>

</head>

<body>

    <div id="slideImage1">
        <div class="slide_inside">

            <?php
            require_once 'view/include/include_header.php';
            ?>


            <!-- Message sur la page d'acceuil pour souhaiter la bienvenu -->

            <?php
            if (count($_SESSION) === 0) {
                ?>

            <div class="container-fluid mb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 mx-auto text-center">
                        <div class="welcomeMessage">
                            <p class="h4 m-0" id="welcomeMessage">Bienvenu sur SériesPhil!</p>
                            <p class="h6 m-0"><i>Ici tu pourras retrouver et suivre tes séries préférées et tchater avec
                                    d'autres fans!</i></p>
                            <p class="h6"><i>Si jamais tu veux participer au forum et pouvoir ajouter en favoris les séries que
                                    tu suis, inscrit toi dès maintenant en cliquant juste<a class="text-primary" href="view/pages/page_form_sign_up.php"> ici </a>.</i></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            } else if ($_SESSION['role'] === 'admin') {
                ?>

            <div class="container-fluid mb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 mx-auto text-center">
                        <div class="welcomeMessage">
                            <p class="h4 m-0" id="welcomeMessage">Tu es connecté en tant qu'<b>ADMINISTRATEUR</b></p>
                            <p class="h6 m-0"><i>ATTENTION, un grand pouvoir implique de grandes responsabilités!! Ne
                                    fais pas n'importe quoi.</i></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            } else {
                ?>

            <div class="container-fluid mb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 mx-auto text-center">
                        <div class="welcomeMessage">
                            <p class="h4 m-0" id="welcomeMessage">Content de te revoir sur SériesPhil
                                <b><?= isset($_SESSION['id']) ? $usersResult['sp_users_login'] : ' ' ?></b>!</p>
                            <p class="h6 m-0"><i>Tu ne trouve pas ta série préféré? Pas de soucis, suggère la nous <a class="text-primary" href="view/pages/page_suggest_series.php">ici</a>, un
                                    administrateur l'ajoutera pour toi!</i></p>
                            <p class="h6"><i>Et si jamais tu as des suggestions pour améliorer le site, n'hésite pas à
                                    nous contacter, et pense à nous suivre sur les réseaux sociaux!</i></p>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            }
            ?>

            <!-- J'intègre mon carousel avec les séries du moment -->

            <?php require_once 'view/include/include_carousel_series_moment.php'; ?>

            <!-- J'intègre la série coup de coeur du mois -->

            <?php require_once 'view/include/include_favorite_moment.php'; ?>

            <!-- J'intègre les 4 derniers articles qui ont été écris -->

            <?php require_once 'view/include/include_last_articles.php'; ?>

            <!-- J'intègre le footer -->

            <?php require_once 'view/include/include_footer.php'; ?>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>