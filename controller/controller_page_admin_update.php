<?php

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma base de donnée sp_series_pages
require_once '../../model/SP_suggest_series.php';  // require de ma classe Suggest
require_once '../include/include_page_admin.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Instanciation de mon objet Series

$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();

// Création de mes variables pour la pagination

$seriesPagination = $series->countSeriesPaginationAdmin(); // appel de la method pour la pagination
$nbSeriesPerPages = 12; // Je définis le nombre de série par page à 12
$nbSeriesPage = $seriesPagination[0]['total']; // le nombre de page est égal au total du nombre de série dans ma BDD
$nbPages = ceil($nbSeriesPage / $nbSeriesPerPages); // je définis le nombre de page sur un chiffre entier avec ceil.

// je créer mes conditions pour les pages et les catégories

if (isset($_GET['page']) and is_numeric($_GET['page'])) { // je vérifie que page existe bien dans la superglobal get et que c'est bien un chiffre entier 
    $currentPage = $_GET['page']; // je définis que la page sur laquelle on se trouve correspond au GET
    $series->firstPageSeries = ($currentPage - 1) * $nbSeriesPerPages; // hydratation de mon objet ( first page est égal à la page sur laquelle on se trouve - 1 * le nombre de séries par page)
    $seriesAllSeries = $series->selectSeriesPagesAllSeries(); // appel de la methode pour selectionner les séries
    if ($currentPage >= $nbPages) { // si la page où l'on se trouve est supérieur ou égal au nombre de page
        $currentPage = $nbPages; // alors la page actuel est = au nombre de page
    }
}
