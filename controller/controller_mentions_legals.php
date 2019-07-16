<?php

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

if (isset($_SESSION['role']) == 'admin'){
    $pageAdmin = '../pages/page_admin.php';
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}