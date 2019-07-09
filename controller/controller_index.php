<?php

require 'model/SP_database.php';
require 'model/SP_categories.php';

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
$actionCategories = 'view/pages/page_all_series.php';

$categories = new Categories();


if (isset($_GET['categorie'])) {
    if($_GET['categorie'] == 'Action') {
        $categories->sp_categories_gender = $_GET['categorie'];
        $categories = $categories->getSeriesPagesCategories();
    }
}

if (isset($_SESSION['role']) == 'admin'){
    $pageAdminVerif = 'view/pages/page_admin_verif.php';
    $pageAdminDelete = 'view/pages/page_admin_delete.php';
}

if (isset($_GET['logout'])){
    session_destroy();
    header('Location: index.php');
}