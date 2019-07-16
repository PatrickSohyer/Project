<?php

// Require des model dont j'ai besoin

require '../../model/SP_database.php';
require '../../model/SP_series_pages.php';

// Création des regex pour le formulaire 

$regexTitle = '/^^.{2,250}$/';
$regexDescription = '/^.{0,8000}$/';
$regexNumber = '/^[0-9]+$/';

// Création de mon Tableau d'erreur

$errorMessageAddSeries = array();

// Définition des chemins d'accès aux différentes pages

$sourceBanner = '../../assets/images/imgAccueil/BannerPhil.jpg';
$sourceImgNav = '../../assets/images/imgAccueil/imgNavbar.png';
$accountUser = '../pages/page_account_user.php';
$articlePage = '../pages/page_article_info.php';
$allSeriesPage = '../pages/page_all_series.php?page=1';
$allArticlesPage = '../pages/page_all_articles.php';
$mentionsLegalsPage = '../pages/page_mentions_legals.php';
$infoSeries = '../pages/page_info_series.php';
$signUpPage = '../pages/page_form_sign_up.php';
$signInPage = '../pages/page_form_sign_in.php';
$formAddSeries = '../pages/page_form_add_series.php';
$suggestSeriesPages = '../pages/page_suggest_series.php';
$logout = '../../index.php';
$categoriesSeries = '../pages/page_all_series.php';

// Création de mon chemin d'accès à la console admin si je suis connecté en tant qu'administrateur

if (isset($_SESSION['role']) == 'admin') {
    $pageAdmin = '../pages/page_admin.php';
}

// Création de mon objet Series

$series = new Series();

// Vérification de mon formulaire pour ajouter une séries

if (count($_POST) > 0) {
    if (!empty($_POST['addSeriesTitle'])) {
        if (preg_match($regexTitle, $_POST['addSeriesTitle'])) {
            $addSeriesTitle = strip_tags(htmlspecialchars($_POST['addSeriesTitle']));
            $series->sp_series_pages_title = $addSeriesTitle;
        } else {
            $errorMessageAddSeries['addSeriesTitle'] = 'Le titre ne peut pas contenir plus de 250 caractères.';
        }
    } else {
        $errorMessageAddSeries['addSeriesTitle'] = 'Veuillez ajouter le titre.';
    }
    if (!empty($_POST['addSeriesDescription'])) {
        $addSeriesDescription = strip_tags(htmlspecialchars($_POST['addSeriesDescription']));
        $series->sp_series_pages_description = $addSeriesDescription;
    } else {
        $errorMessageAddSeries['addSeriesDescription'] = 'La description ne peut pas contenir plus de 2500 caractères';
    }
    if (!empty($_POST['addSeriesSeasonsNumber'])) {
        if (preg_match($regexNumber, $_POST['addSeriesSeasonsNumber'])) {
            $addSeriesSeasonsNumber = strip_tags(htmlspecialchars($_POST['addSeriesSeasonsNumber']));
            $series->sp_series_pages_number_seasons = $addSeriesSeasonsNumber;
        } else {
            $errorMessageAddSeries['addSeriesSeasonsNumber'] = 'Merci de rentrer un nombre!';
        }
    } else {
        $errorMessageAddSeries['addSeriesSeasonsNumber'] = 'Veuillez ajouter le nombre de saison.';
    }
    if (!empty($_POST['addSeriesEpisodesNumber'])) {
        if (preg_match($regexNumber, $_POST['addSeriesEpisodesNumber'])) {
            $addSeriesEpisodesNumber = strip_tags(htmlspecialchars($_POST['addSeriesEpisodesNumber']));
            $series->sp_series_pages_number_episodes = $addSeriesEpisodesNumber;
        } else {
            $errorMessageAddSeries['addSeriesEpisodesNumber'] = 'Merci de rentrer un nombre!';
        }
    } else {
        $errorMessageAddSeries['addSeriesEpisodesNumber'] = 'Veuillez ajouter le nombre d\'épisode';
    }
    if (!empty($_POST['addSeriesEpisodesDuration'])) {
        if (preg_match($regexNumber, $_POST['addSeriesEpisodesDuration'])) {
            $addSeriesDuration = strip_tags(htmlspecialchars($_POST['addSeriesEpisodesDuration']));
            $series->sp_series_pages_duration_episodes = $addSeriesDuration;
        } else {
            $errorMessageAddSeries['addSeriesEpisodesDuration'] = 'Merci de rentrer un nombre!';
        }
    } else {
        $errorMessageAddSeries['addSeriesEpisodesDuration'] = 'Veuillez ajouter la durer d\'un épisode';
    }
    if (!empty($_POST['addSeriesDiffusion'])) {
        if (preg_match($regexTitle, $_POST['addSeriesDiffusion'])) {
            $addSeriesDiffusion = strip_tags(htmlspecialchars($_POST['addSeriesDiffusion']));
            $series->sp_series_pages_diffusion_channel = $addSeriesDiffusion;
        } else {
            $errorMessageAddSeries['addSeriesDiffusion'] = 'Merci de rentrer une chaine valide.';
        }
    } else {
        $errorMessageAddSeries['addSeriesDiffusion'] = 'Veuillez ajouter la chaîne de diffusion.';
    }
    if (!empty($_POST['addSeriesTrailer'])) {
        if (preg_match($regexTitle, $_POST['addSeriesTrailer'])) {
            $addSeriesTrailer = strip_tags(htmlspecialchars($_POST['addSeriesTrailer']));
            $series->sp_series_pages_trailer = $addSeriesTrailer;
        } else {
            $errorMessageAddSeries['addSeriesTrailer'] = 'Merci de rentrer un trailer valide.';
        }
    } else {
        $errorMessageAddSeries['addSeriesTrailer'] = 'Veuillez ajouter le trailer de la série.';
    }
    if (!empty($_POST['addSeriesImage'])) {
        if (preg_match($regexTitle, $_POST['addSeriesImage'])) {
            $addSeriesImage = strip_tags(htmlspecialchars($_POST['addSeriesImage']));
            $series->sp_series_pages_image = $addSeriesImage;
        } else {
            $errorMessageAddSeries['addSeriesImage'] = 'Merci de rentrer une image valide.';
        }
    } else {
        $errorMessageAddSeries['addSeriesImage'] = 'Veuillez ajouter l\'image de la série.';
    }
    if (!empty($_POST['addSeriesFrenchTitle'])) {
        if (preg_match($regexTitle, $_POST['addSeriesFrenchTitle'])) {
            $addSeriesFrenchTitle = strip_tags(htmlspecialchars($_POST['addSeriesFrenchTitle']));
            $series->sp_series_pages_french_title = $addSeriesFrenchTitle;
        } else {
            $errorMessageAddSeries['addSeriesFrenchTitle'] = 'Merci de rentrer un nom valide.';
        }
    } else {
        $errorMessageAddSeries['addSeriesFrenchTitle'] = 'Veuillez ajouter le nom français la série.';
    }
    if (!empty($_POST['addSeriesOriginalTitle'])) {
        if (preg_match($regexTitle, $_POST['addSeriesOriginalTitle'])) {
            $addSeriesOriginalTitle = strip_tags(htmlspecialchars($_POST['addSeriesOriginalTitle']));
            $series->sp_series_pages_original_title = $addSeriesOriginalTitle;
        } else {
            $errorMessageAddSeries['addSeriesOriginalTitle'] = 'Merci de rentrer un nom valide.';
        }
    } else {
        $errorMessageAddSeries['addSeriesOriginalTitle'] = 'Veuillez ajouter le nom original de la série.';
    }
    if (!empty($_POST['addSeriesOrigin'])) {
        if (preg_match($regexTitle, $_POST['addSeriesOrigin'])) {
            $addSeriesOrigin = strip_tags(htmlspecialchars($_POST['addSeriesOrigin']));
            $series->sp_series_pages_origin = $addSeriesOrigin;
        } else {
            $errorMessageAddSeries['addSeriesOrigin'] = 'Merci de rentrer une origine valide.';
        }
    } else {
        $errorMessageAddSeries['addSeriesOrigin'] = 'Veuillez ajouter l\'origine de la série.';
    }
    if ($series->addSeries() == TRUE) {
        $_SESSION['addSeries'] = TRUE;

        header('Location: page_admin_verif.php');
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}