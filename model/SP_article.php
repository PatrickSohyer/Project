<?php

// Création de ma classe Article qui est une enfant de la classe Database 

class Article extends Database
{

    // Déclaration de mes attributs

    public $id; // attibut id 
    public $sp_article_title; // attribut titre article
    public $sp_article_description; // attribut description
    public $sp_article_image; // attribut image
    public $sp_article_resume; // attribut contenu article
    public $id_sp_series_pages; // attribut id series
    public $nbArticlePerPages = 16; // attribut nombre de série par page
    public $firstPageArticle; // attribut page


    // Methode qui permet d'ajouter un article

    public function addArticle()
    {
        $reqAddArticle = $this->db->prepare('INSERT INTO sp_article (sp_article_title, sp_article_description, sp_article_image, sp_article_resume, id_sp_series_pages) VALUES (:sp_article_title, :sp_article_description, :sp_article_image, :sp_article_resume, :id_sp_series_pages)');
        $reqAddArticle->bindValue(':sp_article_title', $this->sp_article_title);
        $reqAddArticle->bindValue(':sp_article_description', $this->sp_article_description);
        $reqAddArticle->bindValue(':sp_article_image', $this->sp_article_image);
        $reqAddArticle->bindValue(':sp_article_resume', $this->sp_article_resume);
        $reqAddArticle->bindValue(':id_sp_series_pages', $this->id_sp_series_pages);
        if ($reqAddArticle->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de compter le nombre de série total pour la pagination si la série est valider

    public function countArticlePagination() // Methode qui permet de compter le nombre de série total pour la pagination si la série est valider
    {
        $reqCountArticlePagination = $this->db->query('SELECT COUNT(*) AS total FROM sp_article'); // requete SQL qui compte le nombre d'entrée dans la table sp_series_pages
        $fetchCountArticlePagination = $reqCountArticlePagination->fetchAll(PDO::FETCH_ASSOC); // je fetchAll (je récupère toutes les données du tableau)
        return $fetchCountArticlePagination; // je retourne le resultat
    }

    public function selectArticle()
    {
        $reqSelectArticle = $this->db->prepare('SELECT * FROM sp_article LIMIT :nbArticlePerPages OFFSET :firstPageArticle');
        $reqSelectArticle->bindValue(':nbArticlePerPages', $this->nbArticlePerPages, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :nbSeriesPerPages
        $reqSelectArticle->bindValue(':firstPageArticle', $this->firstPageArticle, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :nbSeriesPerPages
        if ($reqSelectArticle->execute()) {
            $fetchSelectArticle = $reqSelectArticle->fetchAll();
            return $fetchSelectArticle;
        }
    }

    public function selectArticleInfo()
    {
        $reqSelectArticleInfo = $this->db->prepare('SELECT * FROM sp_article WHERE id = :id');
        $reqSelectArticleInfo->bindValue(':id', $this->id);
        if ($reqSelectArticleInfo->execute()) {
            $fetchSelectArticleInfo = $reqSelectArticleInfo->fetch();
            return $fetchSelectArticleInfo;
        }
    }
}
