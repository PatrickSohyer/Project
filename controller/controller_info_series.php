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
if (isset($_SESSION['role']) == 'admin'){
    $pageAdminVerif = '../pages/page_admin_verif.php';
    $pageAdminDelete = '../pages/page_admin_delete.php';
}

$series = new Series();


if (isset($_GET['id'])) {
    $series->id = $_GET['id'];
    $seriesInfo = $series->seriesPagesInfo();
}

if (isset($_GET['id'])) {
    $series->id = $_GET['id'];
    $seriesActor = $series->seriesPagesActor();
}

if (isset($_GET['id'])) {
    $series->id = $_GET['id'];
    $seriesCreator = $series->seriesPagesCreator();
}

if (isset($_GET['id'])) {
    $series->id = $_GET['id'];
    $seriesEpisodes = $series->seriesPagesEpisodes();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}
