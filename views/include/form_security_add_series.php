<?php

$regexTitle = '/^^.{2,250}$/';
$regexDescription = '/^.{2,2500}$/';
$regexNumber = '/^[0-9]+$/';

$errorMessageAddSeries = array();

if (count($_POST) > 0) {
    if (!empty($_POST['addSeriesTitle'])) {
        if (preg_match($regexTitle, $_POST['addSeriesTitle'])) {
            $addSeriesTitle = strip_tags(htmlspecialchars($_POST['addSeriesTitle']));
        } else {
            $errorMessageAddSeries['addSeriesTitle'] = 'Le titre ne peut pas contenir plus de 250 caractères.';
        }
    } else {
        $errorMessageAddSeries['addSeriesTitle'] = 'Veuillez ajouter le titre.';
    }
    if (!empty($_POST['addSeriesDescription'])) {
        if (preg_match($regexDescription, $_POST['addSeriesDescription'])) {
            $addSeriesDescription = strip_tags(htmlspecialchars($_POST['addSeriesDescription']));
        } else {
            $errorMessageAddSeries['addSeriesDescription'] = 'La description ne peut pas contenir plus de 2500 caractères';
        }
    } else {
        $errorMessageAddSeries['addSeriesDescription'] = 'Veuillez ajouter la description.';
    }
    if (!empty($_POST['addSeriesSeasonsNumber'])) {
        if (preg_match($regexNumber, $_POST['addSeriesSeasonsNumber'])) {
            $addSeriesSeasonsNumber = strip_tags(htmlspecialchars($_POST['addSeriesSeasonsNumber']));
        } else {
            $errorMessageAddSeries['addSeriesSeasonsNumber'] = 'Merci de rentrer un nombre!';
        }
    } else {
        $errorMessageAddSeries['addSeriesSeasonsNumber'] = 'Veuillez ajouter le nombre de saison.';
    }
    if (!empty($_POST['addSeriesEpisodesNumber'])) {
        if (preg_match($regexNumber, $_POST['addSeriesEpisodesNumber'])) {
            $addSeriesEpisodesNumber = strip_tags(htmlspecialchars($_POST['addSeriesEpisodesNumber']));
        } else {
            $errorMessageAddSeries['addSeriesEpisodesNumber'] = 'Merci de rentrer un nombre!';
        }
    } else {
        $errorMessageAddSeries['addSeriesEpisodesNumber'] = 'Veuillez ajouter le nombre d\'épisode';
    }
    if (!empty($_POST['addSeriesEpisodesDuration'])) {
        if (preg_match($regexNumber, $_POST['addSeriesEpisodesDuration'])) {
            $addSeriesDuration = strip_tags(htmlspecialchars($_POST['addSeriesEpisodesDuration']));
        } else {
            $errorMessageAddSeries['addSeriesEpisodesDuration'] = 'Merci de rentrer un nombre!';
        }
    } else {
        $errorMessageAddSeries['addSeriesEpisodesDuration'] = 'Veuillez ajouter la durer d\'un épisode';
    }
    if (!empty($_POST['addSeriesDiffusion'])) {
        if (preg_match($regexTitle, $_POST['addSeriesDiffusion'])) {
            $addSeriesDiffusion = strip_tags(htmlspecialchars($_POST['addSeriesDiffusion']));
        } else {
            $errorMessageAddSeries['addSeriesDiffusion'] = 'Merci de rentrer une chaine valide!';
        }
    } else {
        $errorMessageAddSeries['addSeriesDiffusion'] = 'Veuillez ajouter la chaîne de diffusion';
    }
}
?>