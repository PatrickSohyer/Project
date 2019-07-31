<?php

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma classe Series
require_once '../../model/SP_suggest_series.php'; // require de ma classe Suggest
require_once '../../model/SP_article.php'; // require de ma classe Article
require_once '../include/include_page_admin.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Instanciation de mon objet Series

$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();
$article = new Article();

// Création de mes variables pour la pagination

$articlePagination = $article->countArticlePagination();
$nbArticlePerPages = 16;
$nbArticlePage = $articlePagination[0]['total'];
$nbPages = ceil($nbArticlePage / $nbArticlePerPages);

// je créer mes conditions pour les pages et les catégories

if (isset($_GET['page']) and is_numeric($_GET['page'])) { // sinon je fais la pagination normal
    $currentPage = $_GET['page']; // la page actuel est égal à get page 
    $article->firstPageArticle = ($currentPage - 1) * $nbArticlePerPages;
    $selectArticle = $article->selectArticle();
    if ($currentPage >= $nbPages) {
        $currentPage = $nbPages;
    }
} else {
    header('Location: page_error.php');
}
