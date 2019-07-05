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

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
}

if (isset($_GET['deleteID'])) {
    $users->deleteUsers();
}

$users->id = $_SESSION['id'];
$usersResult = $users->selectUsers();
