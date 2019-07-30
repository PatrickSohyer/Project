<?php

// regex pour le role 

$regexRole = '/^.{2,250}$/'; // regex pour le titre

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_users.php';
require_once '../../model/SP_series_pages.php';
require_once '../../model/SP_suggest_series.php'; // require de ma table Suggest
require_once '../../model/SP_comments.php';
require_once '../include/include_page_admin.php';
require_once '../include/include_route.php';

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