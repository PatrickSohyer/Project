<?php

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma base de donnée sp_series_pages
require_once '../../model/SP_suggest_series.php'; // require de ma classe Suggest
require_once '../include/include_page_admin.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Instanciation de mon objet Series et appel de ma methode pour vérifier

$series = new Series();
$seriesVerif = $series->selectSeriesPagesVerification();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();

// Condition pour vérifier une série

if (isset($_GET['validation'])) { // je vérifie que validation existe bien dans la super global GET
    $series->sp_series_pages_verification = 1; // hydration de mon objet ( verification )
    $series->id = $_GET['validation']; // hydration de mon objet ( id )
    if ($series->updateVerifSeriesPages()) { // si la methode s'execute on retourne à la page pour vérifier
        header('Location: page_admin_verif.php');
    }
}
