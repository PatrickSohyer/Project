<?php
require '../../controller/controller_all_series.php';
?> 
<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/favicon.ico">

        <title>SériesPhil!</title>

    </head>



    <body>

        <?php
        require_once ('../include/include_header.php');
        ?>

        <div class="container-fluid" id="allSeries">
            <div class="row  text-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <a href="<?= $infoSeries; ?>"><img class="imgAllSeriesPage" src="../../assets/images/imgSeries/13ReasonsWhy.jpg"></a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/americanHorrorStory.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/batesMotel.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/betterCallSaul.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/blackMirror.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/arrow.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/banshee.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/blacklist.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/breakingBad.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/charmed.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/criminalMinds.jpg">
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3 mb-3 flashImgAllSeries">
                    <img class="imgAllSeriesPage" src="../../assets/images/imgSeries/daredevil.jpg">
                </div>
            </div>
        </div>

        <?php require_once('../include/include_footer.php') ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/main.js"></script>
    </body>

</html>


