<?php

$sourceBanner = 'assets/images/imgAccueil/BannerPhil.jpg';
$sourceImgNav = 'assets/images/imgAccueil/imgNavbar.png';
$accountUser = 'view/pages/page_account_user.php';
$articlePage = 'view/pages/page_article_info.php';
$allSeriesPage = 'view/pages/page_all_series.php?page=1';
$allArticlesPage = 'view/pages/page_all_articles.php';
$mentionsLegalsPage = 'view/pages/page_mentions_legals.php';
$infoSeries = 'view/pages/page_info_series.php';
$signUpPage = 'view/pages/page_form_sign_up.php';
$signInPage = 'view/pages/page_form_sign_in.php';
$formAddSeries = 'view/pages/page_form_add_series.php';
$logout = 'index.php';

if (isset($_GET['logout'])){
    session_destroy();
    header('Location: index.php');
}