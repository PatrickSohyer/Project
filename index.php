<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="main.css" />
        <link href="font/Acme-Regular.ttf" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

        <title>SériesPhil!</title>

    </head>



    <body>

        <!--Je définis les variables avec l'emplacement de mes pages, et j'intègre mon header-->
        <div id="slideImage1">
            <div class="slide_inside">

                <?php
                $sourceTest = 'images/imgAccueil/test.jpg';
                $myAccountPage = 'views/pages/myAccountPage.php';
                $articlePage = 'views/pages/articlePage.php';
                $allSeriesPage = 'views/pages/allSeriesPage.php';
                $allArticlesPage = 'views/pages/allArticlesPage.php';
                $mentionsLegalsPage = 'views/pages/mentionsLegals.php';
                $signUpPage = 'views/pages/signUp.php';
                require_once('views/include/headerNav.php');
                ?>


                <!--Message sur la page d'acceuil pour souhaiter la bienvenu-->   

                <div class="container-fluid mb-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 mx-auto text-center">
                            <div class="welcomeMessage">
                                <p class="h4 m-0" id="welcomeMessage">Bienvenu sur SériesPhil!</p>
                                <p class="h6 m-0"><i>Ici tu pourras retrouver et suivre tes séries préférées et tchater avec d'autres fans!</i></p>
                                <p class="h6"><i>Si jamais tu veux participer au forum et pouvoir t'abonner aux séries que tu suis, inscrit toi dès maintenant.</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--        J'intègre mon carousel avec les séries du moment-->

                <?php require_once('views/include/carouselSerieMoment.php'); ?>

                <!--J'intègre la série coup de coeur du mois-->

                <?php require_once ('views/include/favoriteMoment.php'); ?>

                <!--        J'intègre les 4 derniers articles qui ont été écris -->

                <?php require_once ('views/include/lastArticles.php'); ?>

                <!--J'intègre le footer-->

                <?php require_once('views/include/footer.php') ?>

            </div>
        </div>




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="index.js"></script>
    </body>

</html>
