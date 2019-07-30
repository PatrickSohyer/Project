<?php

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php';
require_once '../../model/SP_suggest_series.php';
require_once '../../model/SP_article.php';
require_once '../include/include_page_admin.php';
require_once '../include/include_route.php';

// Création de mon Tableau d'erreur

$errorMessage = array();

// Instanciation de mon objet Series

$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$selectSeries = $series->selectAllSeries();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();
$article = new Article();

// Condition pour mettre à jour les séries

if (isset($_GET['id'])) { // je vérifie que id existe bien dans la superglobal GET
    $article->id = $_GET['id']; // hydratation de mon objet ( id )
    $selectArticle = $article->selectArticleUpdate(); // J'appel ma methode pour selectionner les séries
    if (count($_POST) > 0) { // si le compte des postes est supérieur à 0
        if (!empty($_POST['updateArticleTitle'])) { // si le poste pour le titre n'est pas vide
            $updateArticleTitle = strip_tags(htmlspecialchars($_POST['updateArticleTitle'])); // protection de mon titre
            $article->sp_article_title = $updateArticleTitle; // Hydratation de mon objet ( titre )
        } else {
            $errorMessage['updateArticleTitle'] = 'Le titre ne peut pas contenir plus de 250 caractères.'; // message erreur regex
        }
        if (!empty($_POST['updateArticleDescription'])) {  // si le poste pour la description n'est pas vide
            $updateArticleDescription = strip_tags(htmlspecialchars($_POST['updateArticleDescription'])); // protection de ma description
            $article->sp_article_description = $updateArticleDescription; // Hydration de mon objet ( description )
        } else {
            $errorMessage['updateArticleDescription'] = 'La description ne peut pas contenir plus de 8000 caractères'; // message erreur
        }
        if (!empty($_POST['updateArticleImage'])) { // si le poste pour le nombre de saison n'est pas vide
                $updateArticleImage = strip_tags(htmlspecialchars($_POST['updateArticleImage'])); // protection des nombres
                $article->sp_article_image = $updateArticleImage; // hydration de mon objet ( Nombre de saison )
            } else {
                $errorMessage['updateArticleImage'] = 'Merci de rentrer le nom d\'une image valide!'; // message erreur regex
            }
        if (!empty($_POST['updateArticleResume'])) { // si le poste pour le nombre d'épisode n'est pas vide
                $updateArticleResume = strip_tags(htmlspecialchars($_POST['updateArticleResume'])); // protection des nombres
                $article->sp_article_resume = $updateArticleResume; // hydration de mon objet
            } else {
                $errorMessage['updateArticleResume'] = 'Merci de rentrer un nombre!'; // message erreur regex
            }
        if (!empty($_POST['updateIdSeriesPages'])) {  // si le poste pour la duré d'un épisode n'est pas vide
                $updateIdSeriesPages = strip_tags(htmlspecialchars($_POST['updateIdSeriesPages'])); // protection des nombres
                $article->id_sp_series_pages = $updateIdSeriesPages; // hydration de mon objet
            } else {
                $errorMessage['updateIdSeriesPages'] = 'Merci de rentrer un nombre!'; // message erreur regex
            }
        if ($article->updateArticle() == TRUE) { // si ma methode est strictement egal à TRUE alors elle s'execute
            $success = TRUE;
            header('Location: page_admin_update_article.php?page=1');
        }
    }
}
