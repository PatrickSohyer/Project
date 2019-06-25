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
?> 

<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../main.css">
        <link href="../../font/Acme-Regular.ttf" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">

        <title>SériesPhil!</title>

    </head>



    <body>

        <?php
        require_once ('../include/header_navbar.php');
        ?>

        <div class="container container-fluid">
            <div class="row mt-3 mb-3">
                <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
                    <div class="card" id="cardSignIn">
                        <div class="card-body">

                            <form class="formSignIn text-center p-5" name="formSignIn" method="POST" action='sign_in.php' novalidate>

                                <p class="h2 mb-4 signInText">Se Connecter</p>

                                <label for="loginSignIn" class="labelTextFormSignIn">Login</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['loginSignIn']) ? $errorMessageSignIn['loginSignIn'] : ''; ?></span><input type="text" value="<?= isset($_POST['loginSignIn']) ? $_POST['loginSignIn'] : ''; ?>" id="loginSignIn" class="form-control mb-4" name="loginSignIn" required />

                                <label for="passwordSignIn" class="labelTextFormSignIn">Mot de passe</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['passwordSignIn']) ? $errorMessageSignIn['passwordSignIn'] : ''; ?></span><input type="password" id="passwordSignIn" placeholder="Mot de passe" class="form-control" name="passwordSignIn" required />

                                <button class="spStyleButton btn my-4 btn-block text-white" type="submit" id="signInButton">Se Connecter</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <?php require_once('../include/footer.php') ?>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../../index.js"></script>
    </body>

</html>
