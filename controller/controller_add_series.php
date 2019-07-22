<?php

// Require des model dont j'ai besoin

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_series_pages.php'; // require de ma base de donnée sp_series_pages

// Création des regex pour le formulaire 

$regexTitle = '/^.{2,250}$/'; // regex pour le titre 
$regexDescription = '/^.{0,8000}$/'; // regex pour la description
$regexNumber = '/^[0-9]+$/'; // regex pour les nombres

// Création de mon Tableau d'erreur

$errorMessageAddSeries = array();

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

// Instanciation de mon objet Series

$series = new Series();

// Vérification de mon formulaire pour ajouter une séries

if (count($_POST) > 0) { // Si le compte du poste est supérieur à 0
    if (!empty($_POST['addSeriesTitle'])) { // si le poste du titre n'est pas vide
        if (preg_match($regexTitle, $_POST['addSeriesTitle'])) { // regex pour le titre 
            $addSeriesTitle = strip_tags(htmlspecialchars($_POST['addSeriesTitle'])); // protection pour le titre
            $series->sp_series_pages_title = $addSeriesTitle; // hydratation de mon objet ( title )
        } else {
            $errorMessageAddSeries['addSeriesTitle'] = 'Le titre ne peut pas contenir plus de 250 caractères.'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesTitle'] = 'Veuillez ajouter le titre.'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesDescription'])) { // si le poste de la description n'est pas vide
        $addSeriesDescription = strip_tags(htmlspecialchars($_POST['addSeriesDescription'])); // protection pour la description
        $series->sp_series_pages_description = $addSeriesDescription; // hydratation de mon objet ( description )
    } else {
        $errorMessageAddSeries['addSeriesDescription'] = 'La description ne peut pas être vide!'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesSeasonsNumber'])) { // si le poste du nombre de saison n'est pas vide
        if (preg_match($regexNumber, $_POST['addSeriesSeasonsNumber'])) { // regex pour les nombres
            $addSeriesSeasonsNumber = strip_tags(htmlspecialchars($_POST['addSeriesSeasonsNumber'])); // protection pour le nombre de saison
            $series->sp_series_pages_number_seasons = $addSeriesSeasonsNumber; // hydratation de mon objet ( nombre de saison )
        } else {
            $errorMessageAddSeries['addSeriesSeasonsNumber'] = 'Merci de rentrer un nombre!'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesSeasonsNumber'] = 'Veuillez ajouter le nombre de saison.'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesEpisodesNumber'])) {  // si le poste du nombre d'épisode n'est pas vide
        if (preg_match($regexNumber, $_POST['addSeriesEpisodesNumber'])) { // regex pour les nombres
            $addSeriesEpisodesNumber = strip_tags(htmlspecialchars($_POST['addSeriesEpisodesNumber'])); // protection pour le nombre d'épisodes
            $series->sp_series_pages_number_episodes = $addSeriesEpisodesNumber; // hydratation de mon objet ( nombre d'épisode )
        } else {
            $errorMessageAddSeries['addSeriesEpisodesNumber'] = 'Merci de rentrer un nombre!'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesEpisodesNumber'] = 'Veuillez ajouter le nombre d\'épisode'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesEpisodesDuration'])) {  // si le poste de la durée d'un épisode n'est pas vide
        if (preg_match($regexNumber, $_POST['addSeriesEpisodesDuration'])) { // regex pour les nombres
            $addSeriesDuration = strip_tags(htmlspecialchars($_POST['addSeriesEpisodesDuration'])); // protection pour la durée d'un épisode
            $series->sp_series_pages_duration_episodes = $addSeriesDuration; // hydratation de mon objet ( durée d'un épisode )
        } else {
            $errorMessageAddSeries['addSeriesEpisodesDuration'] = 'Merci de rentrer un nombre!'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesEpisodesDuration'] = 'Veuillez ajouter la durer d\'un épisode'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesDiffusion'])) { // si le poste de la diffusion n'est pas vide
        if (preg_match($regexTitle, $_POST['addSeriesDiffusion'])) { // regex pour la diffusion
            $addSeriesDiffusion = strip_tags(htmlspecialchars($_POST['addSeriesDiffusion'])); // protection pour la chaine de diffusion
            $series->sp_series_pages_diffusion_channel = $addSeriesDiffusion;  // hydratation de mon objet ( diffusion channel )
        } else {
            $errorMessageAddSeries['addSeriesDiffusion'] = 'Merci de rentrer une chaine valide.'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesDiffusion'] = 'Veuillez ajouter la chaîne de diffusion.'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesTrailer'])) {  // si le poste du trailer n'est pas vide
        if (preg_match($regexTitle, $_POST['addSeriesTrailer'])) { // regex pour le trailler
            $addSeriesTrailer = strip_tags(htmlspecialchars($_POST['addSeriesTrailer'])); // protection pour le trailer
            $series->sp_series_pages_trailer = $addSeriesTrailer; // hydratation de mon objet ( trailer )
        } else {
            $errorMessageAddSeries['addSeriesTrailer'] = 'Merci de rentrer un trailer valide.'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesTrailer'] = 'Veuillez ajouter le trailer de la série.'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesImage'])) { // si le poste de l'image n'est pas vide
        if (preg_match($regexTitle, $_POST['addSeriesImage'])) { // regex pour l'image
            $addSeriesImage = strip_tags(htmlspecialchars($_POST['addSeriesImage'])); // protection pour l'image
            $series->sp_series_pages_image = $addSeriesImage;  // hydratation de mon objet ( image )
        } else {
            $errorMessageAddSeries['addSeriesImage'] = 'Merci de rentrer une image valide.'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesImage'] = 'Veuillez ajouter l\'image de la série.'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesFrenchTitle'])) {  // si le poste du titre français n'est pas vide
        if (preg_match($regexTitle, $_POST['addSeriesFrenchTitle'])) { // regex pour les titres français
            $addSeriesFrenchTitle = strip_tags(htmlspecialchars($_POST['addSeriesFrenchTitle'])); // protection pour le titre français
            $series->sp_series_pages_french_title = $addSeriesFrenchTitle; // hydratation de mon objet ( french title )
        } else {
            $errorMessageAddSeries['addSeriesFrenchTitle'] = 'Merci de rentrer un nom valide.'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesFrenchTitle'] = 'Veuillez ajouter le nom français la série.'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesOriginalTitle'])) {  // si le poste du titre original n'est pas vide
        if (preg_match($regexTitle, $_POST['addSeriesOriginalTitle'])) { // regex pour les titres originaux
            $addSeriesOriginalTitle = strip_tags(htmlspecialchars($_POST['addSeriesOriginalTitle'])); // protection pour le titre original
            $series->sp_series_pages_original_title = $addSeriesOriginalTitle; // hydratation de mon objet ( original title )
        } else {
            $errorMessageAddSeries['addSeriesOriginalTitle'] = 'Merci de rentrer un nom valide.'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesOriginalTitle'] = 'Veuillez ajouter le nom original de la série.'; // Message erreur si vide
    }
    if (!empty($_POST['addSeriesOrigin'])) { // si le poste de l'origin n'est pas vide
        if (preg_match($regexTitle, $_POST['addSeriesOrigin'])) { // regex pour l'origine de la série
            $addSeriesOrigin = strip_tags(htmlspecialchars($_POST['addSeriesOrigin'])); // protection pour l'origin
            $series->sp_series_pages_origin = $addSeriesOrigin; // hydratation de mon objet ( origin )
        } else {
            $errorMessageAddSeries['addSeriesOrigin'] = 'Merci de rentrer une origine valide.'; // Message erreur regex
        }
    } else {
        $errorMessageAddSeries['addSeriesOrigin'] = 'Veuillez ajouter l\'origine de la série.'; // Message erreur si vide
    }
    if ($series->addSeries() == TRUE) { // si ma methode est == à true elle s'execute
        $_SESSION['addSeries'] = TRUE;
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
