<?php
session_start();
require '../../controller/controller_all_article.php';
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

    <div class="container backgroundTheme" id="allArticles">
        <div class="row text-center">
            <?php foreach ($selectArticle as $value) {  ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card cardArticle mb-3">
                        <img class="card-img-top" src="../../assets/images/imgArticles/<?= $value['sp_article_image'] ?>">
                        <div class="card-body text-center">
                            <p class="card-title h4"><b><?= $value['sp_article_title'] ?></b></p>
                            <p class="card-text"><i><?= $value['sp_article_description'] ?></i></p>
                            <a href="page_article_info.php?id=<?= $value['id'] ?>" class="spStyleButton btn text-white"><b>Lire l'article</b></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="container">
        <div class="row text-center">
            <nav class="mx-auto m-4" aria-label="...">
                <ul class="pagination">
                    <?php if ($currentPage == 1) {
                        echo ' ';
                    } else { ?>
                        <li class="page-item">
                            <a class="page-link" href="page_all_articles.php?page=<?= (($currentPage - 1) < 1 ? 1 : $currentPage - 1) ?>">Précédent</a>
                        </li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $nbPages; $i++) { ?>
                        <li class="page-item"><a class="page-link" href="page_all_articles.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php }
                    if ($currentPage == $nbPages) {
                        echo ' ';
                    } else { ?>

                        <li class="page-item">
                            <a class="page-link" href="page_all_articles.php?page=<?= (($currentPage + 1) > $nbPages ? $nbPages : $currentPage + 1) ?>">Suivant</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>


    <?php require_once('../include/include_footer.php') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>

</body>

</html>