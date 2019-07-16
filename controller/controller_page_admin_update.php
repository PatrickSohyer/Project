<?php

// Require des model dont j'ai besoin 

require '../../model/SP_database.php';
require '../../model/SP_series_pages.php';

// Définition des chemins d'accès aux différentes pages

$sourceBanner = '../../assets/images/imgAccueil/BannerPhil.jpg';
$sourceImgNav = '../../assets/images/imgAccueil/imgNavbar.png';
$accountUser = '../pages/page_account_user.php';
$articlePage = '../pages/page_article_info.php';
$allSeriesPage = '../pages/page_all_series.php?page=1';
$allArticlesPage = '../pages/page_all_articles.php';
$mentionsLegalsPage = '../pages/page_mentions_legals.php';
$infoSeries = '../pages/page_info_series.php';
$signUpPage = '../pages/page_form_sign_up.php';
$signInPage = '../pages/page_form_sign_in.php';
$formAddSeries = '../pages/page_form_add_series.php';
$logout = '../../index.php';
$categoriesSeries = '../pages/page_all_series.php';

// Création de mon chemin d'accès à la console admin si je suis connecté en tant qu'administrateur

if (isset($_SESSION['role']) == 'admin') {
    $pageAdmin = '../pages/page_admin.php';
}

// Création de mon objet Series

$series = new Series();

// Création de mes variables pour la pagination

$seriesPagination = $series->seriesPaginationAdmin();
$nbSeriesPerPages = 12;
$nbSeriesPage = $seriesPagination[0]['total'];
$nbPages = ceil($nbSeriesPage / $nbSeriesPerPages);

// je créer mes conditions pour les pages et les catégories

if (isset($_GET['page']) and is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
    $series->firstPageSeries = ($currentPage - 1) * $nbSeriesPerPages;
    $seriesAllSeries = $series->seriesPagesAllSeries();
    if ($currentPage >= $nbPages) {
        $currentPage = $nbPages;
    }
}