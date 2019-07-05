<?php

require '../../model/SP_database.php';
require '../../model/SP_users.php';
require'../../assets/country/country.php';
$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/';
$regexMail = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/';
$country = implode('|', $countryCode);
$regexCountry = '/^(' . $country . ')$/ ';

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
$logout = '../../index.php';

$users = new Users();


$errorMessage = array();

if (COUNT($_POST) > 0) {
    require_once ('../../assets/country/country.php');
    if (!empty($_POST['pseudoSignUp'])) {
        if (preg_match($regexLogin, $_POST['pseudoSignUp'])) {
            $pseudoSignUp = strip_tags(htmlspecialchars($_POST['pseudoSignUp']));
            $users->sp_users_login = $pseudoSignUp;
        } else {
            $errorMessage['pseudoSignUp'] = 'Merci de rentrer un pseudonyme valide.';
        }
    } else {
        $errorMessage['pseudoSignUp'] = 'Merci de renseigner un pseudonyme.';
    }
    if (!empty($_POST['emailSignUp'])) {
        if (filter_var($_POST['emailSignUp'], FILTER_VALIDATE_EMAIL)) {
            $emailSignUp = strip_tags(htmlspecialchars($_POST['emailSignUp']));
            $users->sp_users_email = $emailSignUp;
        } else {
            $errorMessage['emailSignUp'] = 'Ceci n\'est pas une adresse mail valide.';
        }
    } else {
        $errorMessage['emailSignUp'] = 'Merci de renseigner votre Email.';
    }
    if (!empty($_POST['countrySignUp'])) {
        if (preg_match($regexCountry, $_POST['countrySignUp'])) {
            $countrySignUp = strip_tags(htmlspecialchars($_POST['countrySignUp']));
            $users->sp_users_country = $countrySignUp;
        } else {
            $errorMessage['countrySignUp'] = 'Votre nationalité n\'est pas valide!';
        }
    } else {
        $errorMessage['countrySignUp'] = 'Merci de rentrer votre nationalité.';
    }
    if (!empty($_POST['passwordSignUp'])) {
        if (preg_match($regexPassword, $_POST['passwordSignUp'])) {
            $passwordSignUp = strip_tags(htmlspecialchars($_POST['passwordSignUp']));
            $passwordCryptSignUp = password_hash($passwordSignUp, PASSWORD_BCRYPT);
            $users->sp_users_password = $passwordCryptSignUp;
        } else {
            $errorMessage['passwordSignUp'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessage['passwordSignUp'] = 'Merci de renseigner votre mot de passe.';
    }
    if (!empty($_POST['passwordConfirmationSignUp'])) {
        if (preg_match($regexPassword, $_POST['passwordConfirmationSignUp'])) {
            $passwordConfirmationSignUp = strip_tags(htmlspecialchars($_POST['passwordConfirmationSignUp']));
        } else {
            $errorMessage['passwordConfirmationSignUp'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessage['passwordConfirmationSignUp'] = 'Merci de renseigner votre mot de passe.';
    }
    if ($_POST['passwordSignUp'] != $_POST['passwordConfirmationSignUp']) {
        $errorMessage['passwordConfirmation'] = 'Mot de passe différent';
    } else if ($_POST['passwordSignUp'] == $_POST['passwordConfirmationSignUp']) {
        $resultFilterMail = $users->filterMail();
        $resultFilterLogin = $users->filterLogin();
        if (count($resultFilterMail) === 0) {
            if (count($resultFilterLogin) > 0) {
                $errorMessage['resultFilterLogin'] = 'Ce pseudo est déjà utilisé';
            } else {
                if ($users->addUsers() == TRUE) {
                    $succes = TRUE;
                }
            }
        } else {
            $errorMessage['resultFilterMail'] = 'Le mail est déjà utilisé';
        }
    } else {
        $errorMessage['errorInconnu'] = 'Une erreur est survenue';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}
    