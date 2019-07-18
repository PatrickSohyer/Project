<?php

// Require des model dont j'ai besoin

require 'model/SP_database.php'; // require de ma database
require 'model/SP_categories.php'; // require de ma table categories
require 'model/SP_users.php'; // require de ma table users

// Définition des chemins d'accès aux différentes pages

$sourceBanner = 'assets/images/imgAccueil/BannerPhil.jpg'; // chemin de ma bannière 
$sourceImgNav = 'assets/images/imgAccueil/imgNavbar.png'; // chemin du logo de la navbar
$accountUser = 'view/pages/page_account_user.php'; // chemin de la page mon compte
$articlePage = 'view/pages/page_article_info.php'; // chemin de la page avec un article
$allSeriesPage = 'view/pages/page_all_series.php?page=1'; // chemain de la page avec toutes les séries
$allArticlesPage = 'view/pages/page_all_articles.php'; // chemin de la page avec tout les articles
$mentionsLegalsPage = 'view/pages/page_mentions_legals.php'; // chemin de la page pour les mentions legals
$infoSeries = 'view/pages/page_info_series.php'; // chemin de la page avec une séries et ses informations
$signUpPage = 'view/pages/page_form_sign_up.php'; // chemin de la page pour s'inscrire
$signInPage = 'view/pages/page_form_sign_in.php'; // chemin de la page pour se connecter
$formAddSeries = 'view/pages/page_form_add_series.php'; // chemin de la page pour ajouter une série
$suggestSeriesPages = 'view/pages/page_suggest_series.php'; // chemin de la page pour suggérer une série
$logout = 'index.php'; // chemin de la page quand on clique sur ce déconnecter
$categoriesSeries = 'view/pages/page_all_series.php'; // chemin de la page quand on choisis une catégorie

// Création de mon chemin d'accès à la console admin si je suis connecté en tant qu'administrateur

if (isset($_SESSION['role']) == 'admin') { // si le role de ma session est strictement égal à Admin
    $pageAdmin = 'view/pages/page_admin.php'; // alors il balance le chemin la console admin
}

// Instanciation de mon objet USERS

$users = new Users();

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