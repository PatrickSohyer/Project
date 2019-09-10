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
    public $sp_article_date; // attribut date article
    public $id_sp_series_pages; // attribut id series
    public $nbArticlePerPages = 16; // attribut nombre de série par page
    public $firstPageArticle; // attribut page


    // Methode qui permet d'ajouter un article

    public function addArticle()
    {
        $reqAddArticle = $this->db->prepare('INSERT INTO sp_article (sp_article_title, sp_article_description, sp_article_image, sp_article_resume, sp_article_date, id_sp_series_pages) VALUES (:sp_article_title, :sp_article_description, :sp_article_image, :sp_article_resume, :sp_article_date, :id_sp_series_pages)');
        $reqAddArticle->bindValue(':sp_article_title', $this->sp_article_title, PDO::PARAM_STR);
        $reqAddArticle->bindValue(':sp_article_description', $this->sp_article_description, PDO::PARAM_STR);
        $reqAddArticle->bindValue(':sp_article_image', $this->sp_article_image, PDO::PARAM_STR);
        $reqAddArticle->bindValue(':sp_article_resume', $this->sp_article_resume, PDO::PARAM_STR);
        $reqAddArticle->bindValue(':sp_article_date', $this->sp_article_date, PDO::PARAM_STR);
        $reqAddArticle->bindValue(':id_sp_series_pages', $this->id_sp_series_pages, PDO::PARAM_INT);
        if ($reqAddArticle->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de compter le nombre d'article total pour la pagination

    public function countArticlePagination()
    {
        $reqCountArticlePagination = $this->db->query('SELECT COUNT(*) AS total FROM sp_article');
        $fetchCountArticlePagination = $reqCountArticlePagination->fetchAll(PDO::FETCH_ASSOC);
        return $fetchCountArticlePagination;
    }

    // Methode qui permet de selectionner les articles en fonction de la pagination

    public function selectArticle()
    {
        $reqSelectArticle = $this->db->prepare('SELECT * FROM sp_article ORDER BY sp_article_date DESC LIMIT :nbArticlePerPages OFFSET :firstPageArticle');
        $reqSelectArticle->bindValue(':nbArticlePerPages', $this->nbArticlePerPages, PDO::PARAM_INT);
        $reqSelectArticle->bindValue(':firstPageArticle', $this->firstPageArticle, PDO::PARAM_INT);
        if ($reqSelectArticle->execute()) {
            $fetchSelectArticle = $reqSelectArticle->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectArticle;
        }
    }

    // Methode qui permet de selectionner les articles pour les 4 articles de la page d'acceuil

    public function selectArticleIndex()
    {
        $reqSelectArticleIndex = $this->db->query('SELECT * FROM sp_article ORDER BY sp_article_date DESC LIMIT 4');
        $fetchSelectArticleIndex = $reqSelectArticleIndex->fetchAll(PDO::FETCH_ASSOC);
        return $fetchSelectArticleIndex;
    }

    // Methode qui permet de selectionner les informations de l'articles

    public function selectArticleInfo()
    {
        $reqSelectArticleInfo = $this->db->prepare('SELECT * FROM sp_article WHERE id = :id');
        $reqSelectArticleInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqSelectArticleInfo->execute()) {
            $fetchSelectArticleInfo = $reqSelectArticleInfo->fetch(PDO::FETCH_ASSOC);
            return $fetchSelectArticleInfo;
        }
    }

    // Methode qui permet de modifier les informations de l'articles

    public function updateArticle()
    {
        $reqUpdateArticle = $this->db->prepare('UPDATE sp_article SET sp_article_title = :sp_article_title, sp_article_description = :sp_article_description, sp_article_image = :sp_article_image, sp_article_resume = :sp_article_resume, id_sp_series_pages = :id_sp_series_pages WHERE id = :id');
        $reqUpdateArticle->bindValue(':id', $this->id, PDO::PARAM_INT);
        $reqUpdateArticle->bindValue(':sp_article_title', $this->sp_article_title, PDO::PARAM_STR);
        $reqUpdateArticle->bindValue(':sp_article_description', $this->sp_article_description, PDO::PARAM_STR);
        $reqUpdateArticle->bindValue(':sp_article_image', $this->sp_article_image, PDO::PARAM_STR);
        $reqUpdateArticle->bindValue(':sp_article_resume', $this->sp_article_resume, PDO::PARAM_STR);
        $reqUpdateArticle->bindValue(':id_sp_series_pages', $this->id_sp_series_pages, PDO::PARAM_INT);
        if ($reqUpdateArticle->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de selectionner les articles pour les modifier

    public function selectArticleUpdate()
    {
        $reqSelectArticleUpdate = $this->db->prepare('SELECT * FROM sp_article WHERE id = :id');
        $reqSelectArticleUpdate->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqSelectArticleUpdate->execute()) {
            $fetchSelectArticleUpdate = $reqSelectArticleUpdate->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectArticleUpdate;
        }
    }

    // Method qui permet de supprimer un article

    public function deleteArticle()
    {
        $reqDeleteArticle = $this->db->prepare('DELETE FROM sp_article WHERE id = :id');
        $reqDeleteArticle->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqDeleteArticle->execute()) {
            return TRUE;
        }
    }

    // Method qui permet de selectionner un article en fonction de l'id de la série

    public function selectArticleSeries()
    {
        $reqSelectArticleSeries = $this->db->prepare('SELECT * FROM sp_article WHERE id_sp_series_pages = :id_sp_series_pages');
        $reqSelectArticleSeries->bindValue(':id_sp_series_pages', $this->id_sp_series_pages, PDO::PARAM_INT);
        if ($reqSelectArticleSeries->execute()) { 
            $fetchSelectArticleSeries = $reqSelectArticleSeries->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectArticleSeries;
        }
    }
}
