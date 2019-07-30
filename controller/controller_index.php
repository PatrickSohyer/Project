<?php

// Require des models dont j'ai besoin

require_once 'model/SP_database.php'; // require de ma Database
require_once 'model/SP_categories.php'; // require de ma table Categories
require_once 'model/SP_users.php'; // require de ma table Users
require_once 'model/SP_article.php'; // require de ma table Article

// Définition des chemins d'accès aux différentes pages

$sourceBanner = 'assets/images/imgAccueil/BannerPhil.jpg'; // chemin de ma bannière 
$sourceImgNav = 'assets/images/imgAccueil/imgNavbar.png'; // chemin du logo de la navbar
$accountUser = 'view/pages/page_account_user.php'; // chemin de la page mon compte
$articlePage = 'view/pages/page_article_info.php'; // chemin de la page avec un article
$allSeriesPage = 'view/pages/page_all_series.php?page=1'; // chemain de la page avec toutes les séries
$allArticlesPage = 'view/pages/page_all_articles.php?page=1'; // chemin de la page avec tout les articles
$mentionsLegalsPage = 'view/pages/page_mentions_legals.php'; // chemin de la page pour les mentions legals
$infoSeries = 'view/pages/page_info_series.php'; // chemin de la page avec une séries et ses informations
$signUpPage = 'view/pages/page_form_sign_up.php'; // chemin de la page pour s'inscrire
$signInPage = 'view/pages/page_form_sign_in.php'; // chemin de la page pour se connecter
$formAddSeries = 'view/pages/page_form_add_series.php'; // chemin de la page pour ajouter une série
$suggestSeriesPages = 'view/pages/page_suggest_series.php'; // chemin de la page pour suggérer une série
$logout = 'index.php'; // chemin de la page quand on clique sur ce déconnecter
$categoriesSeries = 'view/pages/page_all_series.php'; // chemin de la page quand on choisis une catégorie

// Instanciation de mon objet USERS

$users = new Users();
$article = new Article();
$selectArticle = $article->selectArticleIndex();

// Condition pour sélectionner l'utilisateur en fonction de son id

if (isset($_SESSION['id'])) { // si id existe bien dans la superglobal GET
    $users->id = $_SESSION['id']; // hydratation de mon objet ( id )
    $usersResult = $users->selectUsers(); // appel la method pour selection un users
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}

if (isset($_SESSION['role']) == 'admin') { // si le role de ma session est strictement égal à Admin 
    $pageAdminDelete = 'view/pages/page_admin_delete.php'; // j'ai accès à cette page
    $pageAdminSuggestSeries = 'view/pages/page_admin_suggest_series.php'; // j'ai accès à cette page
    $pageAdminUpdate = 'view/pages/page_admin_update.php'; // j'ai accès à cette page
    $pageAdminUserRole = 'view/pages/page_admin_user_role.php'; // j'ai accès à cette page
    $pageAdminVerif = 'view/pages/page_admin_verif.php'; // j'ai accès à cette page
    $pageAdmin = 'view/pages/page_admin.php'; // j'ai accès à cette page
    $pageFormAddSeries = 'view/pages/page_form_add_series.php'; // j'ai accès à cette page
    $pageUpdateSeries = 'view/pages/page_update_series.php'; // j'ai accès à cette page
    $pageFormAddArticle = 'view/pages/page_form_add_article.php'; // j'ai accès à cette page
    $pageAdminUpdateArticle = 'view/pages/page_admin_update_article.php'; // j'ai accès à cette page
    $pageUpdateArticle = 'view/pages/page_update_article.php'; // j'ai accès à cette page
    $pageAdminDeleteArticle = 'view/pages/page_admin_delete_article.php'; // j'ai accès à cette page
}

