<?php

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_series_pages.php'; // require de ma base de donnée sp_series_pages

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
    $pageAdmin = '../pages/page_admin.php'; // alors il balance le chemin la console admin
}

// Instanciation de mon objet Series

$series = new Series();

// Condition pour les votes et notes

if (isset($_GET['rate']) AND is_numeric($_GET['rate'])) { // je vérifie que rate existe bien dans GET et que c'est un nombre
    $series->id = $_GET['id']; // hydration de mon objet ( id )
    $seriesInfoRate = $series->selectSeriesPagesInfo(); // appel de method pour selectionner toute les infos d'une série
    $rate = $_GET['rate']; // je définis ma variable rate 
    if (is_null($seriesInfoRate['sp_series_pages_rate'])) { 
        $newRate = $rate; // je définis une variable newrate
        $series->sp_series_pages_rate = $newRate; // hydratation de mon objet ( rate )
        $newVote = $seriesInfoRate['sp_series_pages_number_vote'] + 1; // je définis la variable newvote qui augmente de 1 à chaque vote
        $series->sp_series_pages_number_vote = $newVote; // hydratation de mon objet ( vote )
        $seriesInfoRateUpdate = $series->updateNumberVote(); // j'appel la method pour update
    } else {
        $newRate = ($seriesInfoRate['sp_series_pages_rate'] + $rate); // je définis une variable newRate 
        $series->sp_series_pages_rate = $newRate; // hydration de mon objet ( rate )
        $newVote = $seriesInfoRate['sp_series_pages_number_vote'] + 1; // je définis la variable newVote qui augmente de 1 
        $series->sp_series_pages_number_vote = $newVote; // hydratation de mon objet ( vote )
        $seriesInfoRateUpdate = $series->updateNumberVote(); // j'appel la method pour update
    }
}

// condition pour afficher les bonnes informations selon l'id

if (isset($_GET['id']) AND is_numeric($_GET['id'])) { // je verifie si id existe bien dans la superglobal get et si c'est bien un chiffre
    $series->id = $_GET['id']; // hydratation de mon objet ( id )
    $seriesInfo = $series->selectSeriesPagesInfo(); // appel de ma method
} else {
    header('Location: page_error.php');
}

// condition pour afficher les bons acteurs selon l'id de la série 

if (isset($_GET['id'])) { // je verifie si id existe bien dans la superglobal get
    $series->id = $_GET['id']; // hydration de mon objet ( id )
    $seriesActor = $series->selectSeriesPagesActor(); // appel de ma methode pour afficher les acteurs
}

// condition pour afficher les bons créateurs selon l'id de la série

if (isset($_GET['id'])) { // je verifie si id existe bien dans la superglobal get
    $series->id = $_GET['id']; // hydration de mon objet ( id )
    $seriesCreator = $series->selectSeriesPagesCreator(); // appel de ma methode pour afficher les créateurs
}

// condition pour afficher les bons épisodes selon l'id de la série

if (isset($_GET['id'])) { // je verifie si id existe bien dans la superglobal get
    $series->id = $_GET['id']; // hydration de mon objet ( id )
    $seriesEpisodes = $series->selectSeriesPagesEpisodes(); // appel de ma methode pour afficher les épisodes
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}