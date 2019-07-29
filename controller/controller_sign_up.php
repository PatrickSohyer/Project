<?php

// Require des model dont j'ai besoin et de mon tableau des pays 

require '../../model/SP_database.php'; // require de ma database
require '../../model/SP_users.php'; // require de ma table users
require '../../assets/country/country.php'; // require de mon tableau des pays

// Création des regex pour le formulaire 

$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/'; // regex pour le login
$regexMail = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // regex pour le mail
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/'; // regex pour le mot de passe
$country = implode('|', $countryCode); // je regroupe en une string séparer par |
$regexCountry = '/^(' . $country . ')$/ '; // regex pour le pays en prenant 

// Définition des chemins d'accès aux différentes pages

$sourceBanner = '../../assets/images/imgAccueil/BannerPhil.jpg'; // chemin de ma bannière 
$sourceImgNav = '../../assets/images/imgAccueil/imgNavbar.png';  // chemin du logo de la navbar
$accountUser = '../pages/page_account_user.php'; // chemin de la page mon compte
$articlePage = '../pages/page_article_info.php'; // chemin de la page avec un article
$allSeriesPage = '../pages/page_all_series.php?page=1'; // chemain de la page avec toutes les séries
$allArticlesPage = '../pages/page_all_articles.php?page=1'; // chemin de la page avec tout les articles
$mentionsLegalsPage = '../pages/page_mentions_legals.php'; // chemin de la page pour les mentions legals
$infoSeries = '../pages/page_info_series.php'; // chemin de la page avec une séries et ses informations
$signUpPage = '../pages/page_form_sign_up.php'; // chemin de la page pour s'inscrire
$signInPage = '../pages/page_form_sign_in.php'; // chemin de la page pour se connecter
$formAddSeries = '../pages/page_form_add_series.php'; // chemin de la page pour ajouter une série
$suggestSeriesPages = '../pages/page_suggest_series.php'; // chemin de la page pour suggérer une série
$logout = '../../index.php'; // chemin de la page quand on clique sur ce déconnecter
$categoriesSeries = '../pages/page_all_series.php'; // chemin de la page quand on choisis une catégorie

// Instanciation de mon objet Users

$users = new Users();

// Création de mon chemin d'accès à la console admin si je suis connecté en tant qu'administrateur

if (isset($_SESSION['role']) == 'admin') { // si le role de ma session est strictement égal à Admin 
    $pageAdminDelete = '../pages/page_admin_delete.php'; // j'ai accès à cette page
    $pageAdminSuggestSeries = '../pages/page_admin_suggest_series.php'; // j'ai accès à cette page
    $pageAdminUpdate = '../pages/page_admin_update.php'; // j'ai accès à cette page
    $pageAdminUserRole = '../pages/page_admin_user_role.php'; // j'ai accès à cette page
    $pageAdminVerif = '../pages/page_admin_verif.php'; // j'ai accès à cette page
    $pageAdmin = '../pages/page_admin.php'; // j'ai accès à cette page
    $pageFormAddSeries = '../pages/page_form_add_series.php'; // j'ai accès à cette page
    $pageUpdateSeries = '../pages/page_update_series.php'; // j'ai accès à cette page
    $pageFormAddArticle = '../pages/page_form_add_article.php'; // j'ai accès à cette page
    $pageAdminUpdateArticle = '../pages/page_admin_update_article.php'; // j'ai accès à cette page
    $pageUpdateArticle = '../pages/page_update_article.php'; // j'ai accès à cette page
}

// Création de mon Tableau d'erreur

$errorMessage = array();

// condition et vérification de mon inscription

if (COUNT($_POST) > 0) { // si le nombre de post est supérieur à 0
    require_once('../../assets/country/country.php'); // je requie une fois mon tableau des pays
    if (!empty($_POST['pseudoSignUp'])) { // si le post pour le pseudo n'est pas vide
        if (preg_match($regexLogin, $_POST['pseudoSignUp'])) { // vérification des regex sur le pseudo
            $pseudoSignUp = strip_tags(htmlspecialchars($_POST['pseudoSignUp'])); // protection du pseudo
            $users->sp_users_login = $pseudoSignUp; // hydratation de mon objet
        } else {
            $errorMessage['pseudoSignUp'] = 'Merci de rentrer un login valide!'; // message d'erreur regex
        }
    } else {
        $errorMessage['pseudoSignUp'] = 'Merci de renseigner un login.'; // message d'erreur si c'est vide
    }
    if (!empty($_POST['emailSignUp'])) { // si le post pour le mail n'est pas vide
        if (filter_var($_POST['emailSignUp'], FILTER_VALIDATE_EMAIL)) { // je filtre pour vérifier que c'est bien un mail
            $emailSignUp = strip_tags(htmlspecialchars($_POST['emailSignUp'])); // protection du mail
            $users->sp_users_email = $emailSignUp; // hydratation de mon objet
        } else {
            $errorMessage['emailSignUp'] = 'Ceci n\'est pas une adresse mail valide.'; // message d'erreur regex
        }
    } else {
        $errorMessage['emailSignUp'] = 'Merci de renseigner votre Email.'; // message d'erreur si c'est vide
    }
    if (!empty($_POST['countrySignUp'])) { // si le post pour le pays n'est pas vide
        if (preg_match($regexCountry, $_POST['countrySignUp'])) { // vérification des regex sur le pays
            $countrySignUp = strip_tags(htmlspecialchars($_POST['countrySignUp'])); // protection du pays
            $users->sp_users_country = $countrySignUp; // hydratation de mon objet
        } else {
            $errorMessage['countrySignUp'] = 'Votre nationalité n\'est pas valide!'; // message d'erreur regex
        }
    } else {
        $errorMessage['countrySignUp'] = 'Merci de rentrer votre nationalité.'; // message d'erreur si c'est vide
    }
    if (!empty($_POST['passwordSignUp'])) { // si le post pour le mot de passe n'est pas vide
        if (preg_match($regexPassword, $_POST['passwordSignUp'])) { // vérification des regex sur le mot de passe
            $passwordSignUp = strip_tags(htmlspecialchars($_POST['passwordSignUp'])); // protection du mot de passe
            $passwordCryptSignUp = password_hash($passwordSignUp, PASSWORD_BCRYPT); // je hash le mot de passe
            $users->sp_users_password = $passwordCryptSignUp; // hydratation de mon objet
        } else {
            $errorMessage['passwordSignUp'] = 'Mot de passe invalide.'; // message d'erreur regex
        }
    } else {
        $errorMessage['passwordSignUp'] = 'Merci de renseigner votre mot de passe.'; // message d'erreur si c'est vide
    }
    if (!empty($_POST['passwordConfirmationSignUp'])) { // si le post pour la confirmation du mot de passe n'est pas vide
        if (preg_match($regexPassword, $_POST['passwordConfirmationSignUp'])) { // vérification des regex sur la confirmation du mot de passe
            $passwordConfirmationSignUp = strip_tags(htmlspecialchars($_POST['passwordConfirmationSignUp'])); // protection de la confirmation du mot de passe
        } else {
            $errorMessage['passwordConfirmationSignUp'] = 'Mot de passe invalide.'; // message d'erreur regex
        }
    } else {
        $errorMessage['passwordConfirmationSignUp'] = 'Merci de renseigner votre mot de passe.';  // message d'erreur si c'est vide
    }
    // Ma clé privée
    $secret = "6LcWVa4UAAAAAL098oGvqY7YNoo93Q9d48wDEgvK";
    // Paramètre renvoyé par le recaptcha
    $response = $_POST['g-recaptcha-response'];
    // On récupère l'IP de l'utilisateur
    $remoteip = $_SERVER['REMOTE_ADDR'];

    $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
        . $secret
        . "&response=" . $response
        . "&remoteip=" . $remoteip;

    $decode = json_decode(file_get_contents($api_url), true);

    if ($decode['success'] == true) {
        if ($_POST['passwordSignUp'] != $_POST['passwordConfirmationSignUp']) { // si le mot de passe et la confirmation du mot de passe sont différents 
            $errorMessage['passwordConfirmation'] = 'Mot de passe différent'; // message d'erreur mot de passe différent
        } elseif ($_POST['passwordSignUp'] == $_POST['passwordConfirmationSignUp'] && count($errorMessage) === 0) { // si le mot de passe correspond à la confirmation 
            $resultFilterMail = $users->filterMail(); // je filtre les mails pour vérifier qu'il n'est pas déjà rentré dans la BDD
            $resultFilterLogin = $users->filterLogin(); // je filtre le login pour vérifier qu'il n'est pas déjà rentré dans la BDD
            if (count($resultFilterMail) === 0) { // Si le filtre du mail est strictement égal à 0 
                if (count($resultFilterLogin) > 0) { // Si le filtre du login est supérieur à 0
                    $errorMessage['resultFilterLogin'] = 'Ce pseudo est déjà utilisé'; // Message d'erreur pseudo déjà utilisé
                } else {
                    if ($users->addUsers() == TRUE) { // si la methode == true, elle s'execute
                        $success = TRUE;
                    }
                }
            } else {
                $errorMessage['resultFilterMail'] = 'Le mail est déjà utilisé'; // message erreur mail déjà utilisé
            }
        } 
    } else {
        $errorMessage['captcha'] = 'Veuillez cocher la case et ne pas être un robot!';
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
