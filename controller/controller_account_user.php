<?php

// Require des model dont j'ai besoin et du tableau des pays

require '../../model/SP_database.php'; // require de ma classe base de donnée
require '../../model/SP_users.php'; // require de ma classe Users
require '../../model/SP_comments.php'; // require de ma classe Comments
require '../../assets/country/country.php'; // require du tableau des pays
require '../../model/SP_suggest_series.php'; // require de ma class SuggestSeries

// Création des regex pour le formulaire 

$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/'; // regex pour le login
$regexMail = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // regex pour le mail
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/'; // regex pour le mot de passe
$country = implode('|', $countryCode);
$regexCountry = '/^(' . $country . ')$/ '; // regex pour les pays

// Définition des chemins d'accès aux différentes pages

$sourceBanner = '../../assets/images/imgAccueil/BannerPhil.jpg'; // chemin de ma bannière 
$sourceImgNav = '../../assets/images/imgAccueil/imgNavbar.png';  // chemin du logo de la navbar
$accountUser = '../pages/page_account_user.php'; // chemin de la page mon compte
$articlePage = '../pages/page_article_info.php'; // chemin de la page avec un article
$allSeriesPage = '../pages/page_all_series.php?page=1'; // chemain de la page avec toutes les séries
$allArticlesPage = '../pages/page_all_articles.php'; // chemin de la page avec tout les articles
$mentionsLegalsPage = '../pages/page_mentions_legals.php'; // chemin de la page pour les mentions legals
$infoSeries = '../pages/page_info_series.php'; // chemin de la page avec une séries et ses informations
$signUpPage = '../pages/page_form_sign_up.php'; // chemin de la page pour s'inscrire
$signInPage = '../pages/page_form_sign_in.php'; // chemin de la page pour se connecter
$formAddSeries = '../pages/page_form_add_series.php'; // chemin de la page pour ajouter une série
$suggestSeriesPages = '../pages/page_suggest_series.php'; // chemin de la page pour suggérer une série
$logout = '../../index.php'; // chemin de la page quand on clique sur ce déconnecter
$categoriesSeries = '../pages/page_all_series.php'; // chemin de la page quand on choisis une catégorie

// Instanciation de mes objets

$users = new Users();  // instanciation de l'objet Users
$comments = new Comments(); // instanciation de l'objet Comments
$suggestSeries = new SuggestSeries(); // instanciation de l'obhet SuggestSeries

// Création de mon Tableau d'erreur

$errorMessage = array();

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
}

// Vérification et Update pour le Login

if (isset($_POST['modifyLoginValidate'])) { // je vérifie qu'il existe bien modify... dans le post
    if (!empty($_POST['newLogin'])) { // si le post n'est pas vide
        if (preg_match($regexLogin, $_POST['newLogin'])) { // regex pour le login
            $newLogin = strip_tags(htmlspecialchars($_POST['newLogin'])); // protection pour le login
            $users->sp_users_login = $newLogin; // hydratation pour l'objet ( login )
            $users->id = $_SESSION['id'];  // hydratation pour l'objet ( id )
            $resultFilterLogin = $users->filterLogin();  // je lance la method pour filter les login
        } else {
            $errorMessage['newLogin'] = 'Merci de rentrer un pseudonyme valide.'; // message erreur regex
        }
    } else {
        $errorMessage['newLogin'] = 'Merci de renseigner un pseudonyme.'; // message erreur si vide
    }
    if (count($resultFilterLogin) > 0) { // si les résultat du filtre est supérieur à 0
        if ($resultFilterLogin[0]['id'] != $_SESSION['id']) { // si l'id du resultfilter et l'id de la session ne corresponde pas
            $errorMessage['resultFilterLogin'] = 'Ce pseudo est déjà utilisé'; // message erreur 
        }
    } else {
        if ($users->updateLoginUsers() == TRUE) { // sinon l'update ce passe bien
            $succes = TRUE;
            header('Location: page_account_user.php');
        }
    }
}

// Vérification et Update pour l'Email

if (isset($_POST['modifyEmailValidate'])) { // je vérifie qu'il existe bien modify... dans le post
    if (!empty($_POST['newEmail'])) { // si le post n'est pas vide
        if (filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL)) { // je vérifie que c'est bien un mail
            $newEmail = strip_tags(htmlspecialchars($_POST['newEmail'])); // protection du mail
            $users->sp_users_email = $newEmail; // hydratation de l'objet ( email )
            $users->id = $_SESSION['id']; // hydratation de l'objet ( id )
            $resultFilterEmail = $users->filterMail(); // je lance la methode pour filtrer les mail
        } else {
            $errorMessage['newEmail'] = 'Ceci n\'est pas une adresse mail valide.'; // message erreur regex
        }
    } else {
        $errorMessage['newEmail'] = 'Merci de renseigner votre Email.'; // message erreur si vide
    }
    if (count($resultFilterEmail) > 0) { // si les résultat du filtre est supérieur à 0
        if ($resultFilterEmail[0]['id'] != $_SESSION['id']) { // si l'id du resultfilter et l'id de la session ne corresponde pas
            $errorMessage['resultFilterEmail'] = 'Ce mail est déjà utilisé'; // message erreur 
        }
    } else {
        if ($users->updateEmailUsers() == TRUE) { // sinon l'update ce passe bien
            $succes = TRUE;
            header('Location: page_account_user.php');
        }
    }
}

// Vérification et Update pour le pays

if (isset($_POST['modifyCountryValidate'])) { // je vérifie qu'il existe bien modify... dans le post
    if (!empty($_POST['newCountry'])) { // si le post n'est pas vide
        if (preg_match($regexCountry, $_POST['newCountry'])) { // regex pour le pays
            $newCountry = strip_tags(htmlspecialchars($_POST['newCountry'])); // protection du pays
            $users->sp_users_country = $newCountry; // hydratation de l'objet ( pays )
            $users->id = $_SESSION['id']; // hydratation de l'objet ( id )
        } else {
            $errorMessage['newCountry'] = 'Merci de rentrer un pays valide.'; // message erreur regex
        }
    } else {
        $errorMessage['newCountry'] = 'Merci de renseigner un pays.'; // message erreur si vide
    }
    if ($users->updateCountryUsers() == TRUE) { // sinon l'update ce passe bien
        $succes = TRUE;
        header('Location: page_account_user.php');
    }
}

// Vérification et Update pour le mot de passe

if (isset($_POST['modifyPasswordValidate'])) { // je vérifie qu'il existe bien modify... dans le post
    if (!empty($_POST['newPassword'])) { // si le post n'est pas vide
        if (preg_match($regexPassword, $_POST['newPassword'])) { // regex pour le mdp
            $newPassword = strip_tags(htmlspecialchars($_POST['newPassword'])); // protection du mdp
            $passwordCryptSignUp = password_hash($newPassword, PASSWORD_BCRYPT); // hash le mdp
            $users->sp_users_password = $passwordCryptSignUp; // hydratation de l'objet ( mdp )
            $users->id = $_SESSION['id']; // Hydratation de l'objet ( id )
        } else {
            $errorMessage['newPassword'] = 'Mot de passe invalide.'; // message erreur regex
        }
    } else {
        $errorMessage['newPassword'] = 'Merci de renseigner votre mot de passe.'; // message erreur si vide
    }
    if (!empty($_POST['newPasswordConfirm'])) {  // si le post n'est pas vide
        if (preg_match($regexPassword, $_POST['newPasswordConfirm'])) { // regex pour le mdp
            $newConfirmPassword = strip_tags(htmlspecialchars($_POST['newPasswordConfirm'])); // protection du mdp
        } else {
            $errorMessage['newPasswordConfirm'] = 'Mot de passe invalide.'; // message erreur regex
        }
    } else {
        $errorMessage['newPasswordConfirm'] = 'Merci de renseigner votre mot de passe.'; // message erreur si vide
    }
    if ($_POST['newPassword'] != $_POST['newPasswordConfirm']) { // si les mots de passe ne corresponde pas 
        $errorMessage['newPasswordDiff'] = 'Mot de passe différent'; // message erreur
    } else if ($_POST['newPassword'] == $_POST['newPasswordConfirm']) { // si les mots de passe correspondent bien
        $users->updatePasswordUsers() == TRUE; // sinon l'update ce passe bien
        $succes = TRUE;
        header('Location: page_account_user.php');
    }
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}



// Ma condition pour qu'un utilisateur supprime son compte

if (isset($_POST['deleteUsers'])) { // Je vérifie que j'ai bien appuyé sur le boutton supprimé
    $users->id = $_POST['deleteUsers']; // Hydratation de l'id
    $comments->sp_id_users = $_POST['deleteUsers']; // hydratation de sp_id_users des commentaires
    $suggestSeries->sp_id_users = $_POST['deleteUsers']; // hydratation de sp_id_users des suggestions
    if ($comments->updateCommentsUser() && $suggestSeries->deleteSuggestUsers()) { // si les 2 méthodes renvoie TRUE
        if ($users->deleteUsers()) { // j'appel la method qui permet de supprimer une série
            session_destroy(); // je détruis la sessions
            header('Location: ../../index.php');
        }
    } else {
        echo 'Je ne comprends pas la demande';
    }
}


// Hydratation de l'id et appel de ma method

$users->id = $_SESSION['id'];
$usersResult = $users->selectUsers();
