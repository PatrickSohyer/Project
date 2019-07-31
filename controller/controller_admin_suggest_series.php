<?php

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma Database
require_once '../../model/SP_users.php'; // require de ma classe Users
require_once '../../model/SP_suggest_series.php'; // require de ma classe Suggest
require_once '../../model/SP_series_pages.php'; // require de ma classe Series
require_once '../include/include_page_admin.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Instanciation de mon objet SuggestSeries

$suggestSeries = new SuggestSeries();
$selectSuggestSeries = $suggestSeries->selectAllSuggestSeries();
$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggestCount = $suggestSeries->countSuggestAdmin();


// Ma condition pour supprimer une suggestion 

if (isset($_POST['deleteSuggestSeries'])) {
    $suggestSeries->id = $_POST['deleteSuggestSeries'];
    if ($suggestSeries->deleteSuggestSeries()) {
        header('Location: page_admin_suggest_series.php');
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
