<?php

/* Configure le script en français */
setlocale(LC_TIME, 'fr_FR.UTF8', 'fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Convertir une date US en françcais function dateFr($date){ return strftime('%A %d %B %Y, %H:%M:%S',strtotime($date)); }

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_series_pages.php'; // require de ma table sp_series_pages
require '../../model/SP_users.php'; // require de ma table SP_users
require '../../model/SP_comments.php'; // require de ma table SP_comments

// Création des regex pour le formulaire 

$regexMessage = '/^.{0,500}$/'; // regex pour les messages

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
    $pageAdmin = '../pages/page_admin.php'; // alors il balance le chemin la console admin
}

// Instanciation de mon objet Series et Users

$series = new Series();
$users = new Users();
$comments = new Comments();

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

if (isset($_GET['deleteComment'])) {
    $comments->id = $_GET['deleteComment'];
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
