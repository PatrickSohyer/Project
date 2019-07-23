<?php

// regex pour le role 

$regexRole = '/^.{2,250}$/'; // regex pour le titre

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_users.php';
require '../../model/SP_series_pages.php';
require '../../model/SP_suggest_series.php'; // require de ma table Suggest
require '../../model/SP_comments.php';

// Définition des chemins d'accès aux différentes pages

$sourceBanner = '../../assets/images/imgAccueil/BannerPhil.jpg'; // chemin de ma bannière 
$sourceImgNav = '../../assets/images/imgAccueil/imgNavbar.png';  // chemin du logo de la navbar
$accountUser = '../pages/page_account_user.php'; // chemin de la page mon compte
$articlePage = '../pages/page_article_info.php'; // chemin de la page avec un article
$allSeriesPage = '../pages/page_all_series.php?page=1'; // chemain de la page avec toutes les séries
$allArticlesPage = '../pages/page_all_articles.php'; // chemin de la page avec tout les articles
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
    $pageAdminDelete = '../pages/page_admin_delete.php';
    $pageAdminSuggestSeries = '../pages/page_admin_suggest_series.php';
    $pageAdminUpdate = '../pages/page_admin_update.php';
    $pageAdminUserRole = '../pages/page_admin_user_role.php';
    $pageAdminVerif = '../pages/page_admin_verif.php';
    $pageAdmin = '../pages/page_admin.php';
    $pageFormAddSeries = '../pages/page_form_add_series.php';
    $pageUpdateSeries = '../pages/page_update_series.php';
} else {
    header('Location: page_error.php');
    exit();
}

// Instanciation de mon objet Series

$users = new Users();
$comments = new Comments();
$selectUsers = $users->selectAllUsers();
$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();

// Création de mes variables pour la pagination

$usersPagination = $users->countUsersPaginationAdmin(); // appel de la method pour la pagination
$nbUsersPerPages = 12; // Je définis le nombre de série par page à 12
$nbUsersPage = $usersPagination[0]['total']; // le nombre de page est égal au total du nombre de série dans ma BDD
$nbPages = ceil($nbUsersPage / $nbUsersPerPages); // je définis le nombre de page sur un chiffre entier avec ceil.

// je créer mes conditions pour les pages et les catégories

if (isset($_GET['page']) and is_numeric($_GET['page'])) { // je vérifie que page existe bien dans la superglobal get et que c'est bien un chiffre entier 
    $currentPage = $_GET['page']; // je définis que la page sur laquelle on se trouve correspond au GET
    $users->firstPageUsers = ($currentPage - 1) * $nbUsersPerPages; // hydratation de mon objet ( first page est égal à la page sur laquelle on se trouve - 1 * le nombre de séries par page)
    $usersAllUsers = $users->selectAllUsers(); // appel de la methode pour selectionner les séries
    if ($currentPage >= $nbPages) { // si la page où l'on se trouve est supérieur ou égal au nombre de page
        $currentPage = $nbPages; // alors la page actuel est = au nombre de page
    }
}

if (isset($_POST['deleteUserAccount'])) { // Je vérifie que j'ai bien appuyé sur le boutton supprimé
    $users->id = $_POST['deleteUserAccount']; // Hydratation de l'id
    $comments->sp_id_users = $_POST['deleteUserAccount']; // hydratation de sp_id_users des commentaires
    $suggest->sp_id_users = $_POST['deleteUserAccount']; // hydratation de sp_id_users des suggestions
    if ($comments->updateCommentsUser() && $suggest->deleteSuggestUsers()) { // si les 2 méthodes renvoie TRUE
        $users->deleteUsers();
        header('Location: page_admin_user_role.php?page=1');
    }
}