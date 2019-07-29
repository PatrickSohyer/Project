<?php

// Require des model dont j'ai besoin 

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_series_pages.php'; // require de ma table series pages
require '../../model/SP_categories.php'; // require de ma table categories

// Définition des chemins d'accès aux différentes pages

$sourceBanner = '../../assets/images/imgAccueil/BannerPhil.jpg'; // chemin de ma bannière 
$sourceImgNav = '../../assets/images/imgAccueil/imgNavbar.png';  // chemin du logo de la navbar
$accountUser = '../pages/page_account_user.php'; // chemin de la page mon compte
$articlePage = '../pages/page_article_info.php'; // chemin de la page avec un article
$allSeriesPage = '../pages/page_all_series.php?page=1'; // chemain de la page avec toutes les séries
$allArticlesPage = '../pages/page_all_articles.php?page=1'; // chemin de la page avec tout les articles
$mentionsLegalsPage = '../pages/page_mentions_legals.php'; // chemin de la page pour les mentions legals
$infoSeries = '../pages/page_info_series.php'; // chemin de la page avec une séries et ses informations
$signUpPage = '../pages/page_form_sign_up.php'; // chemin de la page pour s'inscrire
$signInPage = '../pages/page_form_sign_in.php'; // chemin de la page pour se connecter
$formAddSeries = '../pages/page_form_add_series.php'; // chemin de la page pour ajouter une série
$suggestSeriesPages = '../pages/page_suggest_series.php'; // chemin de la page pour suggérer une série
$logout = '../../index.php'; // chemin de la page quand on clique sur ce déconnecter
$categoriesSeries = '../pages/page_all_series.php'; // chemin de la page quand on choisis une catégorie

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



// Création de mon chemin d'accès à la console admin si je suis connecté en tant qu'administrateur

if (isset($_SESSION['role']) == 'admin') { // si le role de ma session est strictement égal à Admin 
    $pageAdminDelete = '../pages/page_admin_delete.php'; // j'ai accès à cette page
    $pageAdminSuggestSeries = '../pages/page_admin_suggest_series.php'; // j'ai accès à cette page
    $pageAdminUpdate = '../pages/page_admin_update.php'; // j'ai accès à cette page
    $pageAdminUserRole = '../pages/page_admin_user_role.php'; // j'ai accès à cette page
    $pageAdminVerif = '../pages/page_admin_verif.php'; // j'ai accès à cette page
    $pageAdmin = '../pages/page_admin.php'; // j'ai accès à cette page
    $pageFormAddSeries = '../pages/page_form_add_series.php'; // j'ai accès à cette page
    $pageUpdateSeries = '../pages/page_update_series.php'; // j'ai accès à cette page
    $pageFormAddArticle = '../pages/page_form_add_article.php'; // j'ai accès à cette page
    $pageAdminUpdateArticle = '../pages/page_admin_update_article.php'; // j'ai accès à cette page
    $pageUpdateArticle = '../pages/page_update_article.php'; // j'ai accès à cette page
    $pageAdminDeleteArticle = '../pages/page_admin_delete_article.php'; // j'ai accès à cette page
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
