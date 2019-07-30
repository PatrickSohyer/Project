<?php

require_once '../include/include_page_admin_user.php';
require_once '../include/include_route.php';

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
