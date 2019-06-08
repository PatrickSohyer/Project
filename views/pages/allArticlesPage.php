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
        $sourceTest = '../../images/imgAccueil/BannerPhil.jpg';
        $myAccountPage = 'myAccountPage.php';
        $allSeriesPage = 'allSeriesPage.php';
        $allArticlesPage = 'allArticlesPage.php';
        $mentionsLegalsPage = 'mentionsLegals.php';
        $signUpPage = 'signUp.php';
        include_once ('../include/headerNav.php');
        ?>

        <div class="container-fluid" id="allArticles">
            <div class="row  text-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card cardArticle mb-3">
                        <img class="card-img-top" src="../../images/imgSeries/13ReasonsWhy/articlesReasonsWhy.jpg">
                        <div class="card-body text-center">
                            <p class="card-title h4"><b>13 Reasons why</b></p>
                            <p class="card-text"><i>Malgré un nombre de critique assez importante, voilà pourquoi vous devez regarder la saions 2.</i></p>
                            <a href="articlePage.php" class="btn buttonLastArticle text-white"><b>Lire l'article</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card cardArticle mb-3">
                        <img class="card-img-top w-100" src="../../images/imgSeries/lucifer/articlesLucifer.jpg">
                        <div class="card-body text-center">
                            <p class="card-title h4"><b>Lucifer</b></p>
                            <p class="card-text"><i>Racheté par Netflix pour une saison 4 de 10 épisodes, que dire de la qualité de notre diable préféré?</i></p>
                            <a href="#" class="btn buttonLastArticle text-white"><b>Lire l'article</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card cardArticle mb-3">
                        <img class="card-img-top w-100" src="../../images/imgSeries/gameOfThrones/articlesGameOfThrones.jpg">
                        <div class="card-body text-center">
                            <p class="card-title h4"><b>Game Of Thrones</b></p>
                            <p class="card-text"><i>La saison 8 a subis un nombre de critique énorme, à tel point qu'une pétition demandais à la refaire, mérité?</i></p>
                            <a href="#" class="btn buttonLastArticle text-white"><b>Lire l'article</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card cardArticle mb-3">
                        <img class="card-img-top w-100" src="../../images/imgSeries/theWalkingDead/articlesTheWalkingDead.jpg">
                        <div class="card-body text-center">
                            <p class="card-title h4"><b>The Walking Dead</b></p>
                            <p class="card-text"><i>Une saison 9 marquée par l'arrivé des chuchotteurs ainsi que la perte de 2 acteurs principaux.</i></p>
                            <a href="#" class="btn buttonLastArticle text-white"><b>Lire l'article</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include_once('../include/footer.php') ?>

        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../../index.js"></script>

    </body>
</html>