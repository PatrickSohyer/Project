<?php

$bdd = new PDO('mysql:host=localhost;dbname=series_phil;charset=utf8', 'root', '');
if (count($_POST) > 0) {
    $mail = $_POST['emailSignUp'];
    $searchMailUsers = $bdd->prepare('SELECT mail FROM sp_users WHERE sp_users = :sp_users');
    $searchMailUsers->bindValue(':sp_users', $mail);
    $searchMailUsers->execute();
    $resultSearchMailUsers = $searchMailUsers->fetchAll();
    $errorMessageMail = [];
}
if (count($resultSearchMailUsers) === 0) {


    header('Location: index.php');
}
if (count($resultSearchMailUsers) > 0) {
    $errorMessageMail['mail'] = 'Cette adresse mail existe déjà';
}

?>