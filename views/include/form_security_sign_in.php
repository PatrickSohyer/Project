<?php

$regexLogin = '/^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}$£*µ%!§.;,?<>]{0,15}$/';
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,500})$/';

$errorMessageSignIn = array();

if (count($_POST) > 0) {
    if (!empty($_POST['loginSignIn'])) {
        if (preg_match($regexLogin, $_POST['loginSignIn'])) {
            $loginSignIn = strip_tags(htmlspecialchars($_POST['loginSignIn']));
        } else {
            $errorMessageSignIn['loginSignIn'] = 'Le pseudo n\'est pas bon.';
        }
    } else {
        $errorMessageSignIn['loginSignIn'] = 'Merci de renseigner un pseudonyme.';
    }
    if (!empty($_POST['passwordSignIn'])) {
        if (preg_match($regexPassword, $_POST['passwordSignIn'])) {
            $passwordSignIn = strip_tags(htmlspecialchars($_POST['passwordSignIn']));
        } else {
            $errorMessageSignIn['passwordSignIn'] = 'Mot de passe invalide.';
        }
    } else {
        $errorMessageSignIn['passwordSignIn'] = 'Merci de renseigner votre mot de passe.';
    }
}
?>