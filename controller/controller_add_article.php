<?php

/* Configure le script en français */
setlocale(LC_TIME, 'fr_FR.UTF8', 'fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Convertir une date US en françcais function dateFr($date){ return strftime('%A %d %B %Y, %H:%M:%S',strtotime($date)); }

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_series_pages.php'; // require de ma class Series
require '../../model/SP_suggest_series.php'; // require de ma class SuggestSeries
require '../../model/SP_categories.php'; // require de ma class Categories
require '../../model/SP_article.php'; // require de ma class Article

// Création de mon Tableau d'erreur

$errorMessage = array();

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
    $pageAdminDeleteArticle = '..pages/page_admin_delete_article.php'; // j'ai accès à cette page
} else {
    header('Location: page_error.php');
    exit();
}


// Instanciation de mes objets

$article = new Article();
$series = new Series();
$selectSeries = $series->selectAllSeries();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();
$categories = new Categories();
$selectCategories = $categories->selectAllCategories();

// Vérification de mon formulaire pour ajouter une séries

if (count($_POST) > 0) { // Si le compte du poste est supérieur à 0
    $timeStamp = time();
    $date = date('Y-m-d H:i:s');
    $article->sp_article_date = $date;
    if (!empty($_POST['addArticleTitle'])) { // si le poste du titre n'est pas vide
        $addArticleTitle = strip_tags(htmlspecialchars($_POST['addArticleTitle'])); // protection pour le titre
        $article->sp_article_title = $addArticleTitle; // hydratation de mon objet ( title )
    } else {
        $errorMessage['addArticleTitle'] = 'Le titre ne peut pas contenir plus de 250 caractères.'; // Message erreur regex
    }
    if (!empty($_POST['addArticleDescription'])) { // si le poste de la description n'est pas vide
        $addArticleDescription = strip_tags(htmlspecialchars($_POST['addArticleDescription'])); // protection pour la description
        $article->sp_article_description = $addArticleDescription; // hydratation de mon objet ( description )
    } else {
        $errorMessage['addArticleDescription'] = 'La description ne peut pas être vide!'; // Message erreur si vide
    }
    if (!empty($_POST['addArticleImage'])) { // si le poste du nombre de saison n'est pas vide
        $addArticleImage = strip_tags(htmlspecialchars($_POST['addArticleImage'])); // protection pour le nombre de saison
        $article->sp_article_image = $addArticleImage; // hydratation de mon objet ( nombre de saison )
    } else {
        $errorMessage['addArticleImage'] = 'Merci de rentrer un nombre!'; // Message erreur regex
    }
    if (!empty($_POST['addArticleResume'])) {  // si le poste du nombre d'épisode n'est pas vide
        $addArticleResume = strip_tags(htmlspecialchars($_POST['addArticleResume'])); // protection pour le nombre d'épisodes
        $article->sp_article_resume = $addArticleResume; // hydratation de mon objet ( nombre d'épisode )
    } else {
        $errorMessage['addArticleResume'] = 'Merci de rentrer un nombre!'; // Message erreur regex
    }
    if (!empty($_POST['addIdSpSeries'])) {  // si le poste de la durée d'un épisode n'est pas vide
        $addIdSpSeries = strip_tags(htmlspecialchars($_POST['addIdSpSeries'])); // protection pour la durée d'un épisode
        $article->id_sp_series_pages = $addIdSpSeries; // hydratation de mon objet ( durée d'un épisode )
    } else {
        $errorMessageAddSeries['addIdSpSeries'] = 'Merci de rentrer un nombre!'; // Message erreur regex
    }
    if ($article->addArticle() == TRUE) { // si ma methode est == à true elle s'execute
        header('Location: ../../index.php');
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
