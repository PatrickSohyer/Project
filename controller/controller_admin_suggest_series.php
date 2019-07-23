<?php

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_users.php'; // require de ma classe Users
require '../../model/SP_suggest_series.php'; // require de ma classe Series
require '../../model/SP_series_pages.php';


// Définition des chemins d'accès aux différentes pages

$sourceBanner = '../../assets/images/imgAccueil/BannerPhil.jpg'; // chemin de ma bannière 
$sourceImgNav = '../../assets/images/imgAccueil/imgNavbar.png';  // chemin du logo de la navbar
$accountUser = '../pages/page_account_user.php'; // chemin de la page mon compte
$articlePage = '../pages/page_article_info.php'; // chemin de la page avec un article
$allSeriesPage = '../pages/page_all_series.php?page=1'; // chemain de la page avec toutes les séries
$allArticlesPage = '../pages/page_all_articles.php'; // chemin de la page avec tout les articles
$mentionsLegalsPage = '../pages/page_mentions_legals.php'; // chemin de la page pour les mentions legals
$infoSeries = '../pages/page_info_series.php'; // chemin de la page avec une séries et ses informations
$signUpPage = '../pages/page_form_sign_up.php'; // chemin de la page pour s'inscrire
$signInPage = '../pages/page_form_sign_in.php'; // chemin de la page pour se connecter
$formAddSeries = '../pages/page_form_add_series.php'; // chemin de la page pour ajouter une série
$suggestSeriesPages = '../pages/page_suggest_series.php'; // chemin de la page pour suggérer une série
$logout = '../../index.php'; // chemin de la page quand on clique sur ce déconnecter
$categoriesSeries = '../pages/page_all_series.php'; // chemin de la page quand on choisis une catégorie

// Création de mon chemin d'accès à la console admin si je suis connecté en tant qu'administrateur

if (isset($_SESSION['role']) == 'admin') { // si le role de ma session est strictement égal à Admin 
    $pageAdminDelete = '../pages/page_admin_delete.php';
    $pageAdminSuggestSeries = '../pages/page_admin_suggest_series.php';
    $pageAdminUpdate = '../pages/page_admin_update.php';
    $pageAdminUserRole = '../pages/page_admin_user_role.php';
    $pageAdminVerif = '../pages/page_admin_verif.php';
    $pageAdmin = '../pages/page_admin.php';
    $pageFormAddSeries = '../pages/page_form_add_series.php';
    $pageUpdateSeries = '../pages/page_update_series.php';
} else {
    header('Location: page_error.php');
    exit();
}

// Instanciation de mon objet SuggestSeries

$suggestSeries = new SuggestSeries();
$selectSuggestSeries = $suggestSeries->selectAllSuggestSeries();
$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggestCount = $suggestSeries->countSuggestAdmin();


// Ma condition pour supprimer une suggestion 

if (isset($_GET['deleteSuggest'])) {
    $suggestSeries->id = $_GET['deleteSuggest'];
    if ($suggestSeries->deleteSuggestSeries()) {
        header('Location: page_admin_suggest_series.php');
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}