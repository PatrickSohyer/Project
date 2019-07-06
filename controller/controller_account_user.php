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



if (isset($_POST['modifyLoginValidate'])) {
    if (!empty($_POST['newLogin'])) {
        if (preg_match($regexLogin, $_POST['newLogin'])) {
            $newLogin = strip_tags(htmlspecialchars($_POST['newLogin']));
            $users->sp_users_login = $newLogin;
            $users->id = $_SESSION['id'];
            $resultFilterLogin = $users->filterLogin();
        } else {
            $errorMessage['newLogin'] = 'Merci de rentrer un pseudonyme valide.';
        }
    } else {
        $errorMessage['newLogin'] = 'Merci de renseigner un pseudonyme.';
    } if (count($resultFilterLogin) > 0) {
        if ($resultFilterLogin['id'] != $_SESSION['id']) {
            $errorMessage['resultFilterLogin'] = 'Ce pseudo est déjà utilisé';
        }
    } else {
        if ($users->updateLoginUsers() == TRUE) {
            $succes = TRUE;
            header('Location: page_account_user.php');
        }
    }
}

if (isset($_POST['modifyEmailValidate'])) {
    if (!empty($_POST['newEmail'])) {
        if (filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL)) {
            $newEmail = strip_tags(htmlspecialchars($_POST['newEmail']));
            $users->sp_users_email = $newEmail;
            $users->id = $_SESSION['id'];
            $resultFilterEmail = $users->filterMail();
        } else {
            $errorMessage['newEmail'] = 'Ceci n\'est pas une adresse mail valide.';
        }
    } else {
        $errorMessage['newEmail'] = 'Merci de renseigner votre Email.';
    } if (count($resultFilterEmail) > 0) {
        if ($resultFilterEmail['id'] != $_SESSION['id']) {
            $errorMessage['resultFilterEmail'] = 'Ce mail est déjà utilisé';
        }
    } else {
        if ($users->updateEmailUsers() == TRUE) {
            $succes = TRUE;
            header('Location: page_account_user.php');
        }
    }
}

if (isset($_POST['modifyCountryValidate'])) {
    if (!empty($_POST['newCountry'])) {
        if (preg_match($regexCountry, $_POST['newCountry'])) {
            $newCountry = strip_tags(htmlspecialchars($_POST['newCountry']));
            $users->sp_users_country = $newCountry;
            $users->id = $_SESSION['id'];
        } else {
            $errorMessage['newCountry'] = 'Merci de rentrer un pays valide.';
        }
    } else {
        $errorMessage['newCountry'] = 'Merci de renseigner un pays.';
    } if ($users->updateCountryUsers() == TRUE) {
        $succes = TRUE;
        header('Location: page_account_user.php');
    }
}

if (isset($_POST['modifyPasswordValidate'])) {
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
    if (!empty($_POST['newPasswordConfirm'])) {
        if (preg_match($regexPassword, $_POST['newPasswordConfirm'])) {
            $newConfirmPassword = strip_tags(htmlspecialchars($_POST['newPasswordConfirm']));
        } else {
            $errorMessage['newPasswordConfirm'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessage['newPasswordConfirm'] = 'Merci de renseigner votre mot de passe.';
    }
    if ($_POST['newPassword'] != $_POST['newPasswordConfirm']) {
        $errorMessage['newPasswordDiff'] = 'Mot de passe différent';
    } else if ($_POST['newPassword'] == $_POST['newPasswordConfirm']) {
        $users->updatePasswordUsers() == TRUE;
            $succes = TRUE;
            header('Location: page_account_user.php');
    }
}



if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
}

if (isset($_GET['deleteID'])) {
    $users->id = $_SESSION['id'];
    $users->deleteUsers();
    session_destroy();
    header('Location: ../../index.php');
}


$users->id = $_SESSION['id'];
$usersResult = $users->selectUsers();
