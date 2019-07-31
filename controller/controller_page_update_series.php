<?php

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma base de donnée sp_series_pages
require_once '../../model/SP_suggest_series.php'; // require de ma classe Suggest
require_once '../include/include_page_admin.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Création des regex pour le formulaire 

$regexTitle = '/^.{2,250}$/'; // regex pour le titre
$regexDescription = '/^.{0,8000}$/'; // regex pour la description
$regexNumber = '/^[0-9]+$/'; // regex pour les nombres

// Création de mon Tableau d'erreur

$errorMessageupdateSeries = array();


// Instanciation de mon objet Series

$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();

// Condition pour mettre à jour les séries

if (isset($_GET['id'])) { // je vérifie que id existe bien dans la superglobal GET
    $series->id = $_GET['id']; // hydratation de mon objet ( id )
    $seriesAllSeries = $series->selectSeriesPagesUpdate(); // J'appel ma methode pour selectionner les séries
    if (count($_POST) > 0) { // si le compte des postes est supérieur à 0
        if (!empty($_POST['updateSeriesTitle'])) { // si le poste pour le titre n'est pas vide
            if (preg_match($regexTitle, $_POST['updateSeriesTitle'])) { // regex de mon titre
                $updateSeriesTitle = strip_tags(htmlspecialchars($_POST['updateSeriesTitle'])); // protection de mon titre
                $series->sp_series_pages_title = $updateSeriesTitle; // Hydratation de mon objet ( titre )
            } else {
                $errorMessageupdateSeries['updateSeriesTitle'] = 'Le titre ne peut pas contenir plus de 250 caractères.'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesTitle'] = 'Veuillez ajouter le titre.'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesDescription'])) {  // si le poste pour la description n'est pas vide
            $updateSeriesDescription = strip_tags(htmlspecialchars($_POST['updateSeriesDescription'])); // protection de ma description
            $series->sp_series_pages_description = $updateSeriesDescription; // Hydration de mon objet ( description )
        } else {
            $errorMessageupdateSeries['updateSeriesDescription'] = 'La description ne peut pas contenir plus de 2500 caractères'; // message erreur
        }
        if (!empty($_POST['updateSeriesSeasonsNumber'])) { // si le poste pour le nombre de saison n'est pas vide
            if (preg_match($regexNumber, $_POST['updateSeriesSeasonsNumber'])) { // regex pour les nombres
                $updateSeriesSeasonsNumber = strip_tags(htmlspecialchars($_POST['updateSeriesSeasonsNumber'])); // protection des nombres
                $series->sp_series_pages_number_seasons = $updateSeriesSeasonsNumber; // hydration de mon objet ( Nombre de saison )
            } else {
                $errorMessageupdateSeries['updateSeriesSeasonsNumber'] = 'Merci de rentrer un nombre!'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesSeasonsNumber'] = 'Veuillez ajouter le nombre de saison.';
        }
        if (!empty($_POST['updateSeriesEpisodesNumber'])) { // si le poste pour le nombre d'épisode n'est pas vide
            if (preg_match($regexNumber, $_POST['updateSeriesEpisodesNumber'])) { // regex pour les nombres
                $updateSeriesEpisodesNumber = strip_tags(htmlspecialchars($_POST['updateSeriesEpisodesNumber'])); // protection des nombres
                $series->sp_series_pages_number_episodes = $updateSeriesEpisodesNumber; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesEpisodesNumber'] = 'Merci de rentrer un nombre!'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesEpisodesNumber'] = 'Veuillez ajouter le nombre d\'épisode'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesEpisodesDuration'])) {  // si le poste pour la duré d'un épisode n'est pas vide
            if (preg_match($regexNumber, $_POST['updateSeriesEpisodesDuration'])) { // regex pour les nombres
                $updateSeriesDuration = strip_tags(htmlspecialchars($_POST['updateSeriesEpisodesDuration'])); // protection des nombres
                $series->sp_series_pages_duration_episodes = $updateSeriesDuration; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesEpisodesDuration'] = 'Merci de rentrer un nombre!'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesEpisodesDuration'] = 'Veuillez ajouter la durer d\'un épisode'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesDiffusion'])) { // si le poste pour la chaine de diffusion n'est pas vide
            if (preg_match($regexTitle, $_POST['updateSeriesDiffusion'])) { // regex pour la chaine de diffusion
                $updateSeriesDiffusion = strip_tags(htmlspecialchars($_POST['updateSeriesDiffusion'])); // protection des chaine de diffusion
                $series->sp_series_pages_diffusion_channel = $updateSeriesDiffusion; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesDiffusion'] = 'Merci de rentrer une chaine valide.'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesDiffusion'] = 'Veuillez ajouter la chaîne de diffusion.'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesTrailer'])) { // si le poste pour le trailer n'est pas vide
            if (preg_match($regexTitle, $_POST['updateSeriesTrailer'])) {  // regex pour les trailers
                $updateSeriesTrailer = strip_tags(htmlspecialchars($_POST['updateSeriesTrailer'])); // protection des trailers
                $series->sp_series_pages_trailer = $updateSeriesTrailer; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesTrailer'] = 'Merci de rentrer un trailer valide.'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesTrailer'] = 'Veuillez ajouter le trailer de la série.'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesImage'])) {  // si le poste pour l'image n'est pas vide
            if (preg_match($regexTitle, $_POST['updateSeriesImage'])) {  // regex pour les images
                $updateSeriesImage = strip_tags(htmlspecialchars($_POST['updateSeriesImage'])); // protection des images
                $series->sp_series_pages_image = $updateSeriesImage; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesImage'] = 'Merci de rentrer une image valide.'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesImage'] = 'Veuillez ajouter l\'image de la série.'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesFrenchTitle'])) {  // si le poste pour le titre francais n'est pas vide
            if (preg_match($regexTitle, $_POST['updateSeriesFrenchTitle'])) { // regex pour les titres français
                $updateSeriesFrenchTitle = strip_tags(htmlspecialchars($_POST['updateSeriesFrenchTitle'])); // protection des titres français
                $series->sp_series_pages_french_title = $updateSeriesFrenchTitle; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesFrenchTitle'] = 'Merci de rentrer un nom valide.'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesFrenchTitle'] = 'Veuillez ajouter le nom français la série.'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesOriginalTitle'])) {  // si le poste pour le titre original n'est pas vide
            if (preg_match($regexTitle, $_POST['updateSeriesOriginalTitle'])) { // regex pour les titres originaux
                $updateSeriesOriginalTitle = strip_tags(htmlspecialchars($_POST['updateSeriesOriginalTitle'])); // protection des titres originaux
                $series->sp_series_pages_original_title = $updateSeriesOriginalTitle; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesOriginalTitle'] = 'Merci de rentrer un nom valide.'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesOriginalTitle'] = 'Veuillez ajouter le nom original de la série.'; // message erreur si vide
        }
        if (!empty($_POST['updateSeriesOrigin'])) {  // si le poste pour l'origin n'est pas vide
            if (preg_match($regexTitle, $_POST['updateSeriesOrigin'])) { // regex pour l'origine
                $updateSeriesOrigin = strip_tags(htmlspecialchars($_POST['updateSeriesOrigin'])); // protection des origines
                $series->sp_series_pages_origin = $updateSeriesOrigin; // hydration de mon objet
            } else {
                $errorMessageupdateSeries['updateSeriesOrigin'] = 'Merci de rentrer une origine valide.'; // message erreur regex
            }
        } else {
            $errorMessageupdateSeries['updateSeriesOrigin'] = 'Veuillez ajouter l\'origine de la série.'; // message erreur si vide
        }
        if ($series->updateSeries() == TRUE) { // si ma methode est strictement egal à TRUE alors elle s'execute
            $succes = TRUE;
            header('Location: page_admin_update.php?page=1');
        }
    }
}
