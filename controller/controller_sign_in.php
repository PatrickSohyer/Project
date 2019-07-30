<?php

// Require des model dont j'ai besoin 

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_users.php'; // require de ma table users
require_once '../include/include_page_admin_user.php';
require_once '../include/include_route.php';

// Création des regex pour le formulaire 

$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/'; // regex pour le login
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/'; // regex pour le mot de passe


// Instanciation de mon objet Users

$users = new Users();

// Création de mon Tableau d'erreur

$errorMessageSignIn = array();

// Condition pour la vérification de mon formulaire et pour la connexion

if (COUNT($_POST) > 0) { // si le nombre de post est supérieur à 0
    $loginSignIn = strip_tags(htmlspecialchars($_POST['loginSignIn'])); // protection du login
    $users->sp_users_login = $loginSignIn; // hydratation de mon objet
    $passwordSignIn = strip_tags(htmlspecialchars($_POST['passwordSignIn'])); // protection du mot de passe
    $users->sp_users_password = $passwordSignIn; // hydratation de mon objet
    $usersFilter = $users->filterLogin(); // j'appel ma methode vérifier les logins
    if (count($usersFilter) > 0) { // si le nombre de login est supérieur à 0 ( donc si il existe)
        if (password_verify($passwordSignIn, $usersFilter[0]['sp_users_password'])) { // j'utilise password_verify pour dehasher le mot de passe, et je le vérifie avec usersFilter qui un tableau multidimensionnels, c'est ça qui va me permettre de me connecter
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
                $_SESSION['login'] = $loginSignIn; // Je définis mon login de session 
                $_SESSION['id'] = $usersFilter[0]['id']; // Je définis mon id de session
                $_SESSION['role'] = $usersFilter[0]['sp_users_role']; // Je définis mon role de session
                if ($_SESSION['role'] == 'admin') { // si le role de ma session est strictement égal à Admin
                    header('Location: ../../index.php'); // alors il balance le chemin la console admin
                }
            } else {
                $errorMessageSignIn['captcha'] = 'Veuillez cocher la case et ne pas être un robot!';
            }
        } else {
            $errorMessageSignIn['passwordConnect'] = 'Mot de passe incorrect'; // si le mot de passe ne correspond pas
        }
    } else {
        $errorMessageSignIn['loginExist'] = 'Le login est incorrect'; // si le Login n'existe pas
    }
}



// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
