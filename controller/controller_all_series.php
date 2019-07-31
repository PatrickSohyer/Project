<?php

// Require des model dont j'ai besoin 

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma table series pages
require_once '../../model/SP_categories.php'; // require de ma table categories
require_once '../include/include_page_admin_user.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Instanciation de mon objet Categories et Series

$categories = new Categories();
$series = new Series();

// Création de mes variables pour la pagination

$seriesPagination = $series->countSeriesPagination(); // appel de la method pour la pagination
$nbSeriesPerPages = 12; // Je définis le nombre de série par page à 12
$nbSeriesPage = $seriesPagination[0]['total']; // le nombre de page est égal au total du nombre de série dans ma BDD
$nbPages = ceil($nbSeriesPage / $nbSeriesPerPages); // je définis le nombre de page sur un chiffre entier avec ceil.

// je créer mes conditions pour les pages et les catégories

if (isset($_GET['page']) and is_numeric($_GET['page']) and isset($_GET['categorie'])) { // je verifie que page et categorie existe bien dans la superglobal get et que page est bien un chiffre
    $currentPage = $_GET['page']; // la page actuel est égal à get page
    $categories->sp_categories_gender = $_GET['categorie']; // hydratation de mon objet ( gender )
    $series->firstPageSeries = ($currentPage - 1) * $nbSeriesPerPages;
    $categoriesSeries = $categories->getSeriesPagesCategories(); // appel de la method qui permet de selectionner en fonction de la catégorie
} elseif (isset($_GET['page']) and is_numeric($_GET['page']) and empty($_POST['searchSeries'])) { // sinon je fais la pagination normal
    $currentPage = $_GET['page']; // la page actuel est égal à get page 
    $series->firstPageSeries = ($currentPage - 1) * $nbSeriesPerPages;
    $seriesResult = $series->selectSeriesImages();
    if ($currentPage >= $nbPages) {
        $currentPage = $nbPages;
    }
} elseif (isset($_GET['page']) and is_numeric($_GET['page']) and !empty($_POST['searchSeries'])) {
    $currentPage = $_GET['page']; // la page actuel est égal à get page 
    $series->firstPageSeries = ($currentPage - 1) * $nbSeriesPerPages;
    $seriesSearch = '%' . $_POST['searchSeries'] . '%';
    $series->sp_series_pages_title = $seriesSearch;
    $seriesResult = $series->selectSeriesImagesSearch();
    if ($currentPage >= $nbPages) {
        $currentPage = $nbPages;
    }
} else {
    header('Location: page_error.php');
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
