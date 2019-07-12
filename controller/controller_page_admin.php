<?php

require '../../model/SP_database.php';
require '../../model/SP_series_pages.php';

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

if (isset($_SESSION['role']) == 'admin'){
    $pageAdmin = '../pages/page_admin.php';
}

$series = new Series();
$seriesVerif = $series->seriesPagesVerification();
if (isset($_GET['validation'])) {
    $series->sp_series_pages_verification = 1;
    $series->id = $_GET['validation'];
    if ($series->seriesPagesUpdateVerif()) {
        header('Location: page_admin_verif.php');
    }
}
