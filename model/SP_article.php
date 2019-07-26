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

    public function selectArticle()
    {
        $reqSelectArticle = $this->db->query('SELECT * FROM sp_article');
            $fetchSelectArticle = $reqSelectArticle->fetchAll();
            return $fetchSelectArticle;
         }

}
