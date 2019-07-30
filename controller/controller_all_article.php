<?php

require_once '../../model/SP_database.php';
require_once '../../model/SP_article.php';
require_once '../include/include_page_admin_user.php';
require_once '../include/include_route.php';

$article = new Article();

// Création de mes variables pour la pagination

$articlePagination = $article->countArticlePagination();
$nbArticlePerPages = 16;
$nbArticlePage = $articlePagination[0]['total'];
$nbPages = ceil($nbArticlePage / $nbArticlePerPages);

// je créer mes conditions pour les pages et les catégories

if (isset($_GET['page']) and is_numeric($_GET['page'])) { // sinon je fais la pagination normal
    $currentPage = $_GET['page']; // la page actuel est égal à get page 
    $article->firstPageArticle = ($currentPage - 1) * $nbArticlePerPages;
    $selectArticle = $article->selectArticle();
    if ($currentPage >= $nbPages) {
        $currentPage = $nbPages;
    }
} else {
    header('Location: page_error.php');
}

// Ma condition pour la déconnexion

if (isset($_GET['logout'])) { // je vérifie que logout existe dans la superglobal GET
    session_destroy(); // Je détruits la session
    header('Location: index.php'); // je redirige vers l'index
}
