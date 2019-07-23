<?php

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_suggest_series.php'; // require de ma table sp_suggest_series

// Création des regex pour le formulaire 

$regexTitle = '/^.{2,250}$/'; // regex pour le titre

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

$suggest = new SuggestSeries();

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
}

// Création de mon Tableau d'erreur

$errorMessage = array();

// Ma vérification pour envoyer une suggestion 

if (count($_POST) == 3) { // si le nombre de post est strictement égal à 3
    $suggestSeries->sp_id_users = $_SESSION['id']; // j'hydrate mon objet 
    if (!empty($_POST['suggestSeriesTitleN1'])) { // si le poste pour la série 1 n'est pas vide
        if (preg_match($regexTitle, $_POST['suggestSeriesTitleN1'])) { // regex pour mon titre
            $suggestSeriesTitleN1 = strip_tags(htmlspecialchars($_POST['suggestSeriesTitleN1'])); // Protection de mon titre
            $suggestSeries->sp_suggest_series_title_N1 = $suggestSeriesTitleN1; // Hydratation de mon object
        } else {
            $errorMessageAddSeries['suggestSeriesTitleN1'] = 'Le titre ne peut pas contenir plus de 250 caractères.'; // message d'erreur titre
        }
    }
    if (!empty($_POST['suggestSeriesTitleN2'])) { // si le poste pour la série 2 n'est pas vide
        if (preg_match($regexTitle, $_POST['suggestSeriesTitleN2'])) { // regex pour mon titre
            $suggestSeriesTitleN2 = strip_tags(htmlspecialchars($_POST['suggestSeriesTitleN2'])); // Protection de mon titre
            $suggestSeries->sp_suggest_series_title_N2 = $suggestSeriesTitleN2; // Hydratation de mon object
        } else {
            $errorMessageAddSeries['suggestSeriesTitleN2'] = 'Le titre ne peut pas contenir plus de 250 caractères.'; // message d'erreur titre
        }
    }
    if (!empty($_POST['suggestSeriesTitleN3'])) { // si le poste pour la série 2 n'est pas vide
        if (preg_match($regexTitle, $_POST['suggestSeriesTitleN3'])) { // regex pour mon titre
            $suggestSeriesTitleN3 = strip_tags(htmlspecialchars($_POST['suggestSeriesTitleN3'])); // Protection de mon titre
            $suggestSeries->sp_suggest_series_title_N3 = $suggestSeriesTitleN3; // Hydratation de mon object
        } else {
            $errorMessageAddSeries['suggestSeriesTitleN3'] = 'Le titre ne peut pas contenir plus de 250 caractères.'; // message d'erreur titre
        }
    }
    if ($suggestSeries->addAllSuggestSeries() == TRUE) { // si ma methode est strictement égal à True alors ça s'ajoute à ma base de donnée
        $success = TRUE;
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
