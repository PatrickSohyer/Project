        <div class="container-fluid mt-3" id="lastArticles">
            <p class="h2 text-center m-3"><b><i>Les derniers Articles</i></b></p>
            <div class="row mb-3">
                <?php foreach($selectArticle as $value) { ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <div class="card cardArticle mb-3">
                        <img class="card-img-top" src="assets/images/imgArticles/<?= $value['sp_article_image'] ?>">
                        <div class="card-body text-center">
                            <p class="card-title h4"><b><?= $value['sp_article_title'] ?></b></p>
                            <p class="card-text"><i><?= $value['sp_article_description'] ?></i></p>
                            <a href="view/pages/page_article_info.php?id=<?= $value['id'] ?>" class="spStyleButton btn text-white"><b>Lire l'article</b></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>