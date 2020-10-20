<?php

// Require des model dont j'ai besoin et de mon tableau des pays 

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_users.php'; // require de ma table users
require_once '../../assets/country/country.php'; // require de mon tableau des pays
require_once '../include/include_page_admin_user.php'; // require de mes chemins pour la page admin
require_once '../include/include_route.php'; // require de mes chemin d'accès

// Création des regex pour le formulaire 

$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/'; // regex pour le login
$regexMail = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // regex pour le mail
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/'; // regex pour le mot de passe
$country = implode('|', $countryCode); // je regroupe en une string séparer par |
$regexCountry = '/^(' . $country . ')$/ '; // regex pour le pays en prenant 

// Instanciation de mon objet Users

$users = new Users();

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
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
