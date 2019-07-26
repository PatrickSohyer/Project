<?php
session_start();
require '../../controller/controller_article_info.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon.ico">

    <title>SériesPhil!</title>

</head>



<body>

    <?php
    require_once('../include/include_header.php');
    ?>

    <div class="container backgroundTheme">
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-12 col-12 mx-auto">
                <div class="text-center mt-2">
                    <p class="h4"><b><u><?= $selectArticle['sp_article_title'] ?> : <?= $selectArticle['sp_article_description'] ?></u></b></p>
                    <img id="imgArticleInfo" class="img-fluid mt-3" src="../../assets/images/imgArticles/<?= $selectArticle['sp_article_image'] ?>">
                </div>
                <p class="mt-3"><?= nl2br($selectArticle['sp_article_resume']); ?></p>
            </div>
        </div>
    </div>



    <?php
    require_once('../include/include_footer.php')
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>

</body>

</html>