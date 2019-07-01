<?php

$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/';
$regexMail = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/';
$country = implode('|', $countryCode);
$regexCountry = '/^(' . $country . ')$/ ';

$errorMessage = array();

if (count($_POST) > 0) {
    if (!empty($_POST['pseudoSignUp'])) {
        if (preg_match($regexLogin, $_POST['pseudoSignUp'])) {
            $pseudoSignUp = strip_tags(htmlspecialchars($_POST['pseudoSignUp']));
        } else {
            $errorMessage['pseudoSignUp'] = 'Merci de rentrer un pseudonyme valide.';
        }
    } else {
        $errorMessage['pseudoSignUp'] = 'Merci de renseigner un pseudonyme.';
    }
    if (!empty($_POST['emailSignUp'])) {
        if (filter_var($_POST['emailSignUp'], FILTER_VALIDATE_EMAIL)) {
            $emailSignUp = strip_tags(htmlspecialchars($_POST['emailSignUp']));
        } else {
            $errorMessage['emailSignUp'] = 'Ceci n\'est pas une adresse mail valide.';
        }
    } else {
        $errorMessage['emailSignUp'] = 'Merci de renseigner votre Email.';
    }
    if (!empty($_POST['countrySignUp'])) {
        if (preg_match($regexCountry, $_POST['countrySignUp'])) {
            $countrySignUp = strip_tags(htmlspecialchars($_POST['countrySignUp']));
        } else {
            $errorMessage['countrySignUp'] = 'Votre nationalité n\'est pas valide!';
        }
    } else {
        $errorMessage['countrySignUp'] = 'Merci de rentrer votre nationalité.';
    }
    if (!empty($_POST['passwordSignUp'])) {
        if (preg_match($regexPassword, $_POST['passwordSignUp'])) {
            $address = strip_tags(htmlspecialchars($_POST['passwordSignUp']));
        } else {
            $errorMessage['passwordSignUp'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessage['passwordSignUp'] = 'Merci de renseigner votre mot de passe.';
    }
    if (!empty($_POST['passwordConfirmationSignUp'])) {
        if (preg_match($regexPassword, $_POST['passwordConfirmationSignUp'])) {
            $address = strip_tags(htmlspecialchars($_POST['passwordConfirmationSignUp']));
        } else {
            $errorMessage['passwordConfirmationSignUp'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessage['passwordConfirmationSignUp'] = 'Merci de renseigner votre mot de passe.';
        }
    }if ($_POST['passwordSignUp'] != $_POST['passwordConfirmationSignUp']) {
        $errorMessage['passwordConfirmation'] = 'Mot de passe différent'; 
    }
?>