<?php

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_series_pages.php';
require '../../model/SP_suggest_series.php';
require '../../model/SP_article.php';

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
} else {
    header('Location: page_error.php');
    exit();
}

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
