<?php

require '../../model/SP_database.php';
require '../../model/SP_users.php';
$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/';
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/';

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
if (isset($_SESSION['role']) == 'admin'){
    $pageAdminVerif = '../pages/page_admin_verif.php';
    $pageAdminDelete = '../pages/page_admin_delete.php';
}

$users = new Users();


$errorMessageSignIn = array();

if (COUNT($_POST) > 0) {
    if (!empty($_POST['loginSignIn'])) {
        if (preg_match($regexLogin, $_POST['loginSignIn'])) {
            $loginSignIn = strip_tags(htmlspecialchars($_POST['loginSignIn']));
            $users->sp_users_login = $loginSignIn;
        } else {
            $errorMessageSignIn['loginSignIn'] = 'Le pseudo n\'est pas bon.';
        }
    } else {
        $errorMessageSignIn['loginSignIn'] = 'Merci de renseigner un pseudonyme.';
    }
    if (!empty($_POST['passwordSignIn'])) {
        if (preg_match($regexPassword, $_POST['passwordSignIn'])) {
            $passwordSignIn = strip_tags(htmlspecialchars($_POST['passwordSignIn']));
            $users->sp_users_password = $passwordSignIn;
        } else {
            $errorMessageSignIn['passwordSignIn'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessageSignIn['passwordSignIn'] = 'Merci de renseigner votre mot de passe.';
    } 
    $usersFilter = $users->filterLogin();
    if (count($usersFilter) > 0) {
        if (password_verify($passwordSignIn, $usersFilter[0]['sp_users_password'])) {
            $_SESSION['login'] = $loginSignIn;
            $_SESSION['id'] = $usersFilter[0]['id'];
            $_SESSION['role'] = $usersFilter[0]['sp_users_role'];
            if ($_SESSION['role'] == 'admin') {
                header('Location: ../../index.php');
            }
        } else {
            $errorMessageSignIn['passwordConnect'] = 'Mot de passe incorrect';
        }
        
    } else {
        $errorMessageSignIn['loginExist'] = 'Le login est incorrect';
    }
}
    
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}