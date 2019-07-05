<?php

$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/';
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/';

$sourceTest = '../../assets/images/imgAccueil/BannerPhil.jpg';
$accountUser = '../pages/page_account_user.php';
$articlePage = '../pages/page_article_info.php';
$allSeriesPage = '../pages/page_all_series.php';
$allArticlesPage = '../pages/page_all_articles.php';
$mentionsLegalsPage = '../pages/page_mentions_legals.php';
$infoSeries = '../pages/page_info_series.php';
$signUpPage = '../pages/page_form_sign_up.php';
$signInPage = '../pages/page_form_sign_in.php';
$formAddSeries = '../pages/page_form_add_series.php';


$errorMessageSignIn = array();

if (COUNT($_POST) > 0) {
    if (!empty($_POST['loginSignIn'])) {
        if (preg_match($regexLogin, $_POST['loginSignIn'])) {
            $loginSignIn = strip_tags(htmlspecialchars($_POST['loginSignIn']));
        } else {
            $errorMessageSignIn['loginSignIn'] = 'Le pseudo n\'est pas bon.';
        }
    } else {
        $errorMessageSignIn['loginSignIn'] = 'Merci de renseigner un pseudonyme.';
    }
    if (!empty($_POST['passwordSignIn'])) {
        if (preg_match($regexPassword, $_POST['passwordSignIn'])) {
            $passwordSignIn = strip_tags(htmlspecialchars($_POST['passwordSignIn']));
        } else {
            $errorMessageSignIn['passwordSignIn'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessageSignIn['passwordSignIn'] = 'Merci de renseigner votre mot de passe.';
    }
}