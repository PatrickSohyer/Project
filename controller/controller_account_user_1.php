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
    if (!empty($_POST['newLogin'])) {
        if (preg_match($regexLogin, $_POST['newLogin'])) {
            $newLogin = strip_tags(htmlspecialchars($_POST['newLogin']));
            $users->sp_users_login = $newLogin;
        } else {
            $errorMessage['newLogin'] = 'Merci de rentrer un pseudonyme valide.';
        }
    } else {
        $errorMessage['newLogin'] = 'Merci de renseigner un pseudonyme.';
    }
    if (!empty($_POST['newEmail'])) {
        if (filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL)) {
            $newEmail = strip_tags(htmlspecialchars($_POST['newEmail']));
            $users->sp_users_email = $newEmail;
        } else {
            $errorMessage['newEmail'] = 'Ceci n\'est pas une adresse mail valide.';
        }
    } else {
        $errorMessage['newEmail'] = 'Merci de renseigner votre Email.';
    }
    if (!empty($_POST['newCountry'])) {
        if (preg_match($regexCountry, $_POST['newCountry'])) {
            $newCountry = strip_tags(htmlspecialchars($_POST['newCountry']));
            $users->sp_users_country = $newCountry;
        } else {
            $errorMessage['newCountry'] = 'Votre nationalité n\'est pas valide!';
        }
    } else {
        $errorMessage['newCountry'] = 'Merci de rentrer votre nationalité.';
    }
    if (!empty($_POST['newPassword'])) {
        if (preg_match($regexPassword, $_POST['newPassword'])) {
            $newPassword = strip_tags(htmlspecialchars($_POST['newPassword']));
            $passwordCryptSignUp = password_hash($newPassword, PASSWORD_BCRYPT);
            $users->sp_users_password = $passwordCryptSignUp;
        } else {
            $errorMessage['newPassword'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessage['newPassword'] = 'Merci de renseigner votre mot de passe.';
    }
    if (!empty($_POST['newConfirmPassword'])) {
        if (preg_match($regexPassword, $_POST['newConfirmPassword'])) {
            $newConfirmPassword = strip_tags(htmlspecialchars($_POST['newConfirmPassword']));
        } else {
            $errorMessage['newConfirmPassword'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessage['newConfirmPassword'] = 'Merci de renseigner votre mot de passe.';
    }
    if ($_POST['newPassword'] != $_POST['newConfirmPassword']) {
        $errorMessage['newConfirmPassword'] = 'Mot de passe différent';
    } else if ($_POST['newPassword'] == $_POST['newConfirmPassword']) {
        $resultFilterMail = $users->filterMail();
        $resultFilterLogin = $users->filterLogin();
        if (count($resultFilterMail) === 0) {
            if (count($resultFilterLogin) > 0 && $resultFilterLogin['id'] != $_SESSION['id']) {
                $errorMessage['resultFilterLogin'] = 'Ce pseudo est déjà utilisé';
            } else if (count($resultFilterLogin) === 0) {
                if (count($resultFilterMail) > 0 && $resultFilterMail['id'] != $_SESSION['id']) {
                    $errorMessage['resultFilterMail'] = 'Ce mail est déjà utilisé';
                } else {
                    if ($users->updateUsers() == TRUE) {
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
}

    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: ../index.php');
    }

    if (isset($_GET['deleteID'])) {
        $users->deleteUsers();
    }

    $users->id = $_SESSION['id'];
    $usersResult = $users->selectUsers();
    