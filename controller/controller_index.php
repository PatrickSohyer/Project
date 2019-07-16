<?php

// Require des model dont j'ai besoin

require 'model/SP_database.php';
require 'model/SP_categories.php';
require 'model/SP_users.php';

// Définition des chemins d'accès aux différentes pages

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
$categoriesSeries = 'view/pages/page_all_series.php';

// Création de mon objet USERS

$users = new Users();

// Hydratation de l'id 

if (isset($_SESSION['id'])) {
    $users->id = $_SESSION['id'];
    $usersResult = $users->selectUsers();
}

// Création de mon chemin d'accès à la console admin si je suis connecté en tant qu'administrateur

if (isset($_SESSION['role']) == 'admin') {
    $pageAdmin = 'view/pages/page_admin.php';
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}