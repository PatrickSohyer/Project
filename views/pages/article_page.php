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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">

        <title>SériesPhil!</title>

    </head>



    <body>

        <?php
        require_once ('../include/header_nav.php');
        ?>




<?php require_once('../include/footer.php') ?>

        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../../index.js"></script>

    </body>
</html>