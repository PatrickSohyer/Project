<?php

require '../../model/SP_database.php';
require '../../model/SP_series_pages.php';
require '../../model/SP_categories.php';

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

if (isset($_SESSION['role']) == 'admin') {
    $pageAdminVerif = '../pages/page_admin_verif.php';
    $pageAdminDelete = '../pages/page_admin_delete.php';
}

$categories = new Categories();
$series = new Series();
$seriesPagination = $series->seriesPagination();
$nbSeriesPerPages = 12;
$nbSeriesPage = $seriesPagination[0]['total'];
$nbPages = ceil($nbSeriesPage / $nbSeriesPerPages);


if (isset($_GET['page']) AND is_numeric($_GET['page']) AND isset($_GET['categorie'])) {
    $currentPage = $_GET['page'];
    $categories->sp_categories_gender = $_GET['categorie'];
    $categoriesSeries = $categories->getSeriesPagesCategories();
} elseif (isset($_GET['page']) AND is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
    $series->firstPageSeries = ($currentPage - 1) * $nbSeriesPerPages;
    $seriesResult = $series->selectSeriesImages();
    if ($currentPage >= $nbPages) {
        $currentPage = $nbPages;
    }
} else {
    header('Location: page_error.php');
}





if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}