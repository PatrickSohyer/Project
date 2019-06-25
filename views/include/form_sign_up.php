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
require_once ('../include/country.php');
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
                    <div class="card" id="cardSignUp">
                        <div class="card-body">

                            <form class="formSignUp text-center p-5" name="formSignUp" method="POST" action='sign_up.php' novalidate>

                                <p class="h2 mb-4 signUpText">S'inscrire</p>

                                <label for="pseudoSignUp" class="labelTextFormSignUp">Pseudonyme</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['pseudoSignUp']) ? $errorMessage['pseudoSignUp'] : ''; ?></span><input type="text" value="<?= isset($_POST['pseudoSignUp']) ? $_POST['pseudoSignUp'] : ''; ?>" id="pseudoSignUp" class="form-control mb-4" name="pseudoSignUp" required />

                                <label for="emailSignUp" class="labelTextFormSignUp">Email</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['emailSignUp']) ? $errorMessage['emailSignUp'] : ''; ?></span><input type="email" id="emailSignUp" value="<?= isset($_POST['emailSignUp']) ? $_POST['emailSignUp'] : ''; ?>" class="form-control mb-4" name="emailSignUp" required />

                                <select id="country" class="form-control mb-4" name="countrySignUp" required>                                              
                                    <?php
                                    foreach ($countryCode as $valueCountry) {
                                        ?>

                                        <option <?php
                                        if (empty($_POST['countrySignUp'])) {
                                            echo '';
                                        } elseif ($_POST['countrySignUp'] == $valueCountry) {
                                            echo 'selected';
                                        };
                                        ?>  value="<?= $valueCountry; ?>"><?= $valueCountry; ?></option>

                                        <?php
                                    }
                                    ?></select>

                                <label for="passwordSignUp" class="labelTextFormSignUp">Password</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordSignUp']) ? $errorMessage['passwordSignUp'] : ''; ?></span><input type="password" id="passwordSignUp" placeholder="Mot de passe" class="form-control" name="passwordSignUp" required />
                                <small id="passwordInstruction" class="form-text text-muted mb-2">
                                    Au moins 8 caractères comportant une majuscule, une minuscule et un chiffre 
                                </small>

                                <label for="passwordConfirmationSignUp" class="labelTextFormSignUp">Confirmation Password</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordConfirmationSignUp']) ? $errorMessage['passwordConfirmationSignUp'] : ''; ?></span><input type="password" id="passwordConfirmationSignUp" placeholder="Confirmation mot de passe" class="form-control mb-4" name="passwordConfirmationSignUp" required />

                                <button class="spStyleButton btn my-4 btn-block text-white" type="submit" id="sign_up_button">S'inscrire</button>

                                <hr>

                                <p class="signUpText">En cliquant sur
                                    s'inscrire vous acceptez nos
                                    <a href="<?= $mentionsLegalsPage; ?>" target="_blank">mentions légales</a></p>

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