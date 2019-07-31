<?php

/* Configure le script en français */
setlocale(LC_TIME, 'fr_FR.UTF8', 'fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Convertir une date US en françcais function dateFr($date){ return strftime('%A %d %B %Y, %H:%M:%S',strtotime($date)); }

require_once '../../model/SP_database.php'; // require de ma classe Database
require_once '../../model/SP_article.php'; // require de ma classe Article
require_once '../include/include_page_admin_user.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Instanciation de mon objet Article

$article = new Article();

// condition pour afficher les bonnes informations selon l'id

if (isset($_GET['id']) and is_numeric($_GET['id'])) { // je verifie si id existe bien dans la superglobal get et si c'est bien un chiffre
    $article->id = $_GET['id']; // hydratation de mon objet ( id )
    $selectArticle = $article->selectArticleInfo(); // appel de ma method
} else {
    header('Location: page_error.php');
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
