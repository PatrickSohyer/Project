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
        $reqAddArticle->bindValue(':sp_article_title', $this->sp_article_title);
        $reqAddArticle->bindValue(':sp_article_description', $this->sp_article_description);
        $reqAddArticle->bindValue(':sp_article_image', $this->sp_article_image);
        $reqAddArticle->bindValue(':sp_article_resume', $this->sp_article_resume);
        $reqAddArticle->bindValue(':sp_article_date', $this->sp_article_date);
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
            $fetchSelectArticle = $reqSelectArticle->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectArticle;
        }
    }

    public function selectArticleIndex()
    {
        $reqSelectArticleIndex = $this->db->query('SELECT * FROM sp_article ORDER BY sp_article_date DESC LIMIT 4 ');
            $fetchSelectArticleIndex = $reqSelectArticleIndex->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectArticleIndex;
        }

    public function selectArticleInfo()
    {
        $reqSelectArticleInfo = $this->db->prepare('SELECT * FROM sp_article WHERE id = :id');
        $reqSelectArticleInfo->bindValue(':id', $this->id);
        if ($reqSelectArticleInfo->execute()) {
            $fetchSelectArticleInfo = $reqSelectArticleInfo->fetch(PDO::FETCH_ASSOC);
            return $fetchSelectArticleInfo;
        }
    }

    public function updateArticle()
    {
        $reqUpdateArticle = $this->db->prepare('UPDATE sp_article SET sp_article_title = :sp_article_title, sp_article_description = :sp_article_description, sp_article_image = :sp_article_image, sp_article_resume = :sp_article_resume, id_sp_series_pages = :id_sp_series_pages WHERE id = :id');
        $reqUpdateArticle->bindValue(':id', $this->id);
        $reqUpdateArticle->bindValue(':sp_article_title', $this->sp_article_title);
        $reqUpdateArticle->bindValue(':sp_article_description', $this->sp_article_description);
        $reqUpdateArticle->bindValue(':sp_article_image', $this->sp_article_image);
        $reqUpdateArticle->bindValue(':sp_article_resume', $this->sp_article_resume);
        $reqUpdateArticle->bindValue(':id_sp_series_pages', $this->id_sp_series_pages);
        if ($reqUpdateArticle->execute()) {
            return TRUE;
        }
    }

    public function selectArticleUpdate() // Methode qui permet de selectionner les séries pour les mettres à jour
    {
        $reqSelectArticleUpdate = $this->db->prepare('SELECT * FROM sp_article WHERE id = :id'); // requete SQL pour selectionner les séries en fonction de leurs id
        $reqSelectArticleUpdate->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :id
        if ($reqSelectArticleUpdate->execute()) { // si la requete s'execute 
            $fetchSelectArticleUpdate = $reqSelectArticleUpdate->fetchAll(PDO::FETCH_ASSOC); // je fetchAll (je récupère toutes les données du tableau)
            return $fetchSelectArticleUpdate; // je retourne le resultat
        }
    }

        // Method qui permet de supprimer un article

        public function deleteArticle() // Method qui permet de supprimer  un article
        {
            $reqDeleteArticle = $this->db->prepare('DELETE FROM sp_article WHERE id = :id'); // requete SQL qui permet de supprimer un article
            $reqDeleteArticle->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :id 
            if ($reqDeleteArticle->execute()) { // si la requete s'execute
                return TRUE; // je retourne un booléen (TRUE)
            }
        }

        // Method qui permet de selectionner un article en fonction de l'id de la série

        public function selectArticleSeries()   // Method qui permet de selectionner un article en fonction de l'id de la série
        {
            $reqSelectArticleSeries = $this->db->prepare('SELECT * FROM sp_article WHERE id_sp_series_pages = :id_sp_series_pages'); // requete SQL pour selectionner les séries en fonction de leurs id
            $reqSelectArticleSeries->bindValue(':id_sp_series_pages', $this->id_sp_series_pages, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :id
            if ($reqSelectArticleSeries->execute()) { // si la requete s'execute 
                $fetchSelectArticleSeries = $reqSelectArticleSeries->fetchAll(PDO::FETCH_ASSOC); // je fetchAll (je récupère toutes les données du tableau)
                return $fetchSelectArticleSeries; // je retourne le resultat
            }
        }
}
