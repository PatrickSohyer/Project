<?php

require '../../model/SP_database.php';
require '../../model/SP_series_pages.php';

$regexTitle = '/^^.{2,250}$/';
$regexDescription = '/^.{0,8000}$/';
$regexNumber = '/^[0-9]+$/';

$errorMessageupdateSeries = array();

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
$logout = '../../index.php';
$categoriesSeries = '../pages/page_all_series.php';

if (isset($_SESSION['role']) == 'admin') {
    $pageAdmin = '../pages/page_admin.php';
}

$series = new Series();


if (isset($_GET['id'])) {
    $series->id = $_GET['id'];
    $seriesAllSeries = $series->selectSeriesPagesUpdate();
    if (count($_POST) > 0) {
        if (!empty($_POST['updateSeriesTitle'])) {
            if (preg_match($regexTitle, $_POST['updateSeriesTitle'])) {
                $updateSeriesTitle = strip_tags(htmlspecialchars($_POST['updateSeriesTitle']));
                $series->sp_series_pages_title = $updateSeriesTitle;
            } else {
                $errorMessageupdateSeries['updateSeriesTitle'] = 'Le titre ne peut pas contenir plus de 250 caractères.';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesTitle'] = 'Veuillez ajouter le titre.';
        }
        if (!empty($_POST['updateSeriesDescription'])) {
            $updateSeriesDescription = strip_tags(htmlspecialchars($_POST['updateSeriesDescription']));
            $series->sp_series_pages_description = $updateSeriesDescription;
        } else {
            $errorMessageupdateSeries['updateSeriesDescription'] = 'La description ne peut pas contenir plus de 2500 caractères';
        }
        if (!empty($_POST['updateSeriesSeasonsNumber'])) {
            if (preg_match($regexNumber, $_POST['updateSeriesSeasonsNumber'])) {
                $updateSeriesSeasonsNumber = strip_tags(htmlspecialchars($_POST['updateSeriesSeasonsNumber']));
                $series->sp_series_pages_number_seasons = $updateSeriesSeasonsNumber;
            } else {
                $errorMessageupdateSeries['updateSeriesSeasonsNumber'] = 'Merci de rentrer un nombre!';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesSeasonsNumber'] = 'Veuillez ajouter le nombre de saison.';
        }
        if (!empty($_POST['updateSeriesEpisodesNumber'])) {
            if (preg_match($regexNumber, $_POST['updateSeriesEpisodesNumber'])) {
                $updateSeriesEpisodesNumber = strip_tags(htmlspecialchars($_POST['updateSeriesEpisodesNumber']));
                $series->sp_series_pages_number_episodes = $updateSeriesEpisodesNumber;
            } else {
                $errorMessageupdateSeries['updateSeriesEpisodesNumber'] = 'Merci de rentrer un nombre!';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesEpisodesNumber'] = 'Veuillez ajouter le nombre d\'épisode';
        }
        if (!empty($_POST['updateSeriesEpisodesDuration'])) {
            if (preg_match($regexNumber, $_POST['updateSeriesEpisodesDuration'])) {
                $updateSeriesDuration = strip_tags(htmlspecialchars($_POST['updateSeriesEpisodesDuration']));
                $series->sp_series_pages_duration_episodes = $updateSeriesDuration;
            } else {
                $errorMessageupdateSeries['updateSeriesEpisodesDuration'] = 'Merci de rentrer un nombre!';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesEpisodesDuration'] = 'Veuillez ajouter la durer d\'un épisode';
        }
        if (!empty($_POST['updateSeriesDiffusion'])) {
            if (preg_match($regexTitle, $_POST['updateSeriesDiffusion'])) {
                $updateSeriesDiffusion = strip_tags(htmlspecialchars($_POST['updateSeriesDiffusion']));
                $series->sp_series_pages_diffusion_channel = $updateSeriesDiffusion;
            } else {
                $errorMessageupdateSeries['updateSeriesDiffusion'] = 'Merci de rentrer une chaine valide.';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesDiffusion'] = 'Veuillez ajouter la chaîne de diffusion.';
        }
        if (!empty($_POST['updateSeriesTrailer'])) {
            if (preg_match($regexTitle, $_POST['updateSeriesTrailer'])) {
                $updateSeriesTrailer = strip_tags(htmlspecialchars($_POST['updateSeriesTrailer']));
                $series->sp_series_pages_trailer = $updateSeriesTrailer;
            } else {
                $errorMessageupdateSeries['updateSeriesTrailer'] = 'Merci de rentrer un trailer valide.';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesTrailer'] = 'Veuillez ajouter le trailer de la série.';
        }
        if (!empty($_POST['updateSeriesImage'])) {
            if (preg_match($regexTitle, $_POST['updateSeriesImage'])) {
                $updateSeriesImage = strip_tags(htmlspecialchars($_POST['updateSeriesImage']));
                $series->sp_series_pages_image = $updateSeriesImage;
            } else {
                $errorMessageupdateSeries['updateSeriesImage'] = 'Merci de rentrer une image valide.';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesImage'] = 'Veuillez ajouter l\'image de la série.';
        }
        if (!empty($_POST['updateSeriesFrenchTitle'])) {
            if (preg_match($regexTitle, $_POST['updateSeriesFrenchTitle'])) {
                $updateSeriesFrenchTitle = strip_tags(htmlspecialchars($_POST['updateSeriesFrenchTitle']));
                $series->sp_series_pages_french_title = $updateSeriesFrenchTitle;
            } else {
                $errorMessageupdateSeries['updateSeriesFrenchTitle'] = 'Merci de rentrer un nom valide.';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesFrenchTitle'] = 'Veuillez ajouter le nom français la série.';
        }
        if (!empty($_POST['updateSeriesOriginalTitle'])) {
            if (preg_match($regexTitle, $_POST['updateSeriesOriginalTitle'])) {
                $updateSeriesOriginalTitle = strip_tags(htmlspecialchars($_POST['updateSeriesOriginalTitle']));
                $series->sp_series_pages_original_title = $updateSeriesOriginalTitle;
            } else {
                $errorMessageupdateSeries['updateSeriesOriginalTitle'] = 'Merci de rentrer un nom valide.';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesOriginalTitle'] = 'Veuillez ajouter le nom original de la série.';
        }
        if (!empty($_POST['updateSeriesOrigin'])) {
            if (preg_match($regexTitle, $_POST['updateSeriesOrigin'])) {
                $updateSeriesOrigin = strip_tags(htmlspecialchars($_POST['updateSeriesOrigin']));
                $series->sp_series_pages_origin = $updateSeriesOrigin;
            } else {
                $errorMessageupdateSeries['updateSeriesOrigin'] = 'Merci de rentrer une origine valide.';
            }
        } else {
            $errorMessageupdateSeries['updateSeriesOrigin'] = 'Veuillez ajouter l\'origine de la série.';
        }
        if ($series->updateSeries() == TRUE) {
            $succes = TRUE;
            header('Location: page_admin_update.php?page=1');
        }
    }
}
