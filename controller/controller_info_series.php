<?php

/* Configure le script en français */
setlocale(LC_TIME, 'fr_FR.UTF8', 'fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Convertir une date US en françcais function dateFr($date){ return strftime('%A %d %B %Y, %H:%M:%S',strtotime($date)); }

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma table sp_series_pages
require_once '../../model/SP_users.php'; // require de ma table SP_users
require_once '../../model/SP_comments.php'; // require de ma table SP_comments
require_once '../../model/SP_categories.php'; // require de ma table Categories
require_once '../../model/SP_article.php'; // require de ma table Article
require_once '../include/include_page_admin_user.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Création des regex pour le formulaire 

$regexMessage = '/^.{0,500}$/'; // regex pour les messages

// Instanciation de mon objet Series et Users

$series = new Series();
$users = new Users();
$comments = new Comments();
$categories = new Categories();
$article = new Article();

$article->id_sp_series_pages = $_GET['id'];
$selectArticle = $article->selectArticleSeries();

$categories->id = $_GET['id'];
$selectCategories = $categories->selectAllCategoriesSeries();


// Condition pour sélectionner l'utilisateur en fonction de son id

if (isset($_SESSION['id'])) { // si id existe bien dans la superglobal GET
    $users->id = $_SESSION['id']; // hydratation de mon objet ( id )
    $usersResult = $users->selectUsers(); // appel la method pour selection un users
}

// Condition pour les votes et notes

if (isset($_GET['rate']) and is_numeric($_GET['rate'])) { // je vérifie que rate existe bien dans GET et que c'est un nombre
    $series->id = $_GET['id']; // hydration de mon objet ( id )
    $seriesInfoRate = $series->selectSeriesPagesInfo(); // appel de method pour selectionner toute les infos d'une série
    $rate = $_GET['rate']; // je définis ma variable rate 
    if (is_null($seriesInfoRate['sp_series_pages_rate'])) {
        $newRate = $rate; // je définis une variable newrate
        $series->sp_series_pages_rate = $newRate; // hydratation de mon objet ( rate )
        $newVote = $seriesInfoRate['sp_series_pages_number_vote'] + 1; // je définis la variable newvote qui augmente de 1 à chaque vote
        $series->sp_series_pages_number_vote = $newVote; // hydratation de mon objet ( vote )
        $seriesInfoRateUpdate = $series->updateNumberVote(); // j'appel la method pour update
    } else {
        $newRate = ($seriesInfoRate['sp_series_pages_rate'] + $rate); // je définis une variable newRate 
        $series->sp_series_pages_rate = $newRate; // hydration de mon objet ( rate )
        $newVote = $seriesInfoRate['sp_series_pages_number_vote'] + 1; // je définis la variable newVote qui augmente de 1 
        $series->sp_series_pages_number_vote = $newVote; // hydratation de mon objet ( vote )
        $seriesInfoRateUpdate = $series->updateNumberVote(); // j'appel la method pour update
    }
}

if (isset($_POST['deleteComment'])) {
    $comments->id = $_POST['deleteComment'];
    if ($comments->deleteComments() == TRUE) { // j'appel la method qui permet de supprimer un commentaire
        $id = $_GET['id'];
        header("Location: page_info_series.php?id=$id");
    }
}

// condition pour afficher les bonnes informations selon l'id

if (isset($_GET['id']) and is_numeric($_GET['id'])) { // je verifie si id existe bien dans la superglobal get et si c'est bien un chiffre
    $series->id = $_GET['id']; // hydratation de mon objet ( id )
    $seriesInfo = $series->selectSeriesPagesInfo(); // appel de ma method
    $seriesActor = $series->selectSeriesPagesActor(); // appel de ma methode pour afficher les acteurs
    $seriesCreator = $series->selectSeriesPagesCreator(); // appel de ma methode pour afficher les créateurs
    $seriesEpisodes = $series->selectSeriesPagesEpisodes(); // appel de ma methode pour afficher les épisodes
} else {
    header('Location: page_error.php');
}

$comments->sp_id_series_pages = $_GET['id'];
$selectComments = $comments->selectComments();

// condition pour ajouter un commentaire

if (count($_POST) > 0) {
    if (!empty($_POST['commentMessage'])) { // si le poste du message n'est pas vide
        if (preg_match($regexMessage, $_POST['commentMessage'])) { // regex pour le message
            $commentMessage = strip_tags(htmlspecialchars($_POST['commentMessage'])); // protection pour le message
            $comments->sp_message = $commentMessage;
            $timeStamp = time();
            $date = date('Y-m-d H:i:s');
            $comments->sp_date_message = $date;
            $comments->sp_id_users = $_SESSION['id'];
            $comments->sp_id_series_pages = $_GET['id'];
            $comments->insertComments();
            header('Location: page_info_series.php?id=' . $_GET['id']);
        } else {
            $errorMessage['commentMessage'] = 'Le message ne peut pas contenir plus de 500 caractères.'; // Message erreur regex
        }
    } else {
        $errorMessage['commentMessage'] = 'Veuillez ajouter un commentaire.'; // Message erreur si vide
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
