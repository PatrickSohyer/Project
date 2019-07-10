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

if (isset($_SESSION['role']) == 'admin') {
    $pageAdminVerif = '../pages/page_admin_verif.php';
    $pageAdminDelete = '../pages/page_admin_delete.php';
}

$series = new Series();

if (isset($_GET['rate']) AND is_numeric($_GET['rate'])) {
    $series->id = $_GET['id'];
    $seriesInfoRate = $series->seriesPagesInfo();
    $rate = $_GET['rate'];
    if (is_null($seriesInfoRate['sp_series_pages_rate'])) {
        $newRate = $rate;
        $series->sp_series_pages_rate = $newRate;
        $newVote = $seriesInfoRate['sp_series_pages_number_vote'] + 1;
        $series->sp_series_pages_number_vote = $newVote;
        $seriesInfoRateUpdate = $series->updateNumberVote();
    } else {
        $newRate = ($seriesInfoRate['sp_series_pages_rate'] + $rate);
        $series->sp_series_pages_rate = $newRate;
        $newVote = $seriesInfoRate['sp_series_pages_number_vote'] + 1;
        $series->sp_series_pages_number_vote = $newVote;
        $seriesInfoRateUpdate = $series->updateNumberVote();
    }
}


if (isset($_GET['id']) AND is_numeric($_GET['id'])) {
    $series->id = $_GET['id'];
    $seriesInfo = $series->seriesPagesInfo();
} else {
    header('Location: page_error.php');
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
