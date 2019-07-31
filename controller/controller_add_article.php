<?php

/* Configure le script en français */
setlocale(LC_TIME, 'fr_FR.UTF8', 'fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Convertir une date US en françcais function dateFr($date){ return strftime('%A %d %B %Y, %H:%M:%S',strtotime($date)); }

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma class Series
require_once '../../model/SP_suggest_series.php'; // require de ma class SuggestSeries
require_once '../../model/SP_categories.php'; // require de ma class Categories
require_once '../../model/SP_article.php'; // require de ma class Article
require_once '../include/include_page_admin.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Création de mon Tableau d'erreur

$errorMessage = array();

// Instanciation de mes objets

$article = new Article(); // instanciation de mon objet article
$series = new Series(); // instanciation de mon objet Series
$selectSeries = $series->selectAllSeries(); // Methode qui me permet de sélectionner toute les séries
$seriesCountVerif = $series->countSeriesVerifAdmin(); // Methode qui me permet de compter le nombre de série à vérifier
$suggest = new SuggestSeries(); // instanciation de mon objet SuggestSeries
$suggestCount = $suggest->countSuggestAdmin(); // Methode qui me permet de compte le nombre de suggestion
$categories = new Categories(); // instanciation de mon objet Categories
$selectCategories = $categories->selectAllCategories(); // Methode qui me permet selectionner toutes les catégories

// Vérification de mon formulaire pour ajouter une séries

if (count($_POST) > 0) { // Si le compte du poste est supérieur à 0
    $timeStamp = time(); // je créer le timeStamp de la date du jour
    $date = date('Y-m-d H:i:s'); // je créer le format de la date
    $article->sp_article_date = $date; // hydratation de sp_article_date
    if (!empty($_POST['addArticleTitle'])) { // si le poste du titre de l'artice n'est pas vide
        $addArticleTitle = strip_tags(htmlspecialchars($_POST['addArticleTitle'])); // protection pour le titre de l'article
        $article->sp_article_title = $addArticleTitle; // hydratation de sp_article_title
    } else {
        $errorMessage['addArticleTitle'] = 'Veuillez saisir le titre de l\'article.'; // Message d'erreur si le titre est vide 
    }
    if (!empty($_POST['addArticleDescription'])) { // si le poste de la description de l'article n'est pas vide
        $addArticleDescription = strip_tags(htmlspecialchars($_POST['addArticleDescription'])); // protection pour la description de l'article
        $article->sp_article_description = $addArticleDescription; // hydratation de sp_article_description
    } else {
        $errorMessage['addArticleDescription'] = 'Veuillez saisir la description de l\'article!'; // Message d'erreur si la description est vide
    }
    if (!empty($_POST['addArticleImage'])) { // si le poste dde l'image de l'article n'est pas vide
        $addArticleImage = strip_tags(htmlspecialchars($_POST['addArticleImage'])); // protection pour l'image de l'article
        $article->sp_article_image = $addArticleImage; // hydratation de sp_article_image
    } else {
        $errorMessage['addArticleImage'] = 'Veuillez choisir l\'image de l\'article!'; // Message d'erreur si l'image est vide
    }
    if (!empty($_POST['addArticleResume'])) {  // si le poste du contenu de l'article
        $addArticleResume = strip_tags(htmlspecialchars($_POST['addArticleResume'])); // protection pour le contenu de l'article
        $article->sp_article_resume = $addArticleResume; // hydratation de sp_article_resume
    } else {
        $errorMessage['addArticleResume'] = 'Merci de rentrer un nombre!'; // Message d'erreur si le contenu de l'article est vide
    }
    if (!empty($_POST['addIdSpSeries'])) {  // si le poste de l'id de la série n'est pas vide
        $addIdSpSeries = strip_tags(htmlspecialchars($_POST['addIdSpSeries'])); // protection pour l'id de la série
        $article->id_sp_series_pages = $addIdSpSeries; // hydratation de id_sp_series_pages
    } else {
        $errorMessageAddSeries['addIdSpSeries'] = 'Merci de rentrer un nombre!'; // Message d'erreur si l'id est vide
    }
    if ($article->addArticle() == TRUE) { // si la methode s'execute
        header('Location: page_all_articles.php?page=1'); // alors je suis renvoyé vers la page des articles.
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
